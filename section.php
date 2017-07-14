<?php
session_start();


?>

      <!DOCTYPE html>

      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <title><?php include "inc/login.inc.php";

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
                      include "connect.php";
                      $con=connect();
                      $section= $_SESSION['page'];
                      $_SESSION['section'] = $section;
                      try{
                          mysqli_set_charset($con, 'utf8');
                          $query = "select * from letter where section='$section' and replied=0";
                          mysqli_set_charset($con, 'utf8');
                          $data =mysqli_query($con,$query);


                          echo '<table width="100%" border="2" cellpadding="6" cellspacing="5">
         <tr>
             <th>ලියාපදිංචි අංකය</th>
             <th>දිනය</th>
             <th>ලිපිය එවූ පාර්ශවය</th>
             <th>විෂයය</th>
             <th>ලිපිය</th>
         </tr>';

                          foreach($data as $row)

                          {

                              echo '<tr>  
             <td>'.$row["ref_id"].'</td>
             <td>'.$row["date"].'</td>  
             <td>'.$row["sender"].'</td>
             <td>'.$row["subject"].'</td>
             <td> '?> <a href="letter_record_window.php?reg_no=<?php echo $row["reg_no"]; ?>&date=<?php echo $row["date"]; ?>&subject=<?php echo $row["subject"]; ?>&section=<?php echo $row["section"]; ?>&sender=<?php echo $row["sender"]; ?>&scan_copy=<?php echo $row["rec_letter"]; ?>&ref_id=<?php echo $row["ref_id"]; ?>&thisSection=<?php echo $thisSection ?> "> <img src="img/twitter.png"></a>  <?php '</td>
           </tr>';
                          }
                          echo '</table>';
                      }

                      catch(Exception $error) {
                          $error->getMessage();

                      }
                      ?>
                  </div> <!-- content-->
              </div><!--   tobereply-->
          </div> <!-- core    -->
      </div><!-- Wrapper-->
      </body>
      </html>

