<?php

function get_connection() {
    $dbhost = "localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="users";

    $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    return $con;
}
?>