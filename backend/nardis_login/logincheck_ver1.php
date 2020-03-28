<?php
session_start();
$conn = mysqli_connect(
  'localhost:3307',
  'root',
  'cw6y9m',
  'mention');
$sql = "SELECT * FROM userdata WHERE id = '{$_POST['id']}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
if($row['password'] === $_POST['password']) {
  $_SESSION['id'] = $_POST['id'];
  $_SESSION['u_id'] = $row['u_id'];
  $_SESSION['name'] = $row['name'];
  echo "success";
  header('Location: index.php');
}
else {
  echo "<p>id or password is wrong</p>";
  echo "<p><a href='login.php'>go back to login session</a></p>";
}
?>
