<!DOCTYPE html>
<html>
<script src="http://code.jquery.com/jquery-latest.js"></script>
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
        <div class="wrapper fadeInDown">
            <img src="./Design/images/logo.png" style="width:20%; height: 100%; padding: 2%; margin-top: -10%;">

          <div id="formContent">

            <!-- Tabs Titles -->
            <a href="index.php"><h2 class="inactive underlineHover"> 로그인하기 </h2></a>
            <h2 class="active"> 회원가입하기 </h2>

            <!-- Login Form -->
            <form method="post" action="nardis_login/insert.php" class="form">
                <input type="email" id="signup" class="fadeIn second" name="id" placeholder="당신의 이메일 주소" required>
                <input type="text" id="signup2" class="fadeIn second" name="name" maxlength="20" placeholder="사용할 이름 (영문, 숫자, 언더바(_) 사용가능)" onkeyup="noSpaceForm(this);" onchange="noSpaceForm(this);" required>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="비밀번호" required>

                <button type="submit" class="fadeIn fourth"> 가입하기</button>
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <p>웹사이트에서 떠오르는 생각을 바로바로 기록하세요. </p>
            </div>

          </div>
        </div>
    </body>
</html>
<script>

// 특수문자 정규식 변수(공백 미포함)
var replaceChar = /[~!@\#$%^&*\()\-=+'\;<>\/.\`:\"\\,\[\]?|{}]/gi;

// 완성형 아닌 한글 정규식
var replaceNotFullKorean = /[ㄱ-ㅎㅏ-ㅣ]/gi;

$(document).ready(function(){

    $("#signup2").on("focusout", function() {
        var x = $(this).val();
        if (x.length > 0) {
            if (x.match(replaceChar) || x.match(replaceNotFullKorean)) {
                x = x.replace(replaceChar, "").replace(replaceNotFullKorean, "");
            }
            $(this).val(x);
        }
        }).on("keyup", function() {
            $(this).val($(this).val().replace(replaceChar, ""));

   });

});

function noSpaceForm(obj)
{
    var str_space = /\s/;
    if(str_space.exec(obj.value))
    {
        obj.focus();
        obj.value = obj.value.replace(' ','');
        return false;
    }
    obj.value = obj.value.replace(/[^a-zA-Z-_0-9]/g,'');
};


</script>
