<?php
session_start(); 
include_once("login.html");
include_once("bd.php");


$email = $_POST['email'];
$senha = $_POST['senha'];

                                  
$sql = "SELECT * FROM usuario WHERE nm_email = '${email}' AND nm_senha = '${senha}';";


$query = $db->query($sql);
                        
foreach($db->query($sql)as $row)

if ($row>0){
	$_SESSION['email'] = $row['email'];
        //desconectar
        $sql = "SELECT pg_terminate_backend(pg_stat_activity.pid) FROM pg_stat_activity WHERE datname = d80reggh2q0cv7() AND pid <> pg_backend_pid()";
        header("Location: index.php");
        exit;
        
}
                                    
//desconectar
$sql = "SELECT pg_terminate_backend(pg_stat_activity.pid) FROM pg_stat_activity WHERE datname = d80reggh2q0cv7() AND pid <> pg_backend_pid()";
header("Location: login_form.php?msg=1&email=$email");   
                                  
exit;
?>