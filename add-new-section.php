<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a New Section</title>
    <link rel="stylesheet" href="css/add-new-section.css">
</head>
<body>
<div class="heading">
    <p>නව අංශයක් ඇතුලත් කිරීම</p>
</div><!--Heading-->

<div class="Details">
    <ul>
        <?php if(isset($_GET['error'])) : ?>
            <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>
        <form action="add-section-submit.php" method="post">
            <label for="name1">අංශයේ නම</label><br>
            <input id="name" name="name" type="text" placeholder="අංශයේ නම ඇතුලත් කරන්න"><br>
            <label for="password1">මුර පදය</label><br>
            <input id="password" name="password" type="password" placeholder="මුර පදය ඇතුලත් කරන්න">

            <input type="Submit" value="ඇතුලත් කිරීම" name="Submit" id="btn"><br>
        </form>
    </ul>


</div><!--Details-->
<div class="Add">

</div><!--Add-->

</body>
</html>
