<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>Received Friends Requests</h1>
    <h2>Request List:</h2>
    <ol>
      <?php
      session_start();
      $conn = mysqli_connect(
        'localhost:3307',
        'root',
        'cw6y9m',
        'mention');
        $sql = "SELECT * FROM user_relation WHERE relatedUserID = '{$_SESSION['id']}' AND isAccepted = 0";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)) {
          $sql2 = "SELECT * FROM userdata WHERE id = '{$row['relatingUserID']}'";
          $result2 = mysqli_query($conn, $sql2);
          $row2 = mysqli_fetch_array($result2);
          echo "<p><li>".$row2['name'];?>
          <form method="post" action="friendaccept.php">
            <input type="hidden" name = "relatingUserID" value = "<?php echo $_SESSION['id']?>">
            <input type="hidden" name = "relatedUserID" value = "<?php echo $row['relatingUserID']?>">
            <input type="hidden" name = "isAccepted" value = "1">
            <input type="submit" value = "Accept Request">
          </form>
          <form method="post" action="friendreject.php">
            <input type="hidden" name = "relatingUserID" value = "<?php echo $row['relatingUserID']?>">
            <input type="hidden" name = "relatedUserID" value = "<?php echo $_SESSION['id']?>">
            <input type="submit" value = "Reject Request">
          </form>
          </li></p>
        <?php
          }
        ?>
      </ol>
      <p><a href = "friendmanage.php">Go back to Friend Management</a></p>
  </body>
</html>
