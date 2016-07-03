<?php
$id = $_GET['id'];
$name = $_GET['name'];
$score = $_GET['score'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Row #<?=$id?></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>

<form class="container container-table" action="" method="post">

    <h4>Name:</h4>
    <input type="text" name="name" value="<?=$name?>">
    <h4>Score</h4>
    <input type="text" name="score" value="<?=$score?>">
    <br><br>
    <input type="submit" name="submit" value="Edit">
    </form>

<?php

if(isset($_POST['submit'])) {


    $new_name = htmlspecialchars($_POST['name']);
    $new_score = htmlspecialchars($_POST['score']);




    $highscoreConnect = mysqli_connect("localhost", "root", "", "plasticats");

    $sql_update = "UPDATE `highscores` SET `name` = '{$new_name}', `scores` = '{$new_score}' WHERE `highscores`.`id` = {$id}";

    mysqli_query($highscoreConnect,$sql_update);

    header("Location: succes.php");
}




?>



</body>
</html>