
<?php
$naam = '';
$email = '';
$telefoon = '';
$behandeling = '';
$tijden = '';
$datum = '';


// Als er op sumbit word gedrukt gaat het systeem een controle op de velden uitvoeren
// Als deze goed is gaat hij de velden opslaan en posten
if (isset($_POST['submit'])) {

    $errors = [];

    if (!isset($_POST['naam']) || $_POST['naam'] === '') {
        $errors['name'] = ' Naam is een verplicht veld!';

    } else {
        $naam = $_POST['naam'];
    }


    if (!isset($_POST['email']) || $_POST['email'] === '') {
        $errors['email'] = ' Emailadres is een verplicht veld!';
    } else {
        $email = $_POST['email'];
    }


    if (!isset($_POST['telefoon']) || $_POST['telefoon'] === '') {
        $errors['telefoon'] = ' Telefoon nummer is een verplicht veld!';
    } else {
        $telefoon = $_POST['telefoon'];
    }

    if (!isset($_POST['behandeling']) || $_POST['behandeling'] === '') {
        $errors['behandeling'] = 'Behandeling is een verplicht veld!';
    } else {
        $behandeling = $_POST['behandeling'];
    }

    if (!isset($_POST['tijden']) || $_POST['tijden'] === '') {
        $errors['tijden'] = ' De tijd is een verplicht veld!';
    } else {
        $tijden = $_POST['tijden'];
    }

    if (!isset($_POST['datum']) || $_POST['datum'] === '') {
        $errors['datum'] = ' De datum is een verplicht veld!';
    } else {
        $datum = $_POST['datum'];
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reserveren</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
            <!--Datepicker    -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script> $(document).ready(function() { $("#datepicker").datepicker(
            {minDate: new Date()
            }

        ); });

    </script>
</head>
<body>


<div class="header">
    <!-- Titel voor in de banner -->
    <div id="titel">Berna's Hair & Beauty Salon</div>
</div>

<div class="nav ">
    <ul>
        <li class="col-md-1"><a href="index.html">Home</a></li>
        <li class="col-md-1"><a href="informatie.html">Informatie</a></li>
        <li class="col-md-1"><a href="reserveren.php">Reserveren</a></li>
        <li class="col-md-1"><a href="Prijzen.html">Prijzen</a></li>
        <li class="col-md-1"><a href="contact.html">Contact</a></li>

    </ul>
</div>

<div class="mobileNavBackground"></div>
<div class="content">


        <?php  // Bevestiging van de reservering

        if (empty($errors) && $_SERVER["REQUEST_METHOD"] === "POST") {
            echo "Uw reservering is geplaatst! </br>";
            echo "            ";
            printf('
                            <br>Naam: %s
                            <br>Emailadres: %s
                            <br>Telefoon: %s
                            <br>Behandeling: %s
                            <br>Tijd: %s
                            <br>Datum: %s
                            <br>',
                // Het controleren op speciale karakters in de velden en het vervolgens doorsturen
                htmlspecialchars($_POST['naam']),
                htmlspecialchars($_POST['email']),
                htmlspecialchars($_POST['telefoon']),
                htmlspecialchars($_POST['behandeling']),
                htmlspecialchars($_POST['tijden']),
                htmlspecialchars($_POST['datum']));


            // schoolserver
            $db = mysqli_connect('localhost', '0910135', 'siefieco', '0910135');
            //local
            // $db = mysqli_connect('localhost', 'root', '', 'reservering');
            // de ingevulde velden op de juiste plaats in de tabellen plaatsen
            $sql = sprintf("INSERT INTO formulier (naam, email, telefoon, behandeling, tijden, datum)VALUES (
     '%s','%s','%s','%s','%s','%s'
     )",


                // velden worden in de database gezet, en beschermd tegen SQL injections
                mysqli_real_escape_string($db, $naam),
                mysqli_real_escape_string($db, $email),
                mysqli_real_escape_string($db, $telefoon),
                mysqli_real_escape_string($db, $behandeling),
                mysqli_real_escape_string($db, $tijden),
                mysqli_real_escape_string($db, $datum));

            mysqli_query($db, $sql);
            mysqli_close($db);

        }

        ?>
        <br>

        <div class="form">
            <h2>Reserveren</h2>
            <br>
            <form class="reserveer" method="post" action="">
                Naam:<br>
                <input type="text" name="naam" value="<?= htmlspecialchars($naam); ?>"><span style="color: #e02e25; "><?= isset($errors['name']) ? $errors['name'] : ''?></span>
                <br>
                <br>

                Emailadres:<br>
                <input type="text" name="email" value="<?= htmlspecialchars($email); ?>"><span style="color: #e02e25;"><?= isset($errors['email']) ? $errors['email'] : ''?></span>
                <br>
                <br>
                Telefoon nummer:<br>
                <input type="text" name="telefoon" value="<?= htmlspecialchars($telefoon) ?>"><span style="color: #e02e25; "><?= isset($errors['telefoon']) ? $errors['telefoon'] : ''?></span>
                <br>
                <br>
                Behandeling: </br>
                <select name="behandeling">
                    <option value="Kies gewenste behandeling">Kies gewenste behandeling</option>
                    <option value="Knippen ">Knippen  </option>
                    <option value="Model knippen ">Model knippen</option>
                    <option value="Wassen knippen ">Wassen knippen</option>
                    <option value="Wassen model knippen ">Wassen model knippen</option>
                    <option value="Wassen knippen f�hnen kort haar ">Wassen knippen fohnen kort haar</option>
                    <option value="Wassen knippen f�hnen halflang haar ">Wassen knippen fohnen halflang haar</option>
                    <option value="Wassen knippen fohnen lang haar ">Wassen knippen fohnen lang haar</option>
                    <option value="Wassen knippen f�hnen lang haar ">Wassen knippen fohnen lang haar</option>
                    <option value="Wassen fohnen kort haar ">Wassen fohnen kort haar </option>
                    <option value="Wassen fohnen lang halflang haar">Wassen fohnen lang halflang haar</option>
                    <option value="Wassen fohnen lang haar ">Wassen fohnen lang haar</option>
                    <option value="Wassen stijlen">Wassen stijlen</option>
                    <option value="Wassen stijlen lang haar ">Wassen stijlen lang haar</option>
                    <option value="Pony knippen">Pony knippen</option>
                    <option value="Watergolven kort haar">Watergolven kort haar</option>
                    <option value="Watergolven lang haar">Watergolven lang haar</option>
                    <option value="Verven uitgroei kort">Verven uitgroei kort </option>
                    <option value="Verven uitgroei lang">Verven uitgroei lang</option>
                    <option value="Kleuren kort haar">Kleuren kort haar</option>
                    <option value="Kleuren halflang">Kleuren halflang</option>
                    <option value="Kleuren lang haar">Kleuren lang haar</option>
                    <option value="Spoeling kort haar">Spoeling kort haar</option>
                    <option value="Spoeling halflang haar">Spoeling halflang haar</option>
                    <option value="Spoeling lang haar">Spoeling lang haar</option>
                    <option value="Coupe soleil kort haar">Coupe soleil kort haar</option>
                    <option value="Coupe soleil halflang haar">Coupe soleil halflang haar</option>
                    <option value="Coupe soleil lang haar">Coupe soleil lang haar</option>
                    <option value="Vlechten ">Vlechten</option>
                    <option value="Haar relaxer">Haar relaxer</option>
                    <option value="Bruids kapsel">Bruids kapsel</option>
                    <option value="Make-up">Make-up</option>
                    <option value="Avond make-up">Avond make-up </option>
                    <option value="Hoofddoek opsteken">Hoofddoek opsteken</option>
                    <option value="Wenkbrauw epileren">Wenkbrauw epileren</option>
                    <option value="Epileren bovenlip">Epileren bovenlip</option>
                    <option value="Epileren hele gezicht">Epileren hele gezicht</option>
                    <option value="Wenkbrauw verven ">Wenkbrauw verven</option>
                    <option value="Wimpers verven">Wimpers verven</option>
                    <option value="Weave zetten">Weave zetten</option>
                    <option value="Weave verwijderen">Weave verwijderen</option>
                    <option value="Deelpermanent">Deelpermanent</option>
                    <option value="Permanent kort haar">Permanent kort haar</option>
                    <option value="Permanent halflang haar">Permanent halflang haar</option>
                    <option value="Permanent lang haar">Permanent lang haar</option>

                </select>
                <br>
                <br>
                Voorkeur tijd:
                <br>
                <select name="tijden">
                    <option value="">Kies gewenste tijd</option>
                    <option value="9:00">9:00</option>
                    <option value="9:30">9:30</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">10:30</option>
                    <option value="9:00">11:00</option>
                    <option value="9:30">11:30</option>
                    <option value="10:00">12:00</option>
                    <option value="11:00">12:30</option>
                    <option value="9:00">13:00</option>
                    <option value="9:30">13:30</option>
                    <option value="10:00">14:00</option>
                    <option value="11:00">14:30</option>
                    <option value="9:00">15:00</option>
                    <option value="9:30">15:30</option>
                    <option value="10:00">16:00</option>
                    <option value="11:00">16:30</option>
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>
                    <option value="18:00">18:30</option>
                    <option value="18:30">18:30</option>
                    <option value="19:00">19:00</option>
                </select>
                <br>
                <br>
                Datum:
                <br>
                <input name="datum" value="<?= htmlspecialchars($datum) ?>"  id="datepicker" />
                <br>
                <br>
                <input type="submit" class="knop" name="submit" value="Reserveer">
            </form>
        </div>
    </div>




</body>
</html>