<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <link href="styles/styles.css" rel="stylesheet">
    <title>EPITECH Intra</title>
</head>
<body>
<h1>List of registered Students</h1>
<h3><a href="index.php">Return to main page</a></h3>
<h2>
    <?php if ($_SESSION['logged'] == true) {
        echo 'Logged in as : ' . $_SESSION['pseudo'];
        echo '<br />';
        include 'tabler.php';
    }
    else 
    {
        echo '<p>You are not logged in<br /></p>';
        echo '<p>Please <a href="connect.php">login</a> to access this page<br /><p>';
    }
?>
</h2>
</body>
</html>