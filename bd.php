<?php

$conexao = @pg_connect('ec2-3-211-37-117.compute-1.amazonaws.com', 'afvottstdygeph', '78a9d9712ebfd5e440d2ff4a1d5cfd7efa209e58b3cc18e22f3b80b327414486
', 'd80reggh2q0cv7');
if (!$conexao) {
 echo "Error: " . pg_connect_error();
 exit();
}
  pg_set_charset($conexao,"utf8");

?>