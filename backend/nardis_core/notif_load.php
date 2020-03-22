<?php
$conn = mysqli_connect('localhost', 'root', 'cw6y9m','mention');

//echo '잘 받았습니다!'.$_POST['link'];
//echo $_POST['link'];
//echo $_POST['comment'];
// 일단 URL이 기존 데이터에 있는지 확인을 해야 한다!

/*
$sql = "SELECT * from notif WHERE username='{$_POST['id']}'";
//$sql = "SELECT * from link";
//echo $sql;
$result = mysqli_query($conn, $sql);
//$row = mysqli_fetch_array($result);
//$index = $row[0];
//$sql = "SELECT * from comment LEFT JOIN userdata ON comment.author_id = userdata.u_id WHERE link_Id=$index";
//$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){
  //<li><a href=\"index.php?id=19\">Mysql</a></li>
$msg = $row['notif_msg'];
/*$comment = "
  <div class='existingComm'>
      <div class='eachComm'>
          <div class='existingProfileSection'>
              <a></a>
          </div>
          <div class='existingCommSection'>
              <div class='speech-bubble'>
                  <p>{$msg}</p>
              </div>
          </div>
          <div></div>
          <div class='love-or-replies'>
              <div></div>
              <div class='btn-group-xs'>
                  <button type='button' class='btn btn-primary'>Love</button>
                  <button type='button' class='btn btn-primary disabled'>View Replies</button>
                  <button type='button' class='btn btn-primary'>Reply</button>
              </div>
          </div>
      </div>
  </div>
  ";*/
  echo ("hello world!");

?>
