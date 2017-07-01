<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>වාර්තා ලබා ගැනීම</title>
    <link rel="stylesheet" href="css/report_main_user.css">


</head>
<body>
<div class="heading">
    <p><strong>වාර්තා ලබා ගැනීම <br>අංශය</strong></p>
</div><!--Heading-->
<div class="selection">
<div class="Choose-date">
    <ul>
        <p><strong>අදාල කාල පරාසය තෝරන්න</strong></p>
        <div class=" Start-date">
            <ul>
                <p>ආරම්භක සෙවුම් දිනය</p>
                <input type="date" />
            </ul>
        </div><!--start-date-->
        <div class="End-date">
            <ul>
                <p>අවසාන සෙවුම් දිනය</p>
                <input type="date"/>
            </ul>

        </div><!--End-date-->

    </ul>

</div><!--Choose-date-->
    <div class="Section">
        <ul>
            <p>අංශය</p>
            <input type="text" list="sections">
            <datalist id="sections">
                <option> ප්‍රධාන පරිශීලක</option>
                <option> ආයතන</option>
                <option> ගිනුම් අංශය</option>
                <option> සංවර්ධන අංශය</option>
                <option> ඉඩම් අංශය</option>
                <option> සමාජ සේවා අංශය</option>
                <option> දිවි නැගුම අංශය</option>
                <option> ක්ෂේත්‍ර</option>
                <option> ලියාපදිංචි අංශය</option>
                <option> මුදල් හා චෙක්පත් අංශය</option>
                <option> ප්‍රධාන නිලධාරී</option>
            </datalist>
        </ul>

    </div><!--Section-->
</div>    <!--Selection-->
<div class="generate">
    <button>වාර්තා ලබා ගැනීම</button>
</div>
<div class="Report-results">
    <p>ප්‍රතිඵල...</p>
</div><!--Search-results-->
</body>
</html>