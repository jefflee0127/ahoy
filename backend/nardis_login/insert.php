<!DOCTYPE html>
<html>
<?php
  $conn = mysqli_connect("localhost:3307", "root", "cw6y9m", "mention");
  $sql = "
    INSERT INTO userdata (
        id,
        name,
        password
    ) VALUES (
      '{$_POST['id']}',
      '{$_POST['name']}',
      '{$_POST['password']}'
    )";
  $result = mysqli_query($conn, $sql);
  if($result === false){
    echo mysqli_error($conn);
  }
  else{
    echo "successfully signed up";
  }
?>
<p><a href = "login.php"> Successfully Signed up. Now you can login to Nardis. </a></p>
</html>
