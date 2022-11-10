package Sockets;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.Socket;
import java.util.Scanner;

public class Client {
    // Declaración de variables
    private Socket socket;
    private DataInputStream bufferIn = null;
    private DataOutputStream bufferOut = null;
    Scanner enter = new Scanner(System.in);
    final String keyword = "salir()"; // Se incluye una palabra clave que permite finalizar la sesion de chat

    //Metodo para mostrar mensajes genericos en el programa
    private static void texto(String s) {
        System.out.println(s);
    }

    //Metodo que inicializa la conexion de aucerdo al host y port definidos, se agrega control de excepciones
    private void iniciarConexion (String ip, int puerto){
        try {
            socket = new Socket(ip, puerto);
            texto("Conectado a: " + socket.getInetAddress().getHostName());
        } catch (Exception e){
            texto("Error en conexion: " + e.getMessage());
            System.exit(0);
        }
    }

    //Apertura de conexion de entrada y salida
    public void flowsOpen(){
        try {
            bufferIn = new DataInputStream(socket.getInputStream());
            bufferOut = new DataOutputStream(socket.getOutputStream());
            bufferOut.flush();
        } catch (IOException e) {
            texto("Error abriendo flujos");
        }
    }

    // Metodo que permite realizar el envio de mensajes mediante el socket
    public void send(String s){
        try {
            bufferOut.writeUTF(s);
            bufferOut.flush();
        } catch (IOException e) {
            texto("Error al enviar");
        }
    }

    //Metodo para terminar la conexion al socket
    private void finalizarConexion() {
        try {
            bufferIn.close();
            bufferOut.close();
            socket.close();
            texto("Conexión finalizada");
        } catch (IOException e){
            texto("Error al finalizar la conexión");
        }
    }

    // Metodo que recibe los mensajes de entrada, si no hay conexión en el socket, se controla la excepcion
    public void dataIn(){
        String st = "";
        try {
            do {
                st = (String) bufferIn.readUTF();
                texto("[Servidor] => " + st);
                System.out.println("[Cliente] => ");
            } while (!st.equals((keyword))); // Se realiza bucle hasta recibir la palabra clave de salida
        } catch (IOException e) {
            finalizarConexion();
        }
    }

    //Metodo que permite escribir mensajes para enviar
    @SuppressWarnings("InfiniteLoopStatement")
    public void dataWrite(){
        String entrada = "";
        while (true) {
            System.out.println("[Usted] => ");
            entrada = enter.nextLine();
            if (entrada.length() > 0)
                send(entrada);
        }
    }

    //Metodo que ejecuta la conexion segun ip y puertos definidos, invoca los metodos anteriores en un hilo de conexion
    public void lanzarConexion(String ip, int puerto){
        Thread hilo = new Thread(new Runnable() {
            @Override
            public void run() {
                try {
                    iniciarConexion(ip, puerto);
                    flowsOpen();
                    dataIn();
                } finally {
                    finalizarConexion();
                }
            }
        });
        hilo.start();
    }

    // Metodo main, inicia el programa solicitando al usuario el ingreso del puerto y host para el socket
    // Se incluye valores por defecto conectandose al localhost y puerto 5050
    public static void main (String[] args) {
        Client client = new Client();
        Scanner escaner = new Scanner(System.in);
        texto("Ingresa la IP [Defect localhost]:");
        String ip = escaner.nextLine();
        if (ip.length() == 0) ip = "localhost";

        texto("Puerto: [Port defect 5050]");
        String puerto = escaner.nextLine();
        if (puerto.length() == 0) puerto = "5050";
        client.lanzarConexion(ip, Integer.parseInt(puerto));
        client.dataWrite();
    }
}
