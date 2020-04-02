<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dashboard</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="./js/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="./js/bootstrap.min.js"></script>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="./css/fontawesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <link rel="stylesheet" href="./css/dashboard.css">
        <script src="./js/bg.js"></script>
    </head>
    <body>
        <div class="container">
            <header>
                <div class="col-sm-2 logo-part">
                    <h2 style="font-family:'Courier New'; margin:0;">Nardis<h2>
                </div>
                <div class="col-sm-6">
                    <!-- <div class="wrap">
                       <div class="search">
                          <input type="text" class="searchTerm" placeholder="What are you looking for?">
                          <button type="submit" class="searchButton">
                            <i class="fa fa-search"></i>
                         </button>
                       </div>
                    </div> -->
                </div>
                <div class="col-sm-2">

                </div>
                <div class="col-sm-1 support">
                    <br><a href="">Support</a>
                </div>
                <div class="col-sm-1 logout">
                    <br> <a href="../nardis_login/logout.php">Log Out</a>
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
                            <td class="non-menu" id="all-comments"> <a href="dashboard.php">All Comments</a></td>
                        </tr>
                        <tr>
                            <td class="non-menu" id="friends-list"><a href="friends_list.php">Me and My Friends</a></td>
                        </tr>
                        <tr>
                            <td class="non-menu" id="explore-friends"> <a href="explore_friends.php">Explore Friends</a></td>
                        </tr>
                        <tr>
                            <td class="non-menu active-table" id="requests"> <a href="requests.php">Friend Requests</a></td>
                        </tr>
                    </table>
                </div>
                <div class="non-left-menu right-menu col-sm-10">
                    <table class="table friends-table">
                        <thead>
                            <th>Requests</th>
                        </thead>
                        <?php
                        session_start();
                        $conn = mysqli_connect("localhost", "nardis", "kmlagalbi*01", "nardis");
                          $sql = "SELECT * FROM user_relation WHERE relatedUserID = '{$_SESSION['id']}' AND isAccepted = 0";
                          $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)) {
                          $sql2 = "SELECT * FROM userdata WHERE id = '{$row['relatingUserID']}'";
                          $result2 = mysqli_query($conn, $sql2);
                          $row2 = mysqli_fetch_array($result2);
                          ?>
                        <tr>
                            <td>
                                <a href="#"><img src="./images/get_started.png" class="friends-profile">
                                <div class="friend-name">
                                    <a href="https://google.com"><?php echo $row2['name']; ?></a>
                                </div>
                                <div class="buttons">
                                    <div class="accept-friend">
                                      <form method="post" action="../backend/nardis_friend/friendaccept.php">
                                        <input type="hidden" name = "relatingUserID" value = "<?php echo $_SESSION['id']?>">
                                        <input type="hidden" name = "relatedUserID" value = "<?php echo $row['relatingUserID']?>">
                                        <button type="submit" class="btn btn-xs btn-success" name="button">Accept Request</button>
                                      </form>
                                    </div>
                                    <div class="reject-friend">
                                      <form method="post" action="../backend/nardis_friend/friendreject.php">
                                        <input type="hidden" name = "relatingUserID" value = "<?php echo $row['relatingUserID']?>">
                                        <input type="hidden" name = "relatedUserID" value = "<?php echo $_SESSION['id']?>">
                                        <button type="submit" class="btn btn-xs btn-danger" name="button">Reject Request</button>
                                      </form>
                                    </div>
                                </div>
                            </td>
                            <?php if($row = mysqli_fetch_array($result)) {
                              $sql2 = "SELECT * FROM userdata WHERE id = '{$row['relatingUserID']}'";
                              $result2 = mysqli_query($conn, $sql2);
                              $row2 = mysqli_fetch_array($result2);
                              ?>
                                <td>
                                    <a href="#"><img src="./images/get_started.png" class="friends-profile">
                                    <div class="friend-name">
                                        <a href="https://google.com"><?php echo $row2['name']; ?></a>
                                    </div>
                                    <div class="buttons">
                                        <div class="accept-friend">
                                          <form method="post" action="../backend/nardis_friend/friendaccept.php">
                                            <input type="hidden" name = "relatingUserID" value = "<?php echo $_SESSION['id']?>">
                                            <input type="hidden" name = "relatedUserID" value = "<?php echo $row['relatingUserID']?>">
                                            <button type="submit" class="btn btn-xs btn-success" name="button">Accept Request</button>
                                          </form>
                                        </div>
                                        <div class="reject-friend">
                                          <form method="post" action="../backend/nardis_friend/friendreject.php">
                                            <input type="hidden" name = "relatingUserID" value = "<?php echo $row['relatingUserID']?>">
                                            <input type="hidden" name = "relatedUserID" value = "<?php echo $_SESSION['id']?>">
                                            <button type="submit" class="btn btn-xs btn-danger" name="button">Reject Request</button>
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
