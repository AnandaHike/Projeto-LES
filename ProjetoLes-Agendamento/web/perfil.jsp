<%-- 
    Document   : perfil
    Created on : 30 de mar de 2021, 00:31:28
    Author     : nanda
--%>
<%@page import="br.edu.fatecpg.les.classe.Usuario"%>
<%@page import="br.edu.fatecpg.les.bd.DbListener"%>
<%@ page pageEncoding="ISO-8859-1" %>
<!DOCTYPE html>
<%
    String exceptionMessage = null;
    if(request.getParameter("FormAlterarSenha")!=null){
        try{
            String senhaAtual = request.getParameter("senhaAtual");
            String senhaNova = request.getParameter("senhaNova");
            String senhaNovaConfirmacao = request.getParameter("senhaNovaConfirmacao");
            String login = (String)session.getAttribute("session.login");
            Usuario u = Usuario.getUser(login, senhaAtual);
            if(u == null){
                exceptionMessage = "Senha inválida";
            }else{
                if(!senhaNova.equals(senhaNovaConfirmacao)){
                    exceptionMessage = "As senhas novas estão diferentes";
                }else{
                    Usuario.changePassword(login, senhaNova);
                    response.sendRedirect(request.getRequestURI());
                }
            }
        }catch(Exception ex){
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
        <h2>Meu Perfil</h2>
        <%if(session.getAttribute("session.login")==null){%>
            <div>É preciso estar logado para acessar esta página</div>
        <%}else{%>
            <h3>Login</h3>
            <div><%= session.getAttribute("session.login") %></div>
            <h3>Nonme</h3>
            <div><%= session.getAttribute("session.nome") %></div>
            <h3>Papel</h3>
            <div><%= session.getAttribute("session.role") %></div>
            <hr/>
            <%if(exceptionMessage!=null){%>
            <div style="color: red"><%= exceptionMessage %></div>
            <%}%>
            <fieldset>
                <legend>Alterar senha</legend>
                <form method="post">
                    <div>Senha atual:</div>
                    <div><input type="password" name="senhaAtual"/></div>
                    <div>Senha nova:</div>
                    <div><input type="password" name="senhaNova"/></div>
                    <div>Senha nova (confirmação):</div>
                    <div><input type="password" name="senhaNovaConfirmacao"/></div>
                    <hr/>
                    <input type="submit" name="FormAlterarSenha" value="Redefinir"/>
                </form>
            </fieldset>
        <%}%>
    </body>
</html>