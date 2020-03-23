<?php
session_start();
if(isset($_SESSION['id']) === true) {

  $userinfo = array(
    'valid'=>'true',
    'id'=>$_SESSION['id'],
    'name'=>$_SESSION['name'],
    'u_id'=>$_SESSION['u_id']
  );
  echo json_encode($userinfo);
  //echo ("hello");
}
else {
  echo "false";
}
?>
