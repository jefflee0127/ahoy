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
    echo "successfully send request";
  }
?>
<p><a href = "friendsearch.php">Go back to friendsearch</a></p>
</html>
