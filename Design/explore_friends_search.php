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
                <div class="col-sm-2"></div>
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
                            <td class="non-menu active-table" id="explore-friends"> <a href="explore_friends.php">Explore Friends</a></td>
                        </tr>
                        <tr>
                            <td class="non-menu" id="requests"> <a href="requests.php">Friend Requests</a></td>
                        </tr>
                    </table>
                </div>
                <div class="non-left-menu right-menu col-sm-10">
                    <table class="table friends-table">
                        <thead>
                            <th>Search Results for <?php echo $_POST['search']; ?></th>
                            <th class="friend-search">
                              <form method="post" action="explore_friends_search.php">
                                <input type="text" class="searchTerm" placeholder="Search.." name="search">
                                <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
                              </form>
                            </th>
                        </thead>
                        <?php
                        $search = $_POST['search'];
                        session_start();
                        $conn = mysqli_connect("localhost", "nardis", "kmlagalbi*01", "nardis");
                          $sql = "SELECT * FROM userdata u
                          WHERE u.id NOT IN (SELECT r.relatedUserID FROM user_relation r WHERE (relatingUserID = '{$_SESSION['id']}' AND isAccepted = 1) OR (relatedUserID = '{$_SESSION['id']}' AND isAccepted = 1))
                          AND u.id != '{$_SESSION['id']}'
                          AND u.id LIKE '%$search%' ";
                          $result = mysqli_query($conn, $sql);
                        if($result) {
                        while($row = mysqli_fetch_array($result)) {
                          $sql2 = "SELECT * FROM user_relation
                            WHERE relatingUserID = '{$_SESSION['id']}' AND relatedUserID = '{$row['id']}' AND isAccepted = 0";
                          $result2 = mysqli_query($conn, $sql2);
                           ?>
                        <tr>
                            <?php if($row2 = mysqli_fetch_array($result2)) { ?>
                            <td>
                                <a href="#"><img src="./images/get_started.png" class="friends-profile">
                                <div class="friend-name">
                                    <a href="https://google.com"><?php echo $row['name']; ?></a>
                                    <?php echo "<p>request is already sent</p>";?>
                                </div>
                                <div class="buttons">
                                    <div class="add-friend">
                                      <form method="post" action="../backend/nardis_friend/friendrequestcancel.php">
                                        <input type="hidden" name = "relatingUserID" value = "<?php echo $_SESSION['id']?>">
                                        <input type="hidden" name = "relatedUserID" value = "<?php echo $row['id']?>">
                                        <input type="hidden" name = "isAccepted" value = "0">
                                        <button type="submit" class="btn btn-sm btn-secondary" name="button">Cancel Request</button>
                                      </form>

                                    </div>
                                </div>
                            </td>
                          <?php
                           continue;
                          }
                          $sql3 = "SELECT * FROM user_relation
                            WHERE relatingUserID = '{$row['id']}' AND relatedUserID = '{$_SESSION['id']}' AND isAccepted = 0";
                          $result3 = mysqli_query($conn, $sql3);

                          if($row3 = mysqli_fetch_array($result3)) {
                            continue;
                          }
                          ?>
                          <td>
                              <a href="#"><img src="./images/get_started.png" class="friends-profile">
                              <div class="friend-name">
                                  <a href="https://google.com"><?php echo $row['name']; ?></a>
                              </div>
                              <div class="buttons">
                                  <div class="add-friend">
                                    <form method="post" action="../backend/nardis_friend/friendrequest.php">
                                      <input type="hidden" name = "relatingUserID" value = "<?php echo $_SESSION['id']?>">
                                      <input type="hidden" name = "relatedUserID" value = "<?php echo $row['id']?>">
                                      <input type="hidden" name = "isAccepted" value = "0">
                                      <button type="submit" class="btn btn-sm btn-success" name="button">Send Request</button>
                                    </form>
                                  </div>
                              </div>
                          </td>

                        <?php
                        if($row = mysqli_fetch_array($result)) {

                          $sql2 = "SELECT * FROM user_relation
                            WHERE relatingUserID = '{$_SESSION['id']}' AND relatedUserID = '{$row['id']}' AND isAccepted = 0";
                          $result2 = mysqli_query($conn, $sql2);
                           ?>
                          <tr>
                            <?php if($row2 = mysqli_fetch_array($result2)) { ?>
                            <td>
                                <a href="#"><img src="./images/get_started.png" class="friends-profile">
                                <div class="friend-name">
                                    <a href="https://google.com"><?php echo $row['name']; ?></a>
                                    <?php echo "<p>request is already sent</p>";?>
                                </div>
                                <div class="buttons">
                                    <div class="add-friend">
                                      <form method="post" action="../backend/nardis_friend/friendrequestcancel.php">
                                        <input type="hidden" name = "relatingUserID" value = "<?php echo $_SESSION['id']?>">
                                        <input type="hidden" name = "relatedUserID" value = "<?php echo $row['id']?>">
                                        <input type="hidden" name = "isAccepted" value = "0">
                                        <button type="submit" class="btn btn-sm btn-secondary" name="button">Cancel Request</button>
                                      </form>

                                    </div>
                                </div>
                            </td>
                          <?php
                           continue;
                          }
                          $sql3 = "SELECT * FROM user_relation
                            WHERE relatingUserID = '{$row['id']}' AND relatedUserID = '{$_SESSION['id']}' AND isAccepted = 0";
                          $result3 = mysqli_query($conn, $sql3);

                          if($row3 = mysqli_fetch_array($result3)) {
                            continue;
                          }
                          ?>
                          <td>
                              <a href="#"><img src="./images/get_started.png" class="friends-profile">
                              <div class="friend-name">
                                  <a href="https://google.com"><?php echo $row['name']; ?></a>
                              </div>
                              <div class="buttons">
                                  <div class="add-friend">
                                    <form method="post" action="../backend/nardis_friend/friendrequest.php">
                                      <input type="hidden" name = "relatingUserID" value = "<?php echo $_SESSION['id']?>">
                                      <input type="hidden" name = "relatedUserID" value = "<?php echo $row['id']?>">
                                      <input type="hidden" name = "isAccepted" value = "0">
                                      <button type="submit"  class="btn btn-sm btn-success" name="button">Send Request</button>
                                    </form>
                                  </div>
                              </div>
                          </td>

                        <?php
                        }
                        ?>
                      </tr>
                      <?php
                      }}
                      ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
