<?php

include_once("bd.php");


$email = $_POST['email'];
$senha = $_POST['senha'];


$strconsulta=pg_query($conexao, "select * from usuario where nm_email='$email' and nm_senha='$senha'");
$numregs=pg_num_rows($strconsulta);
echo "Já tem ".$numregs." registro(s) neste código";
                                    
//desconectar
pg_close($db);
header("Location: login_form.php?msg=1&email=$email");   
                                  
exit;
?>