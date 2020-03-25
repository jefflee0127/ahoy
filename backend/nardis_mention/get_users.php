<?php

$conn = mysqli_connect('localhost', 'root', 'cw6y9m','mention');
$sql = "SELECT * FROM userdata";
$result = mysqli_query($conn, $sql);
$user_data = array();

while($row = mysqli_fetch_array($result)){
  $user = array("id"=>$row['u_id'], "name"=>$row['id'], "avatar"=>"http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif","type"=>"user");
  array_push($user_data, $user);
}

$output = json_encode($user_data);
echo $output;
?>
