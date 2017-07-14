<!DOCTYPE html>
<html lang="en">
<head>
    <title>පිළිතුරු ලිපිය</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/replyletter.css">
</head>
<body>
<div class="wrapper">
    <div class="top-bar">
        <h1>පිළිතුරු ලිපිය</h1>
    </div>
    <div class="reply-letter-model">
        <ul>
            <form method="GET" ACTION="inc/reply_sheet.inc.php">
            <li>
                <label > <strong>යවන්නාගේ ලිපිනය</strong></label> <br/>
                <textarea name="txtsenderAddress" cols="60" rows="8" oninvalid="this.setCustomValidity('යවන්නාගේ ලිපිනය ඇතුලත් කරන්න')" required title="යවන්නාගේ ලිපිනය"></textarea >

            </li>

            <li>
                <label><strong>දිනය</strong></label><br/>
                <input type="date" name="ddate" oninvalid="this.setCustomValidity('දිනය ඇතුලත් කරන්න')" title="දිනය" required>
            </li>

            <li>
                <label><strong>ලබන්නාගේ ලිපිනය</strong></label><br/>
                <textarea name="txtreceiverAddress" cols="60" rows="8" oninvalid="this.setCustomValidity('ලබන්නාගේ ලිපිනය ඇතුලත් කරන්න')" title="ලබන්නාගේ ලිපිනය" required></textarea >
            </li>

            <li>
                <label><strong>ආමන්ත්‍රණය</strong></label><br/>
                <textarea name="txtsalutation" cols="60" rows="1" oninvalid="this.setCustomValidity('ආමන්ත්‍රණය ඇතුලත් කරන්න')" title="ආමන්ත්‍රණය" required></textarea>
            </li>

            <li>
                <label><strong>විෂයය</strong></label><br/>
                <textarea name="txtSubject" cols="80" rows="2" oninvalid="this.setCustomValidity('විෂයය ඇතුලත් කරන්න')" title="විෂයය" required></textarea>
            </li>

            <li>
                <label> <strong>අන්තර්ගතය</strong></label><br/>
                <textarea name="txtletterBody" cols="80" rows="20" oninvalid="this.setCustomValidity('අන්තර්ගතය ඇතුලත් කරන්න')" title="අන්තර්ගතය" required></textarea>
            </li>

            <li>
                <label> <strong>අවසානය</strong></label><br/>
                <textarea name="txtend" cols="60" rows="5" oninvalid="this.setCustomValidity('අවසානය ඇතුලත් කරන්න')" title="අවසානය" required></textarea>
            </li>
        </ul>
        <input id="button" type="submit" value="ඇතුලත් කරන්න" name="submit" onclick="openReply()" >
     <script type="text/javascript">
            var replyWindow;
            function openReply() {
                replyWindow = window.open('inc/reply_sheet.inc.php' ,'blank','');
            }
</script>

</form>

</div>
</div>

</body>
</html>