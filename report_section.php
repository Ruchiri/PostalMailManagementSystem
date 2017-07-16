<?php
session_start();
$section = $_SESSION['section'];
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <A HREF="javascript:history.go()"></A>
    <title>වාර්තා ලබා ගැනීම</title>
    <link rel="stylesheet" href="css/report_section.css">
    <script type="text/javascript">
        function checkForm(form) {
            if(form.date1.value=="" || form.date2.value==""){
                alert("Enter dates");
                return false;
            }else{
                return true;
            }
        }

    </script>
</head>
<body>
<div class="Background">
    <div class="system">
        <img src="img/new.jpg" alt="new">
    </div>
    <div class="heading">
        <p><strong>වාර්තා ලබා ගැනීම</strong></p>
    </div><!--Heading-->
    <div class="Choose-date">
        <form name="myForm" action="report.php" method="get" onsubmit="return checkForm(this)">
         <ul>
            <p><strong>අදාල කාල පරාසය තෝරන්න</strong></p>
            <div class=" Start-date">
                <ul>
                    <p>ආරම්භක සෙවුම් දිනය</p>
                    <input type="date" name="date1" id="date1" />
                </ul>
            </div><!--start-date-->
            <div class="End-date">
                <ul>
                    <p>අවසාන සෙවුම් දිනය</p>
                    <input type="date" name="date2" id="date2" />
                </ul>
            </div><!--End-date-->

             <div class="generate">
                 <input type="submit" name="report"  value="වාර්තා ලබා ගැනීම"   >

             </div>
             </a>
        </ul>
        </form>

    </div><!--Choose-date-->

</div><!--Background-->
</body>
</html>