<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/4.4.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <link rel="stylesheet" href="./css/dashboard.css">
        <script src="./js/bg.js"></script>
    </head>
    <body>
        <div class="container">
            <header>
                <div class="col-sm-2 logo">
                    <div></div>
                    <img src="./images/NARDIS.png" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="wrap">
                       <div class="search">
                          <input type="text" class="searchTerm" placeholder="What are you looking for?">
                          <button type="submit" class="searchButton">
                            <i class="fa fa-search"></i>
                         </button>
                       </div>
                    </div>
                </div>
                <div class="col-sm-4">

                </div>
                <div class="col-sm-1 support">
                    <br><a href="">Support</a>
                </div>
                <div class="col-sm-1 logout">
                    <br> <a href="login.html">Log Out</a>
                </div>
            </header>
            <div class="content">

                <div class="left-menu col-sm-2">
                    <table class="table menu-table">
                        <thead></thead>
                        <tr>
                            <td class="menu">Menu</td>
                        </tr>
                        <tr>
                            <td class="non-menu" id="all-comments"> <a href="dashboard.html">All Comments</a></td>
                        </tr>
                        <tr>
                            <td class="non-menu active-table" id="friends-list"><a href="friends_list.php">Me and My Friends</a></td>
                        </tr>
                        <tr>
                            <td class="non-menu" id="explore-friends"> <a href="explore_friends.php">Explore Friends</a></td>
                        </tr>
                        <tr>
                            <td class="non-menu" id="requests"> <a href="requests.php">Friend Requests</a></td>
                        </tr>
                    </table>
                </div>
                <div class="right-menu col-sm-5">
                    <table class="profile-table">
                        <thead>
                            <th>My Profile</th>
                            <th></th>
                        </thead>
                        <?php
                        session_start();
                        $conn = mysqli_connect(
                          'localhost:3307',
                          'root',
                          'cw6y9m',
                          'mention');
                          $sql = "SELECT * FROM user_relation WHERE relatingUserID = '{$_SESSION['id']}' AND isAccepted = '1'";
                          $result = mysqli_query($conn, $sql); ?>

                        <tr>
                            <td class="my-profile col-xs-2">
                                <div style="text-align:center;">
                                    <img src="./images/get_started.png" id="my-prof-pic">
                                </div>
                            </td>
                            <td class="col-xs-10">
                                <h3><?php echo $_SESSION['name']; ?></h3>
                                <p style="text-indent:1em"><a href="">Additional Info</a></p>
                            </td>
                        </tr>
                        <tr>
                            <div class="col-xs-1">
                            </div>
                            <table class="statistics col-xs-10">
                                <thead>
                                    <th>Statistics</th><th></th>
                                </thead>
                                <tr>
                                    <td>Comments</td>
                                    <td>1234</td>
                                </tr>
                                <tr>
                                    <td>Loves Received</td>
                                    <td>1234</td>
                                </tr>
                                <tr>
                                    <td>Pioneered Websites</td>
                                    <td>1234</td>
                                </tr>
                                <tr>
                                    <td>Badges</td>
                                    <td>1234</td>
                                </tr>
                            </table>
                            <div class="col-xs-1">

                            </div>
                        </tr>
                    </table>
                </div>
                <div class="right-menu col-sm-5">
                    <table class="friends-table">
                        <thead>
                            <th>My Friends</th>
                        </thead>
                        <?php
                        while($row = mysqli_fetch_array($result)) {
                          $sql2 = "SELECT * FROM userdata WHERE id = '{$row['relatedUserID']}'";
                          $result2 = mysqli_query($conn, $sql2);
                          $row2 = mysqli_fetch_array($result2);
                        ?>
                        <tr>
                            <td>
                                <a href="friend_profile.html"><img src="./images/get_started.png" class="friends-profile">
                                <div class="friend-name">
                                    <a href="friend_profile.html"><?php echo $row2['name']; ?></a>
                                </div>
                                <div class="buttons">
                                    <div class="delete-friend">
                                      <form method="post" action="../backend/nardis_friend/frienddelete.php">
                                        <input type="hidden" name = "relatingUserID" value = "<?php echo $_SESSION['id']?>">
                                        <input type="hidden" name = "relatedUserID" value = "<?php echo $row['relatedUserID']?>">
                                        <button type="submit" name="button">unfriend</button>

                                      </form>
                                    </div>
                                </div>
                            </td>
                            <?php
                            if($row = mysqli_fetch_array($result)) {
                              $sql2 = "SELECT * FROM userdata WHERE id = '{$row['relatedUserID']}'";
                              $result2 = mysqli_query($conn, $sql2);
                              $row2 = mysqli_fetch_array($result2);
                            ?>
                            <td>
                                <a href="friend_profile.html"><img src="./images/get_started.png" class="friends-profile">
                                <div class="friend-name">
                                    <a href="friend_profile.html"><?php echo $row2['name']; ?></a>
                                </div>
                                <div class="buttons">
                                    <div class="delete-friend">
                                      <form method="post" action="../backend/nardis_friend/frienddelete.php">
                                        <input type="hidden" name = "relatingUserID" value = "<?php echo $_SESSION['id']?>">
                                        <input type="hidden" name = "relatedUserID" value = "<?php echo $row['relatedUserID']?>">
                                        <button type="submit" name="button">unfriend</button>

                                      </form>
                                    </div>
                                </div>
                            </td>
                            <?php
                            }
                            ?>
                        </tr>
                        <?php
                        }
                      ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>