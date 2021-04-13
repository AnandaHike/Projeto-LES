<?
$conexao=pg_connect("host=ec2-3-211-37-117.compute-1.amazonaws.com dbname=d80reggh2q0cv7 user=afvottstdygeph port=5432");
if(!$conexao){
echo"Falha na conexão com o banco. Veja detalhes técnicos:".pg_last_error($conexao);
}
?>