<html>
<head>
    <meta charset="utf-8">
    <link href="styles/styles.css" rel="stylesheet">
    <title>EPITECH Intra : register</title>
</head>
<body><h1>Create an account</h1>
<h3><a href="index.php">Return to main page</a></h3>
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include 'mysqli.php';
if (isset($_POST['pseudo']) && isset($_POST['pwd']) && isset($_POST['name']) && isset($_POST['surname'])) {
    if (ctype_alnum($_POST['pseudo']) && ctype_alnum($_POST['pwd'])) {
        if (strlen($_POST['pseudo']) <= 254 && strlen($_POST['pwd']) <= 254 && strlen($_POST['name']) <= 254 && strlen($_POST['surname']) <= 254)
        {
            $requete = 'SELECT COUNT(*) AS cntUser FROM users WHERE pseudo="'.($_POST['pseudo']).'"';
            $result = $connect->query($requete);
            if (!$result)
                echo '<p class ="error">Error SQL :</p>' .$connect->error;
            $row = mysqli_fetch_array($result);
            $count = $row['cntUser'];
            if ($count > 0) {
                echo '<p class="error">pseudo is already taken</p>';
                include 'forms/register_form.php';
            }
            else 
            {
                $requete='INSERT INTO users (pseudo,pwd,name,surname) VALUES("'.($_POST['pseudo']).'","'.$_POST['pwd'].'","'.$_POST['name'].'","'.$_POST['surname'].'")';
                $result = $connect->query($requete);
                if ($result) {
                    echo '<p class="success">Account created.</p><br />';
                    echo '<p>You can now login into your account using your pseudo and password<br /></p>';
                }
                else {
                    echo '<p class="error">Error.</p><br />' .$connect->error;
                }
            }
        }
        else {
            echo '<p class="error">Maximum lenght for all fields = 254</p>';
            include 'forms/register_form.php';
        }
    }
    else {
        echo '<p class="error">Username and password must be alphanumeric.</p><br />';
        include 'forms/register_form.php';
    }
}
else if (isset($_POST['but'])) {
    echo '<p class="error">Please type all fields.</p><br />';
    include 'forms/register_form.php';
}
else 
    include 'forms/register_form.php';
$connect->close();
?>
</body>