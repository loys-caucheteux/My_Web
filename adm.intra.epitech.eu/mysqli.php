<?php

$server="localhost";
$username="root";
$password="azerty";
$database="intradm";

$connect=new mysqli($server, $username, $password, $database);
$connect->set_charset("utf8");
?>
