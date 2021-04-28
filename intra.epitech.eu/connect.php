<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <link href="styles/styles.css" rel="stylesheet">
    <title>EPITECH Intra : login</title>
</head>
<body><h1>Login to your account</h1><?php
if ($_SESSION['logged'] != TRUE) {
    if (isset($_POST['pseudo']) && isset($_POST['pwd'])) {
        if (ctype_alnum($_POST['pseudo']) && ctype_alnum($_POST['pwd'])) {
            include 'mysqli.php';
            $requete = 'SELECT COUNT(*) AS cntUser FROM users WHERE pseudo="'.($_POST['pseudo']).'" AND pwd="'.($_POST['pwd']).'"';
            $result = $connect->query($requete);
            if (!$result)
                echo '<p class ="error">Error SQL :</p>' .$connect->error;
            $row = mysqli_fetch_array($result);
            $count = $row['cntUser'];
            if($count > 0){
                $_SESSION['logged'] = TRUE;
                $_SESSION['pseudo'] = $_POST['pseudo'];
                echo '<p class="success">Successfully Logged in</p>';
                echo '<p><a href="index.php">Return to main page</a></p>';
            }else{
                echo '<p class="error">Invalid username and/or password.</p>';
            }
        }
        else {
            echo '<p class="error">Username and password are alphanumeric.</p><br />';
            include 'connect_form.php';
        }
    }
    else {
        echo '<p class="error">Please type all fields.</p><br />';
        include 'connect_form.php';
    }
}
else
{
    echo '<h2>You are already connected !<br /></h2>';
    echo '<p><a href="index.php">Return to main page</a></p>';
}
$connect->close();
?>
</body>