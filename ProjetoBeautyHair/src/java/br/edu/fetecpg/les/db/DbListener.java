/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.edu.fetecpg.les.db;

import br.edu.fatecpg.les.classes.Usuario;
import javax.servlet.ServletContextEvent;
import javax.servlet.ServletContextListener;
import java.sql.*;

/**
 * Web application lifecycle listener.
 *
 * @author nanda
 */
public class DbListener implements ServletContextListener {
    
    public static final String CLASS_NAME = "org.sqlite.JDBC";
    public static final String URL = "jdbc:sqlite:ProjetoBeautyHair.db";
    
    public static String exceptionMessage = null;

    public static Connection getConnection() throws Exception {
        return DriverManager.getConnection(URL);
    }

    @Override
    public void contextInitialized(ServletContextEvent sce) {
        Connection con = null;
        Statement stmt = null;
        
        try{
            Class.forName(CLASS_NAME);
            con = DriverManager.getConnection(URL);
            stmt = con.createStatement();
            stmt.execute(Usuario.getCreateStatement());
            if(Usuario.getList().isEmpty()){
                stmt.execute("INSERT INTO usuario VALUES('admin@adm.com', 'Administrador', 'ADM', '49038903874', '13996227770', "+"1234".hashCode()+")");
            }
        }catch (Exception ex){
            exceptionMessage = ex.getLocalizedMessage();
        }finally{
            try{stmt.close();}catch(Exception ex2){}
            try{con.close();}catch(Exception ex2){}
        }
    }

    @Override
    public void contextDestroyed(ServletContextEvent sce) {
    }
}
