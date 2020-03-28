<html>
<?php
  $conn = mysqli_connect("localhost:3307", "root", "cw6y9m", "mention");
  $sql = "
    DELETE FROM user_relation WHERE relatingUserID = '{$_POST['relatingUserID']}' AND relatedUserID = '{$_POST['relatedUserID']}'";
  $result = mysqli_query($conn, $sql);
  if($result === false){
    echo mysqli_error($conn);
  }
  else{
    echo "successfully rejected request";
  }
?>
<p><a href = "receivedfriendrequest.php">Go back to Received Friend Request</a></p>
</html>
