<?php
$select = FALSE;
if (isset($_GET['btn'])) {
    /* '<script>var values=[];
     $("input").each( function (){
         values.push($(this).val());
     });
     </script>';*/

    $select = $_GET['letterno'] || $_GET['date'] || $_GET['section'] || $_GET['subject'] || $_GET['sender'];
    echo '<script>alert("submit pressed")</script>';
    echo var_dump($_GET);
}
if ($select && isset($GET['btn'])) {
    echo '<script>alert(var_dump())</script>';
    exit();
} elseif (!empty($GET)) {
    echo '<script>alert("INPUT IS NOT SET");</script>';
}


?>


<!DOCTYPE html>
<html lang="en">s
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" href="css/search.css.css">
    <script type="text/javascript" src="searchFunctions.js"></script>

</head>
<body>
<div class="wrapper">
    <div class="top-bar-search">
        <h1>තැපැල්පත් සෙවීම</h1>
    </div>
</div>
<div class="seach-Model">
    <div class="search-bar">
        <div class="criteria1">
            <h3>තැපැල්පත් අංකය</h3>
        </div>

        <div class="criteria2">
            <h3>දිනය</h3>
        </div>


        <div class="criteria3">
            <h3>අංශය</h3>
        </div>


        <div class="criteria4">
            <h3>විෂය</h3>
        </div>

        <div class="criteria5">
            <h3>ලිපිය එවූ පාර්ශවය</h3>
        </div>
    </div>


    <div class="search-bottom-bar">
        <form action="<?php $_PHP_SELF ?>" method="GET">
            <div class="txtLetterNo">
                <input type="text" name="letterno" id="letterno"/>
            </div>
            <div class="dDate">
                <input type="date" name="date" id="date"/>
            </div>
            <div class="txtSection">

                <input type="text" list="sections" name="section" id="section"/>
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


            </div>
            <div class="txtSubject">
                <input type="text" name="subject" id="subject"/>
            </div>
            <div class="lstSender">
                <input type="text" name="sender" id="sender"/>
            </div>
            <br>

            <div class="search-button" type="button">
                <input type="submit" name="btn" id="btn" onclick="getCriterialist()" value="සොයන්න">

            </div>
            <br>

        </form>
    </div>

    <div class="search-results">
        <p>searching results...............................</p>
    </div>


</div>

</body>
</html><?php
$select = FALSE;
if (isset($_GET['btn'])) {
    /* '<script>var values=[];
     $("input").each( function (){
         values.push($(this).val());
     });
     </script>';*/

    $select = $_GET['letterno'] || $_GET['date'] || $_GET['section'] || $_GET['subject'] || $_GET['sender'];
    echo '<script>alert("submit pressed")</script>';
    echo var_dump($_GET);
}
if ($select && isset($GET['btn'])) {
    echo '<script>alert(var_dump())</script>';
    exit();
} elseif (!empty($GET)) {
    echo '<script>alert("INPUT IS NOT SET");</script>';
}


?>


<!DOCTYPE html>
<html lang="en">s
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" href="css/search.css">
    <script type="text/javascript" src="searchFunctions.js"></script>

</head>
<body>
<div class="wrapper">
    <div class="top-bar-search">
        <h1>තැපැල්පත් සෙවීම</h1>
    </div>
</div>
<div class="seach-Model">
    <div class="search-bar">
        <div class="criteria1">
            <h3>තැපැල්පත් අංකය</h3>
        </div>

        <div class="criteria2">
            <h3>දිනය</h3>
        </div>


        <div class="criteria3">
            <h3>අංශය</h3>
        </div>


        <div class="criteria4">
            <h3>විෂය</h3>
        </div>

        <div class="criteria5">
            <h3>ලිපිය එවූ පාර්ශවය</h3>
        </div>
    </div>


    <div class="search-bottom-bar">
        <form action="<?php $_PHP_SELF ?>" method="GET">
            <div class="txtLetterNo">
                <input type="text" name="letterno" id="letterno"/>
            </div>
            <div class="dDate">
                <input type="date" name="date" id="date"/>
            </div>
            <div class="txtSection">

                <input type="text" list="sections" name="section" id="section"/>
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


            </div>
            <div class="txtSubject">
                <input type="text" name="subject" id="subject"/>
            </div>
            <div class="lstSender">
                <input type="text" name="sender" id="sender"/>
            </div>
            <br>

            <div class="search-button" type="button">
                <input type="submit" name="btn" id="btn" onclick="getCriterialist()" value="සොයන්න">

            </div>
            <br>

        </form>
    </div>

    <div class="search-results">
        <p>searching results...............................</p>
    </div>


</div>

</body>
</html>