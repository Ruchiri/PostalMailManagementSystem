<?php
session_start();
$_SESSION['section'] = $_SESSION['page'];
?>

      <!DOCTYPE html>

      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <title><?php include "inc/login.inc.php";
              echo $_SESSION['page'];
              ?> </title>
          <link rel="stylesheet" type="text/css" href="css/account-section.css">

      </head>

      <a href="logout.php"></a>
      <body>
      <div class="Wrapper">

          <div class="topbar clearfix">
              <h1>බෝපෙ-පෝද්දල ප්‍රාදේශීය ලේකම් කාර්යාලය
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

                  <input type="button" value="පිළිතුරු සැපයූ ලිපි ලැයිස්තුව" onclick="openRepliedList()"/>
                  <script type="text/javascript">
                      var repliedWindow;
                      function openRepliedList() {
                          repliedWindow = window.open('http://www.bopepoddala.ds.gov.lk/', 'blank', 'height=600,width=600');
                      }
                  </script>

                  <input type="button" value="වාර්තා ලබාගැනීම" onclick="openRepliedList()"/>
                  <script type="text/javascript">
                      var repliedWindow;
                      function openRepliedList() {
                          repliedWindow = window.open('http://www.bopepoddala.ds.gov.lk/', 'blank', 'height=600,width=600');
                      }
                  </script>

              </div> <!--    buttons-->
              <div class="tobereply">
                  <h2> පිළිතුරු සැපයිය යුතු ලිපි</h2>
              </div><!--   tobereply-->
          </div> <!-- core    -->
      </div><!-- Wrapper-->
      </body>
      </html>

