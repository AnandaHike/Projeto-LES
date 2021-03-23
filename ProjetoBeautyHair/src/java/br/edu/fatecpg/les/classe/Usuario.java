/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.edu.fatecpg.les.classe;

import java.util.ArrayList;
import java.sql.*;
import br.edu.fatecpg.les.bd.DbListener;

/**
 *
 * @author nanda
 */
public class Usuario {
    private String login;
    private String nome;
    private String papel;
    private int cpf;
    private int telefone;
    
    public static Usuario getUser(String login, String password) throws Exception{
        Usuario user = null;
        Connection con = DbListener.getConnection();
        //Para evitar o SQL injection, usa-se o PreparedStatement
        PreparedStatement stmt = con.prepareStatement ("SELECT * FROM usuario WHERE login=? AND password_hash=?");
        stmt.setString(1, login);
        stmt.setLong(2, password.hashCode());
        ResultSet rs = stmt.executeQuery();
        while (rs.next()){
            user = new Usuario(
            rs.getString("login"),
            rs.getString("nome"),
            rs.getString("role"),
            rs.getInt("cpf"),
            rs.getInt("telefone"));
        }
        rs.close();
        stmt.close();
        con.close();
        return user;
    }
    
     public static void changePassword(String login, String newPassword) throws Exception{
        Connection con = DbListener.getConnection();
        //Para evitar o SQL injection, usa-se o PreparedStatement
        PreparedStatement stmt = con.prepareStatement
        ("UPDATE usuario SET password_hash = ? WHERE login = ?");
        stmt.setLong(1, newPassword.hashCode());
        stmt.setString(2, login);
        stmt.execute();
        stmt.close();
        con.close();
    }
     
     public static ArrayList<Usuario> getList() throws Exception{
        ArrayList<Usuario> list = new ArrayList<>();
        Connection con = DbListener.getConnection();
        Statement stmt = con.createStatement();
        ResultSet rs = stmt.executeQuery("SELECT * FROM usuario");
        while (rs.next()){
            list.add(new Usuario(
            rs.getString("login"),
            rs.getString("nome"),
            rs.getString("role"),
            rs.getInt("cpf"),
            rs.getInt("telefone")));
        }
        rs.close();
        stmt.close();
        con.close();
        return list;
    }
     
     public static void CadastrarUsuario(String login, String nome, String papel, int cpf, int telefone, String password)throws Exception{
         Connection con = DbListener.getConnection();
        PreparedStatement stmt = con.prepareStatement("INSERT INTO usuario(login, nome, role, cpf, telefone, password_hash) VALUES(?,?,?,?,?,?)");
        stmt.setString(1, login);
        stmt.setString(2, nome);
        stmt.setString(3, papel);
        stmt.setInt(4, cpf);
        stmt.setInt(5, telefone);
        stmt.setLong(6, password.hashCode());
        stmt.execute();
        stmt.close();
        con.close();
     }

    public Usuario(String login, String nome, String papel, int cpf, int telefone) {
        this.login = login;
        this.nome = nome;
        this.papel = papel;
        this.cpf = cpf;
        this.telefone = telefone;
    }

    public int getTelefone() {
        return telefone;
    }

    public void setTelefone(int telefone) {
        this.telefone = telefone;
    }

    public String getLogin() {
        return login;
    }

    public void setLogin(String login) {
        this.login = login;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getPapel() {
        return papel;
    }

    public void setPapel(String papel) {
        this.papel = papel;
    }

    public int getCpf() {
        return cpf;
    }

    public void setCpf(int cpf) {
        this.cpf = cpf;
    }
    
     public static String getCreateStatement(){
         return "CREATE TABLE IF NOT EXISTS usuario("
                 + "login VARCHAR(100) PRIMARY KEY,"
                 + "nome VARCHAR(50) NOT NULL,"
                 + "role VARCHAR (10) NOT NULL,"
                 + "cpf NUMERIC(11,0) NOT NULL,"
                 + "telefone NUMERIC(11,0) NOT NULL,"
                 + "password_hash LONG NOT NULL)";
     }
}
