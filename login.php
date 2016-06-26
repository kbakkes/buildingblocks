
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in</title>
</head>
<body>

<h1> Log in</h1>
<form name="login" method="post" onsubmit="return validateForm()" action="succes.php">
    <input type="text" id="username" placeholder="Username" name="username"> <br><br>
    <input type="password" id="password" placeholder="Password" name="password"> <br><br>
    <input type="submit" name="submit" value="Log in">

</form>
<script>
    function validateForm() {
        var formName = document.forms["login"]["username"].value;
        var formPass = document.forms["login"]["password"].value;

        if (formName == null || formName == "") {
            alert("Name must be filled in");
            return false;
        }

        if (formPass == null || formPass == "") {
            alert("Password must be filled in");
            return false;
        }

    }
</script>




</body>
</html>