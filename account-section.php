<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ගිණුම් අංශය</title>
    <link rel="stylesheet" type="text/css" href="css/account-section.css">

</head>
<body>
<div class= "Wrapper">

    <div class="topbar clearfix">
        <h1>බෝපෙ-පෝද්දල ප්‍රාදේශීය ලේකම් කාර්යාලය
            <br>ගිණුම් අංශය</h1>
        <div class="site-search">
            <form method ="get"   action = account-section.php>
                <input type ="search"  name="search-box"  title="සොයන්න">
                <button type="submit">සොයන්න</button>
            </form>

        </div><!--site-search-->
    </div> <!-- topbar-->

    <div class="core">
    <div class="buttons">

        <input type="button" value="පිළිතුරු සැපයූ ලිපි ලැයිස්තුව" onclick="openRepliedList()"/>
        <script type="text/javascript">
            var repliedWindow;
            function openRepliedList() {
                repliedWindow = window.open('http://www.bopepoddala.ds.gov.lk/','blank','height=600,width=600');
            }
        </script>

        <input type="button" value="වාර්තා ලබාගැනීම" onclick="openRepliedList()"/>
        <script type="text/javascript">
            var repliedWindow;
            function openRepliedList() {
                repliedWindow = window.open('http://www.bopepoddala.ds.gov.lk/','blank','height=600,width=600');
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