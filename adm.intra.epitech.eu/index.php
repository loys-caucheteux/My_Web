<?php
session_start();
$_SESSION['logged'];
$_SESSION['pseudo'];
$_SESSION['double_auth'] = false;
?>
<html>
<head>
    <meta charset="utf-8">
    <link href="styles/styles.css" rel="stylesheet">
    <title>EPITECH Intra</title>
</head>
<body>
<h1> Welcome to the Epitech's ADM intranet</h1>
<h2 class ="time">Today is the <?php echo date('d/m/Y'); echo "</br>It's "; echo date('h:i:s');?></h2>
<h2>
    <?php if ($_SESSION['logged'] == true) {
        echo 'Logged in as : ' . $_SESSION['pseudo'];
        include 'forms/logout.php';
        echo '<br /><a href="table.php">See students</a><br />';
    }
    else 
    {
        echo 'You are not logged in<br />';
        echo '<a href="register.php">Register</a><br />';
        echo '<a href="connect.php">Login</a><br />';
    }
    if (isset($_POST['out_but']))
    {
        $_SESSION['pseudo'] = NULL;
        $_SESSION['logged'] = FALSE;
        header("Refresh:0");
    }
?>
</h2>
</body>
</html>