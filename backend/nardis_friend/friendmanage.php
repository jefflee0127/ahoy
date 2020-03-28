<!DOCTYPE html>
<html>
<h1>Friends Management</h1>
<?php
session_start();
echo "Welcome, ".$_SESSION['name']."!"; ?>
<p><a href = "friendsearch.php">Find new friends</a></p>
<p><a href = "receivedfriendrequest.php">See received requests</a></p>
<p><a href = "friendlist.php">See your Friends List</a></p>
<br>
<p><a href = "../nardis_login/index.php">Go back to Main page</a></p>
</html>
