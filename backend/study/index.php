
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

      $article = array(
        'title'=>'Welcome',
        'description'=>'Welcome to my homepage',
        'name'=>' '
      );

      if(isset($_GET['id'])) {
      $sql = "SELECT * from topic LEFT JOIN author ON topic.author_id=author.id WHERE topic.id={$_GET['id']}";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      //var_dump($row);
      //$length =  count($row);
      $article['title'] = $row['title'];
      $article['description'] = $row['description'];
      $article['name'] = 'by '.$row['name'];

      $update = '<a href="update.php?id='.$_GET['id'].'">update</a>';

      }
      ?>
    </ol>
    <a href="create.php">create</a>
    <?=$update?>
    <h2><?=$article['title']?></h2>
      <?=$article['description']?>
      <p><?=$article['name']?></p>

  </body>
</html>
