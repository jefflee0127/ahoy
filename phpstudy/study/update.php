<?php
  $conn = mysqli_connect('localhost', 'root','cw6y9m','opentutorials');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
      <?php
      $sql = "SELECT * FROM topic";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result)){
        //<li><a href=\"index.php?id=19\">Mysql</a></li>
        echo "<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
      }
      ?>
    </ol>
    <form action="process_create.php" method="POST">
      <p><input type="text" name="title" placeholder="title"></p>
      <p><textarea name="description"></textarea></p>
      <p><input type="submit"> </p>
    </form>
  </body>
</html>
