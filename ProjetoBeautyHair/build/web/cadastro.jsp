<%-- 
    Document   : cadastro
    Created on : 23 de mar de 2021, 13:20:01
    Author     : nanda
--%>
<%@page import="br.edu.fatecpg.les.bd.DbListener" %>
<%@page import="br.edu.fatecpg.les.classe.Usuario" %>
<<%@page contentType="text/html" pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<%
    String exceptionMessage = null;
    if (request.getParameter("Cancelar") != null) {
        response.sendRedirect(request.getRequestURI());
    }
    if (request.getParameter("FormInserir") != null) {
        try {
            String login = request.getParameter("login");
            String nome = request.getParameter("nome");
            String papel = request.getParameter("papel");
            int cpf = Integer.parseInt(request.getParameter("cpf"));
            int telefone = Integer.parseInt(request.getParameter("telefone"));
            String password = request.getParameter("password");
            Usuario.CadastrarUsuario(login, nome, papel, cpf, telefone, password);
            response.sendRedirect(request.getRequestURI());
        } catch (Exception ex) {
            exceptionMessage = ex.getLocalizedMessage();
        }
    }
%>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%@include file="WEB-INF/jspf/login_menu.jspf" %>
        <h1 class="container-fluid">Cadastro</h1>
        <hr/> 
        <% if (exceptionMessage != null) {%>
        <div style="color: red"><%= exceptionMessage%></div>
        <% }%>
        <fieldset>
            <legend>Cadastrar</legend>
            <form method="post">
                <div>Email: </div>
                <div><input type="email" name="login"/></div>
                <div>Nome: </div>
                <div><input type="text" name="nome"/></div><br>
                <div>Função: </div>
                <div><input type="text" name="papel"/></div><br>
                <div>CPF: </div>
                <div><input type="number" name="cpf"/></div><br>
                <div>Contato: </div>
                <div><input type="number" name="telefone"/></div><br>
                <div>Senha </div>
                <div><input type="password" name="password"/></div><br>
                <input type="submit" name="FormInserir" value="Inserir"/>
                <input type="submit" name="Cancelar" value="Cancelar"/>
            </form>
        </fieldset>
    </body>
</html>
