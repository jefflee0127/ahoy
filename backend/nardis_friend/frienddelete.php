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
    echo "successfully unfriended";
  }
  $sql2 = "
    DELETE FROM user_relation WHERE relatingUserID = '{$_POST['relatedUserID']}' AND relatedUserID = '{$_POST['relatingUserID']}'";
  $result2 = mysqli_query($conn, $sql2);
  if($result2 === false){
    echo mysqli_error($conn);
  }
  else{
    echo "successfully unfriended mutually";
  }
?>
<p><a href = "friendlist.php">Go back to Friend List</a></p>
</html>
