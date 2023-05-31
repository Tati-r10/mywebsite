<?php
    //This is a php file with functions that delete the chosen admin from database

    include("../mysql/sqlConnect.php");

    //Get admin's id from the url - GET method
    $id = $_GET["id"];

    //Create query that deletes admin
    $del = "DELETE FROM tbl_admin WHERE id = '$id'";

    $result = mysqli_query($dbc,$del);

    //If the query executed successfully or not
    if($result){

        //Keep this value to a session variable in order to display the message on manageAdmin.php 
        $_SESSION["deleted"] = "Admin deleted successfully!";

        //Redirected to manageAdmin.php
        header("location:https://localhost/website/admin/manageAdmin.php");
    }
    else{
        //Keep this value to a session variable in order to display the message on manageAdmin.php 
        $_SESSION["deleted"] = "An error occured. Admin could not be deleted!";

        //Redirected to manageAdmin.php
        header("location:https://localhost/website/admin/manageAdmin.php");
    }

?>