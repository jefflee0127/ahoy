<!DOCTYPE html>
<html>
  <?php
  session_start();
  ?>
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
          <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->


          <link rel="stylesheet" href="dashboard.css">
          <script src="./js/bg.js"></script>
      </head>
    <body>
        <div class="container">
            <header>
                <div class="col-sm-2 logo-part">
                    <img src="./images/logo.png" class="logo">
                </div>
                <div class="col-sm-8"></div>
                <div class="col-sm-1 support">
                    <br> <a href="">Support</a>
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
                            <td class="non-menu active-table"><a href="dashboard.php">All Comments</a></td>
                        </tr>
                        <tr>
                            <td class="non-menu"><a href="friends_list.php">Me and My Friends</a></td>
                        </tr>
                        <tr>
                            <td class="non-menu" id="explore-friends"> <a href="explore_friends.php">Explore Friends</a></td>
                        </tr>
                        <tr>
                            <td class="non-menu" id="requests"> <a href="requests.php">Friend Requests</a></td>
                        </tr>
                    </table>
                </div>
                <div class="non-left-menu col-sm-10">
                    <div class="mid-menu folders col-sm-6">
                        <table class="table">
                            <thead>
                                <th style="padding: 5px;">
                                      Notifications
                                      <button><a href = "dashboard.php">Check All Comments</a></button>
                                      <button><a href = "dashboard3.php">Check My Comments</a></button>
                                </th>
                            </thead>
                            <tbody id = "alertarea">
                            </tbody>
                        </table>
                    </div>
                    <div class="right-menu col-sm-6">
                        <table class="table">
                            <thead>
                                <th> Comment Log
                                <button><a id = "newurl" href = "">Visit Website</a></button>
                                </th>
                            </thead>

                              <tbody id = "commentarea">
                              </tbody>


                        </table>
                    </div>
                </div>
              </div>
            </div>
    </body>
    <?php
    $id = $_SESSION['id'];
    ?>
  <script>
    function getNotif(id, alertarea) {
      hr = new XMLHttpRequest();
      var info="id="+id;
      hr.open("POST", "http://nardis.dothome.co.kr/nardis_core/notif_load_private2.php", true);
      hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      hr.onload = () => {
        const data = hr.responseText;
        //console.log(id);
        //console.log(data);
        alertarea.innerHTML = data;
        //console.log(data);
      };
      hr.send(info);
    };

    var alertarea = document.getElementById('alertarea');
    var id = '<?= $id ?>';
    getNotif(id, alertarea);

    function getUrl(box, url_input) {
          link = url_input;
          //console.log(link);
          hr2 = new XMLHttpRequest();
          var info="link="+link;
          //console.log(info);
          hr2.open("POST", "http://nardis.dothome.co.kr/nardis_core/comment_load_private2.php", true);
          hr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          hr2.onload = () => {
            const data = hr2.responseText;
            //console.log(data);
            box.innerHTML += data;
            //console.log(data);
          };
          hr2.send(info);
          changeurl(url_input);
      };
      function getUrl2(box, url_input) {


            link = url_input;
            //console.log(link);
            hr3 = new XMLHttpRequest();
            var info="link="+link;
            //console.log(info);
            hr3.open("POST", "http://nardis.dothome.co.kr/nardis_core/comment_load_private2.php", true);
            hr3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            hr3.onload = () => {
              const data = hr3.responseText;
              //console.log(data);
              box.innerHTML += data;
              //console.log(data);
            };
            hr3.send(info);
            changeurl(url_input);
        };

    var box = document.getElementById('commentarea');
    var url_input = "https://www.facebook.com/";
    //getUrl(box, url_input);

    function eraseCell(redirect) {
      document.getElementById('commentarea').innerHTML="";
      var hi = document.getElementById('commentarea');
      //alert(redirect);
      getUrl2(hi, redirect);
    };

    function changeurl(url_input) {
      var newurl = document.getElementById('newurl');
      //newurl.innerHTML=url_input;
      var n = "Visit Website: ".concat(url_input);
      newurl.innerHTML=n;
      $("#newurl").attr("href", url_input);
    }

  </script>
</html>
