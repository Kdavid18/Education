package Sockets;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.Scanner;

public class Server {
    // Declaración de variables
    private Socket socket;
    public ServerSocket serverSocket;
    private DataInputStream bufferIn = null;
    private DataOutputStream bufferOut = null;
    Scanner entrada = new Scanner(System.in);
    final String keyWord = "salir()";

    //Metodo para mostrar mensajes genericos en el programa
    public static void texto(String s) {
        System.out.println(s);
    }

    //Metodo que inicializa la conexion de aucerdo al host y port definidos, se agrega control de excepciones
    public void iniciarConexion (int puerto){
        try {
            serverSocket = new ServerSocket(puerto);
            texto("Esperando iniciar conexion con el puerto " + String.valueOf(puerto) + "...");
            socket = serverSocket.accept();
            texto("Conexion iniciada con: " + socket.getInetAddress().getHostName());
        } catch (Exception e){
            texto("Error en conexion: " + e.getMessage());
            System.exit(0);
        }
    }

    //Apertura de conexion de entrada y salida
    public void flows(){
        try {
            bufferIn = new DataInputStream(socket.getInputStream());
            bufferOut = new DataOutputStream(socket.getOutputStream());
            bufferOut.flush();
        } catch (IOException e) {
            texto("Error en apertura de flujos");
        }
    }

    // Metodo que recibe los mensajes de entrada, si no hay conexión en el socket, se controla la excepcion
    public void dataIn(){
        String st= "";
        try {
            do {
                st = (String) bufferIn.readUTF();
                texto("[Cliente] => " + st);
                System.out.println("[Usted] => ");
            } while (!st.equals(keyWord));
        } catch (IOException e){
            finalizarConexion();
        }
    }

    // Metodo que permite realizar el envio de mensajes mediante el socket
    public void send(String s){
        try{
            bufferOut.writeUTF(s);
            bufferOut.flush();
        } catch (IOException e){
            texto("Error al enviar: " + e.getMessage());
        }
    }

    //Metodo que permite escribir mensajes para enviar
    //Se omite excepcion por loop infinito ya que la keyword finaliza la conexión
    @SuppressWarnings("InfiniteLoopStatement")
    public void dataWrite(){
        while (true){
            System.out.println("[Usted] => ");
            send(entrada.nextLine());
        }
    }

    //Metodo para terminar la conexion al socket
    public void finalizarConexion(){
        try {
            bufferIn.close();
            bufferOut.close();
            socket.close();
        } catch (IOException e) {
            texto("Error al finalizar conexión: " + e.getMessage());
        }
    }

    //Metodo que ejecuta la conexion segun ip y puertos definidos, invoca los metodos anteriores en un hilo de conexion
    public void lanzarEjecucion(int puerto) {
        Thread hilo = new Thread(new Runnable() {
            @Override
            public void run() {
                while (true){
                    try {
                        iniciarConexion(puerto);
                        flows();
                        dataIn();
                    } finally {
                    finalizarConexion();
                }
            }
        }});
        hilo.start();
    }

    // Metodo main, inicia el programa solicitando al usuario el ingreso del puerto y host para el socket
    // Se incluye valores por defecto conectandose al puerto 5050
    public static void main(String[] args) {
        Server s = new Server();
        Scanner sc = new Scanner(System.in);

        texto("Ingrese el puerto (Port Defect 5050): ");
        String puerto = sc.nextLine();
        if (puerto.length() == 0) puerto = "5050";
        s.lanzarEjecucion(Integer.parseInt(puerto));
        s.dataWrite();
    }

}