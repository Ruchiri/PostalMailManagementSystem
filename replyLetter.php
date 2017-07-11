<!DOCTYPE html>
<html lang="en">
<head>
    <title>පිළිතුරු ලිපිය</title>
    <link rel="stylesheet" href="css/replyletter.css">
</head>
<body>
<div class="wrapper">
    <div class="top-bar">
        <h1>පිළිතුරු ලිපිය</h1>
    </div>
    <div class="reply-letter-model">
        <ul>
            <form method="GET" ACTION=inc/reply_sheet.inc.php>
            <li>
                <label > <strong>යවන්නාගේ ලිපිනය</strong></label> <br/>
                <textarea name="txtsenderAddress" cols="80" rows="8" required title="යවන්නාගේ ලිපිනය"></textarea >

            </li>

            <li>
                <label><strong>දිනය</strong></label><br/>
                <input type="date" name="ddate" title="දිනය" required>
            </li>

            <li>
                <label><strong>ලබන්නාගේ ලිපිනය</strong></label><br/>
                <textarea name="txtreceiverAddress" cols="80" rows="8" title="ලබන්නාගේ ලිපිනය" required></textarea >
            </li>

            <li>
                <label><strong>ආමන්ත්‍රණය</strong></label><br/>
                <textarea name="txtsalutation" cols="40" rows="1" title="ආමන්ත්‍රණය" required></textarea>
            </li>

            <li>
                <label><strong>විෂයය</strong></label><br/>
                <textarea name="txtSubject" cols="80" rows="2" title="විෂයය" required></textarea>
            </li>

            <li>
                <label> <strong>අන්තර්ගතය</strong></label><br/>
                <textarea name="txtletterBody" cols="130" rows="20" title="අන්තර්ගතය" required></textarea>
            </li>

            <li>
                <label> <strong>අවසානය</strong></label><br/>
                <textarea name="txtend" cols="50" rows="5" title="අවසානය" required></textarea>
            </li>
        </ul>
        <input id="button" type="submit" value="ඇතුලත් කරන්න" name="submit" >
        </form>
    </div>
</div>


</body>
</html>