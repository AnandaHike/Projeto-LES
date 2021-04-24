<?php
session_start(); 
include_once("bd.php");


$email = $_POST['email'];
$senha = $_POST['senha'];

                                  
$sql = "SELECT * FROM public.usuario WHERE nm_email = '${email}' AND nm_senha = '${senha}';";


$query = pg_query($BDconexao, "SELECT * FROM public.usuario WHERE nm_email = '${email}' AND nm_senha = '${senha}';");
                        
foreach($query as $row)

if ($row>0){
	$_SESSION['email'] = $row['email'];
        //desconectar
        pg_close($db);
        header("Location: index.php");
        exit;
        
}
                                    
//desconectar
pg_close($db);
header("Location: login_form.php?msg=1&email=$email");   
                                  
exit;
?>