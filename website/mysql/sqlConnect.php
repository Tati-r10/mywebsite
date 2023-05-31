<?php
    //In this file we are connecting with thw database

    session_start();
    ob_start(); //It saves the output until it met ob_end_flush() where the output is executed

    define ("DB_HOST", "localhost");
    define ("DB_USER", "root");
    define ("DB_PASSWORD", "");
    define ("DB_NAME", "website");


    //Database connection
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Couldn't connect to MySQL:".mysqli_connect_error());
?>