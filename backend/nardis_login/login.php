<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Highlight Log In</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/4.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./css/bg.css">
  <script src="bg.js"></script>
</head>
<body>
  <?php
    session_start();
  ?>
  <?php
    if(isset($_SESSION['id']) === true) {
      header('location: index.php');
    }
  ?>
  <!--
  <form method="post" action="logincheck_ver1.php">
    <p>Insert your ID: <input type="text" name="id"></p>
    <p>Insert your password: <input type="password" name="password"></p>
    <p><input type="submit"></p>
  </form>
  <p>
    if you don't have Nardis account, please
    <a href = "signup.php"> sign up here.</a>
  </p>
  -->

  <div class="wrapper">
      <div class="container">
          <header>
              <h1>Nardis</h1>
          </header>
          <h2>Welcome</h2>

          <form class="form" method="post" action="logincheck_ver1.php">
              <input type="text" placeholder="ID" name="id">
              <input type="password" placeholder="Password" name="password">
              <button type="submit" id="login-button">Login</button>
          </form>
          <br><br><br>
          <h2>If you don't have an account,<br>
          <a href="signup.php">Sign Up Here</a></h2>
          <a href = "signup.php">here</a>
      </div>

      <ul class="bg-bubbles">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
      </ul>
  </div>
</body>
</html>
