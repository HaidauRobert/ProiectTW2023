<?php

$dbhost = "localhost";
$dbuser="root";
$dbpass="";
$dbname="users";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("Conectarea la baza de date a esuat");
}
?>