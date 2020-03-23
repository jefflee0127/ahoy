<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>Find new friends</h1>
    <h2>New Friends List:</h2>
    <ol>
      <?php
      session_start();
      $conn = mysqli_connect(
        'localhost:3307',
        'root',
        '123456',
        'accountdata');
        $sql = "SELECT * FROM userdata";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result)) {
          echo "<p><li>".$row['name']; ?>
          <form method="post" action="friendrequest.php">
            <input type="hidden" name = "relatingUserID" value = "<?php echo $_SESSION['id']?>">
            <input type="hidden" name = "relatedUserID" value = "<?php echo $row['id']?>">
            <input type="hidden" name = "isAccepted" value = "0">
            <input type="submit" value = "send request">
          </form>
          </li></p>
        <?php
          }
        ?>
      </ol>
      <p><a href = "friendmanage.php">Go back to Friend Management</a></p>
  </body>
</html>
