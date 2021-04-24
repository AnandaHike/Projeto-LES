<?php
include_once("bd.php");

if(!empty($_POST))
{
    $nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$contato = $_POST['contato'];
	$cpf = $_POST['cpf'];

	$sql = "INSERT INTO usuario (nome, email, senha, contato, cpf) 
  VALUES 
  ('${nome}',
  '${email}',
  '${senha}',
  '${contato}',
   '${cpf}')";
	
$query = $mysqli->query($sql);
 
if ($query){
	$sql = "SELECT pg_terminate_backend(pg_stat_activity.pid) FROM pg_stat_activity WHERE datname = d80reggh2q0cv7() AND pid <> pg_backend_pid()";
	header("Location: login.html");exit;
	}
	else{
    echo "<br>a query eh: $sql";
		echo "<br>Houve um erro no cadastrado !";
	}

}
?>

