<?php
session_start(); 

include_once("bd.php");


$email = $_POST['email'];
$senha = $_POST['senha'];

                                  
$sql = "SELECT * FROM usuario WHERE nm_email = '${email}' AND nm_senha = '${senha}';";


$query = $db->query($sql);
                        
foreach($db->query($sql)as $row)

if ($row>0){
	$_SESSION['nome'] = $row['email'];
        //desconectar
        mysqli_close($db);
        header("Location: areaUsuario.php");
        exit;
        
}
                                    
//desconectar
mysqli_close($db);
header("Location: login_form.php?msg=1&email=$email");   
                                  
exit;
?>