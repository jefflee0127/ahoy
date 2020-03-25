<?php
$conn = mysqli_connect('localhost', 'root', 'cw6y9m','mention');
$sql = "SELECT * from notif WHERE username='{$_POST['id']}' ORDER BY id DESC";
//$sql = "SELECT * from link";
//echo $sql;
$result = mysqli_query($conn, $sql);
//$row = mysqli_fetch_array($result);
//$index = $row[0];
//$sql = "SELECT * from comment LEFT JOIN userdata ON comment.author_id = userdata.u_id WHERE link_Id=$index";
//$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){//<li><a href=\"index.php?id=19\">Mysql</a></li>
$msg = $row['notif_msg'];
$alert = "
<tr>
  <td name='notif' value='hello'><a href=\"{$row['link']}\" target=\"_blank\">{$msg}</a></td>
</tr>
";
echo $alert;
}
?>
