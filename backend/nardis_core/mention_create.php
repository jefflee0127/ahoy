<?php
$conn = mysqli_connect('localhost', 'root', 'cw6y9m','mention');

$input = "{$_POST['description']}";
$regex = '~(@\w+)~';
if (preg_match_all($regex, $input, $matches, PREG_PATTERN_ORDER)) {
   foreach ($matches[1] as $word) {
     $word2 = substr($word, 1);
     $msg = "언급을 당하셨습니다.";
     $sql2 = "
         INSERT INTO notif
           (notif_msg, publish_date,username, link)
           VALUES (
              '{$msg}',
               NOW(),
              '{$word2}',
              '{$_POST['link']}'
           )
       ";
       mysqli_query($conn, $sql2);

   }
}



$sql = "SELECT * from link WHERE url='{$_POST['link']}'";
//$sql = "SELECT * from link";
//echo $sql;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);





//count($row);
//echo count($row);
if(count($row)==0){ //만약에 없으면 새로 삽입 + 그 아이디랑
  $sql = "
    INSERT INTO link
      (url)
      VALUES (
         '{$_POST['link']}'
      )
  ";
  mysqli_query($conn, $sql);
  $sql = "SELECT * from link WHERE url='{$_POST['link']}'";
  $result= mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  $sql = "
    INSERT INTO comment
      (description, author_id, link_Id)
      VALUES (
         '{$_POST['description']}',
         '{$_POST['u_id']}',
          $row[0]
      )
  ";
  mysqli_query($conn, $sql);

  $sql = "SELECT * from userdata WHERE u_id='{$_POST['u_id']}'";
  $result= mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $username = $row['name'];
  $sql = "SELECT * from userdata WHERE u_id!='{$_POST['u_id']}'";
  $result= mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    $msg = $username.' 이 글을 썼다고 한다! 들어가서 확인하길!';
    $sql = "
      INSERT INTO notif
        (notif_msg, publish_date,username, link)
        VALUES (
           '{$msg}',
            NOW(),
           '{$row['id']}',
           '{$_POST['link']}'
        )
    ";
    mysqli_query($conn, $sql);
  }

}


else{ //만약에 있으면 그 링크 id 랑 같이 삽입
  $sql = "
    INSERT INTO comment
      (description, author_id,link_Id)
      VALUES (
         '{$_POST['description']}',
         '{$_POST['u_id']}',
          $row[0]
      )
  ";
  mysqli_query($conn, $sql);

  $sql = "SELECT * from userdata WHERE u_id='{$_POST['u_id']}'";
  $result= mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $username = $row['name'];
  $sql = "SELECT * from userdata WHERE u_id!='{$_POST['u_id']}'";
  $result= mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    $msg = $username . ' 이(가) 글을 썼다고 한다! 들어가서 확인하길!';
    $sql = "
      INSERT INTO notif
        (notif_msg, publish_date,username, link)
        VALUES (
           '{$msg}',
            NOW(),
           '{$row['id']}',
           '{$_POST['link']}'
        )
    ";
    mysqli_query($conn, $sql);
  }

}

?>
