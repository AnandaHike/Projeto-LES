<?php
session_start(); 
include_once("bd.php");


$email = $_POST['email'];
$senha = $_POST['senha'];

$result=pg_query($BDconexao, "SELECT * FROM public.usuario WHERE nm_email = '${email}' AND nm_senha = '${senha}';");
  if  (!$result) {
    echo "query did not execute";
  }
  $rs = pg_fetch_assoc($result);
  if (!$rs) {
    echo "0 records"
  }
                                    
//desconectar
pg_close($db);
header("Location: login_form.php?msg=1&email=$email");   
                                  
exit;
?>