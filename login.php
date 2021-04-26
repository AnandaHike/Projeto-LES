<?php
session_start(); 
include_once("bd.php");


$email = $_POST['email'];
$senha = $_POST['senha'];

$query = $BDconexao->prepare("SELECT * FROM public.usuario WHERE nm_email = '${email}' AND nm_senha = '${senha}';");                     
$query->execute();

if($query->rowCount()>0){ 
	$_SESSION['email'] = $row['email'];
        //desconectar
        pg_close($BDconexao);
        header("Location: index.php");
        exit;
        
}
                                    
//desconectar
pg_close($BDconexao);
header("Location: login_form.php?msg=1&email=$email");   
                                  
exit;
?>