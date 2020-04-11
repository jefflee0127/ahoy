<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nardis Sign In</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/4.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="Design/css/signin.css">
        <script src="Design/js/bg.js"></script>
    </head>
    <body>
      <?php
        session_start();
      ?>
      <?php
        if(isset($_SESSION['id']) === true) {
          header('Location: ../Design/dashboard.php');
        }
      ?>
        <div class="wrapper fadeInDown">
            <img src="./Design/images/logo.png" style="width:20%; height: 100%; padding: 2%; margin-top: -10%;">
          <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active"> 로그인하기 </h2>
            <a href="signup.php"><h2 class="inactive underlineHover">회원가입하기</h2></a>

            <!-- Login Form -->
            <form class="form" method="post" action="nardis_login/logincheck_ver1.php">
              <input type="text" id="login" class="fadeIn second" name="id" placeholder="가입한 이메일" required>
              <input type="password" id="password" class="fadeIn third" name="password" placeholder="비밀번호" required>
              <input type="submit" class="fadeIn fourth" value="로그인하기">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
              <p>우리의 시작은 미약하지만 그 끝은 창대하리라.</p>
            </div>

          </div>
        </div>
    </body>
</html>
