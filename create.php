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
	mysqli_close($mysqli);
	header("Location: login.html");exit;
	}
	else{
    echo "<br>a query eh: $sql";
		echo "<br>Houve um erro no cadastrado !";
	}

}
?>
