<?php session_start(); ?>
<html>
<head>
    <meta charset="utf-8">
    <link href="styles/styles.css" rel="stylesheet">
    <title>EPITECH Intra : view students</title>
</head>
<body>
    <h3><a href="index.php">Return to main page</a></h3>
    <h2><?php
    if ($_SESSION['logged'] == true) {
        echo 'Logged in as : ' . $_SESSION['pseudo'];
        if ($_SESSION['double_auth'] == TRUE)
        {
            echo 'Success';
            include 'table.php';
        }
        else
        {
            include 'forms/double_auth.php';
            if (isset($_POST['ok']) && isset($_POST['pwd']) && (strlen($_POST['pwd']) > 0))
            {
                if (ctype_alnum($_POST['pwd'])) {
                    include 'mysqli.php';
                    $requete = 'SELECT COUNT(*) AS cntUser FROM users WHERE pseudo="'.($_SESSION['pseudo']).'" AND pwd="'.($_POST['pwd']).'"';
                    $result = $connect->query($requete);
                    if (!$result)
                        echo '<p class ="error">Error SQL :</p>' .$connect->error;
                    $row = mysqli_fetch_array($result);
                    $count = $row['cntUser'];
                    if($count > 0) {
                        $_SESSION['double_auth'] = TRUE;
                        echo '<br /><a href="display.php>Refresh page<a>';
                    }
                    else {
                        echo '<p class="error">Invalid password.</p>';
                        include 'forms/double_auth.php';
                    }
                }
                else if (isset($_POST['ok']))
                {
                    echo '<p class = "error">Passwords are alphanumeric.<p>';
                    include 'forms/double_auth.php';
                }
            }
            else if (isset($_POST['ok'])) {
                echo '<p class="error">Please type all fields.</p><br />';
                include 'forms/double_auth.php';
            }
        }
    }
    else {
        echo '<p>You are not logged in<br /></p>';
        echo '<p>Please <a href="connect.php">login</a> to access this page<br /><p>';
    }
    ?>
</h2>
</body>
</html>
