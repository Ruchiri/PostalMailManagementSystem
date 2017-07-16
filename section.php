<?php

include "connect.php";
$con=connect();
function getId($cor){
    return $cor;
}


?>

      <!DOCTYPE html>

      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <!--<META HTTP-EQUIV="refresh" CONTENT="30">-->
          <title><?php include "inc/login.inc.php";
              session_start();
              echo $_SESSION['page'];
              ?> </title>
          <style>
              body {
                  background-color: gainsboro;
                  background-size: 100%;
                  border-width: 20px;
              }
          </style>
          <link rel="stylesheet" type="text/css" href="css/account-section.css">

      </head>

      <a href="logout.php"></a>
      <body>
      <div class="Wrapper">

          <div class="topbar clearfix">
              <div class="main-img">
                  <img src="img/image2.jpg" alt="බෝපෙ-පෝද්දල ප්‍රාදේශීය ලේකම් කාර්යාලය ">
              </div><!--main-image-->
              <h1>
                  <br><?php
                  echo $_SESSION['page'];
                  ?></h1>
              <div class="site-search">
                  <form method="get" action="inc/search_query.inc.php">
                      <button type="button" id="btn" name="btn"
                              onclick="document.location.href='user_search_interface.php'">සොයන්න
                      </button>
                  </form>

              </div><!--site-search-->
          </div> <!-- topbar-->

          <div class="core">
              <div class="buttons">

                  <input type="button" value="පිළිතුරු සැපයූ ලිපි ලැයිස්තුව" onclick="document.location.href='replied_list.php'"/>

                  <input type="button" value="වාර්තා ලබාගැනීම" onclick="document.location.href='report_section.php'"/>


              </div> <!--    buttons-->
              <div class="tobereply">
                  <h2> පිළිතුරු සැපයිය යුතු ලිපි</h2>
                  <div class="content">
                      <?php

                      $section= $_SESSION['page'];
                      $_SESSION['section'] = $section;


                          mysqli_set_charset($con, 'utf8');
                          $query = "select * from letter where section='$section' and replied=0";
                          mysqli_set_charset($con, 'utf8');
                          $data =mysqli_query($con,$query);
                          $array=mysqli_fetch_array($data);
                          if(empty($array)){
                              echo "පිළිතුරු සැපයීමට නව ලිපි නොමැත!";
                          }
                          else{
                      ?>
                      <div class="letter">
                        <?php  foreach ($data as $row) {?>
                            <div class="model">
                            <ul>
                                <li><?php echo "ලියාපදිංචි අංකය :" . $row["ref_id"]; ?></li>
                                <li><?php echo "දිනය :" . $row["date"]; ?></li>
                                <li><?php echo "ලිපිය එවූ පාර්ශවය :" . $row["sender"]; ?></li>
                                <li><?php echo "විෂයය :" . $row["subject"]; ?></li>
                                <li id="gotoletter">
                                    <a href="letter_record_window.php?id=<?php echo $row["id"] ?>&thisSection=<?php "su" ?>"><img
                                                src="img/letter.png"/>
                                    </a>
                                </li>
                                <li id="replied">
                                    <a href="inc/mark_read.inc.php?id=<?php echo $row["id"] ?>"><img
                                                src="img/rmm.png"/>
                                    </a>
                                </li>
                            </ul>
                            </div> <!--model-->
                         <?php }?>

                      </div><!--letter-->
                  <?php }?>

                  </div> <!-- content-->
              </div><!--   tobereply-->
          </div> <!-- core    -->
      </div><!-- Wrapper-->
      </body>
      </html>

