<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>Your Friends List</h1>
    <ol>
      <?php
      session_start();
      $conn = mysqli_connect(
        'localhost:3307',
        'root',
        'cw6y9m',
        'mention');
        $sql = "SELECT * FROM user_relation WHERE relatingUserID = '{$_SESSION['id']}' AND isAccepted = '1'";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result)) {
          $sql2 = "SELECT * FROM userdata WHERE id = '{$row['relatedUserID']}'";
          $result2 = mysqli_query($conn, $sql2);
          $row2 = mysqli_fetch_array($result2);
          echo "<p><li>".$row2['name']."</li></p>";
        }
      ?>
      </ol>
      <p><a href = "friendmanage.php">Go back to Friend Management</a></p>
  </body>
</html>
