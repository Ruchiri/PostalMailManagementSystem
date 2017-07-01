<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" href="css/search.css">
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
        <div class="txtLetterNo">
            <p><input type="text" name="Letter number"/></p>
        </div>
        <div class="dDate">
            <p><input type="date"/></p>
        </div>
        <div class="txtSection">
            <P>
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
            </P>

        </div>
        <div class="txtSubject">
            <p><input type="text" name="Subject"></p>
        </div>
        <div class="lstSender">
            <p><input type="text" name="Sender"></p>
        </div>
    </div>
    <br>

    <div class="search-button">
        <button type="button">සොයන්න</button>
    </div>
    <br>

    <div class="search-results">
        <p>searching results...............................</p>
    </div>


</div>

</body>
</html>