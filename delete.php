<?php
$id = $_GET['id'];
$name = $_GET['name'];
$score = $_GET['score'];
$wave = $_GET['wave'];
$waveID = $_GET['waveID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Delete Row #<?=$id?></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>

<form class="container container-table" method="post" action="">
    <h2>Are you sure you want to delete this row?</h2>
    <h3>Name: <?=$name ?></h3>
    <h3>Name: <?=$wave ?></h3>
    <h3>Score: <?=$score ?></h3>
    <input type="submit" class="button" name="submit" value="Delete">
</form>
<?php
if(isset($_POST['submit'])) {
    $highscoreConnect = mysqli_connect("localhost", "root", "", "plasticats");

    $sql_delete = "DELETE FROM `highscores` WHERE `highscores`.`id` = {$id}";
    $wave_delete = "DELETE FROM `wavescore` WHERE `wavescore`.`id` = {$waveID}";

    mysqli_query($highscoreConnect,$sql_delete);
    mysqli_query($highscoreConnect,$wave_delete);

 header("Location: succes.php");
}
?>
</body>
</html>
