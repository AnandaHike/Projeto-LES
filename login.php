<?php

include_once("bd.php");


$email = $_POST['email'];
$senha = $_POST['senha'];

                                  
$sql = "SELECT * FROM usuario WHERE nm_email = '${email}' AND nm_senha = '${senha}';";


$query = $db->query($sql);
                        
foreach($db->query($sql)as $row)

$strconsulta=pg_query($conexao, "select * from usuario where nm_email='$email' and nm_senha='$senha'");
$numregs=pg_num_rows($strconsulta);
echo "Já tem ".$numregs." registro(s) neste código";
                                    
//desconectar
pg_close($db);
header("Location: login_form.php?msg=1&email=$email");   
                                  
exit;
?>