<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
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
    echo"Login succesfull!";

}
else {
    header("location: login.php");
}
?>
</body>
</html>
