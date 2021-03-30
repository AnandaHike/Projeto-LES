<%-- 
    Document   : admin
    Created on : 30 de mar de 2021, 00:32:11
    Author     : nanda
--%>
<%@page import="br.edu.fatecpg.les.classe.Usuario"%>
<%@page import="br.edu.fatecpg.les.bd.DbListener"%>
<%@ page pageEncoding="ISO-8859-1" %>
<!DOCTYPE html>
<%
   String exceptionMessage = null;
    if(request.getParameter("Cancelar") != null){
        response.sendRedirect(request.getRequestURI());
    }
    if(request.getParameter("FormExcluir") != null){
        try{
            String login = request.getParameter("login");
            Usuario.excluirUsuario(login);
            response.sendRedirect(request.getRequestURI());
        }catch (Exception ex){
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
        <h2>Administração da base de dados</h2>
        <%if(session.getAttribute("session.login")==null){%>
            <div>É preciso estar logado e ser administrador para visualizar essa página</div>
        <%}else if(!session.getAttribute("session.role").equals("ADM")){%>
            <div>É preciso ser administrador para visualizar essa página</div>
        <%}else{%>
            <hr/>
            <% if(exceptionMessage != null){ %>
            <div style="color: red"><%= exceptionMessage %></div>
        <% } %>
        <% if(request.getParameter("prepararDelete")!= null){ %>
                <fieldset>
                    <legend>Excluir Usuário</legend>
                    <% String login = request.getParameter("login"); %>
                    <form method="post">
                        Excluir a disciplina <b><%= login %></b>?<br>
                        <br>
                        <input type="hidden" name="login" value="<%= login %>"/>
                        <input type="submit" name="FormExcluir" value="Excluir"/>
                        <input type="submit" name="Cancelar" value="Cancelar"/>
                    </form>
                </fieldset>
            <% } %>
            <h3>Usuários cadastrados</h3>
            <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Login</th>
                <th scope="col">Nome</th>
                <th scope="col">Função</th>
                <th scope="col">CPF</th>
                <th scope="col">Telefone</th>
                <th scope="col">Comando</th>
              </tr>
            </thead>
            <tbody>
              <% for(Usuario u: Usuario.getList()){ %>       
              <tr>
                  <td style="background-color: #FAF0E6"><%= u.getLogin() %></td>
                  <td><%= u.getNome() %></td>
                  <td style="background-color: #FAF0E6"><%= u.getRole() %></td>
                  <td><%= u.getCpf() %></td>
                  <td style="background-color: #FAF0E6"><%= u.getTelefone() %></td>
                  <td>
                      <form method="post">
                          <input type="hidden" name="login" value="<%= u.getLogin() %>"/>
                          <input type="submit" name="prepararDelete" value="Excluir"/>
                      </form>
                  </td>
              </tr>
            </tbody>
            <%}%>
        </table>
    <%}%>
    </body>
</html>
