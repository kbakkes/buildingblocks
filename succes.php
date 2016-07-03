
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<p>
<table class="table">
    <th>id</th>
    <th>name</th>
    <th>score</th>
    <th>edit</th>
    <th>delete</th>


<?php
// Haal comments weg om te zien wat er bij de $_POST meegegeven wordt.
//      var_dump($_POST);



// connect met database
require("connect.php");
        if (isset($_POST['submit'])) {
            $username = strip_tags($_POST['username']);
            $password = strip_tags($_POST['password']);
        }





// query de database
$resultSet = $connect->query("SELECT * FROM `users`");



    while($rows = $resultSet->fetch_assoc()){
        $name = $rows['username'];
        $pass = $rows['password'];
    }



if ($username === $name &&  md5($password) === $pass){
    // als de username en wachtwoord juist zijn dan runt de volgende code
    echo"Login Successful! <br>";

    // sluit connectie met de login database
    mysqli_close($connect);

    // maak nieuwe connectie met highscores database
    $highscoreConnect = mysqli_connect("localhost","root","","plasticats");

    // query de highscore database
    $results = $highscoreConnect->query("SELECT * FROM `highscores`");


    if ($resultSet->num_rows != -0) {
        while ($HSrows = $results->fetch_assoc()) {
            $id = $HSrows ['id'];
            $naam = $HSrows['name'];
            $score = $HSrows ['scores'];



            echo "
    <tr></tr>
    <td>$id</td>
    <td>$naam</td>
    <td>$score</td>
    <td><a href='update.php?id=$id&name=$naam&score=$score'>Edit</a></td>
    <td><a href='delete.php?id=$id&name=$naam&score=$score'>Delete</a></td>
   <br>";
        }


    }
    echo" <a href='create.php'>Create new Row</a> <br><br>";



}
else {
    header("location: login.php");
}








?>


</body>
</html>