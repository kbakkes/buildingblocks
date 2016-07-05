<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create new Row</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
    <form class="container container-table" action="" method="post">

        <h4>Name:</h4>
        <input type="text" name="name" value="Name">
        <h4>Wave:</h4>
        <input type="text" name="wave" value="Wave">
        <h4>Score:</h4>
        <input type="text" name="score" value="Score">
        <br><br>
        <input type="submit" class="btn" name="submit" value="Create">
    </form>

    <?php
        if (isset($_POST['submit'])) {

            $new_name = htmlspecialchars($_POST['name']);
            $new_score = htmlspecialchars($_POST['score']);
            $new_wave = htmlspecialchars($_POST['wave']);

            $highscoreConnect = mysqli_connect("localhost", "root", "", "plasticats");

            $sql_create = "INSERT INTO `highscores` (`id`, `name`, `scores`) VALUES (NULL, '{$new_name}', '{$new_score}')";
            $wave_create = "INSERT INTO `wavescore` (`id`, `score`, `wave`) VALUES (NULL, '{$new_score}', '{$new_wave}')";

            mysqli_query($highscoreConnect,$sql_create);
            mysqli_query($highscoreConnect,$wave_create);

            header("Location: succes.php");
        }
    ?>
</body>
</html>
