<?php

$mysqli = @mysqli_connect('ec2-3-211-37-117.compute-1.amazonaws.com', 'afvottstdygeph', '78a9d9712ebfd5e440d2ff4a1d5cfd7efa209e58b3cc18e22f3b80b327414486
', 'd80reggh2q0cv7');
if (!$mysqli) {
 echo "Error: " . mysqli_connect_error();
 exit();
}
  mysqli_set_charset($mysqli,"utf8");

?>