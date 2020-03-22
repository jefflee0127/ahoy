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
   <!--
    <h1>
      <p>Sign-up session</p>
    </h1>
    <form method="post" action="insert.php">
      <p>Insert your ID for login: <input type="text" name="id"></p>
      <p>Insert your name for Nardis: <input type="text" name="name"></p>
      <p>Insert your email: <input type="text" name="email"></p>
      <p>Insert your password: <input type="password" name="password"></p>
      <p>Re-enter your password: <input type="password" name="passwordcheck"></p>
      <p><input type="submit"></p>
    </form>
    -->
    <div class="wrapper">
        <div class="container">
            <header>
                <h1>Nardis</h1>
            </header>

            <h2>Sign Up</h2>

            <form method="post" action="insert.php" class="form">
                <input class="box" type="text" placeholder="Your New ID" name="id">
                <input class="box" type="text" placeholder="Your Name" name="name">
                <input class="box" type="password" placeholder="Password" name="password">
                <input class="box" type="password" placeholder="Confirm Password" name="passwordcheck">
                <label><input type="checkbox" name="color" value="blue">Agree to the Terms of Use and Privacy Policy </label> <br>
                <button type="submit" id="login-button">Sign Up!</button>
            </form>
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
