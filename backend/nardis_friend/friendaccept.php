<html>
<?php
  $conn = mysqli_connect("localhost:3307", "root", "123456", "accountdata");
  $sql = "
    INSERT INTO user_relation (
        relatingUserID,
        relatedUserID,
        isAccepted,
        primary_id
    ) VALUES (
      '{$_POST['relatingUserID']}',
      '{$_POST['relatedUserID']}',
      '{$_POST['isAccepted']}',
      NULL
    )";
  $result = mysqli_query($conn, $sql);
  if($result === false){
    echo mysqli_error($conn);
  }
  else{
    echo "successfully accepted request";
  }

  $sql2 = "
    UPDATE user_relation SET isAccepted = 1 WHERE relatingUserID = '{$_POST['relatedUserID']}' AND relatedUserID = '{$_POST['relatingUserID']}'";
  $result2 = mysqli_query($conn, $sql2);
  if($result2 === false){
    echo mysqli_error($conn);
  }
  else{
    echo "successfully accepted mutual request";
  }
?>
<p><a href = "receivedfriendrequest.php">Go back to Received Friend Request</a></p>
</html>
