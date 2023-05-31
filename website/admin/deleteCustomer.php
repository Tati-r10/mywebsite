<?php
    //This is a php file with functions that delete the chosen cutomer from database

    include("../mysql/sqlConnect.php");

    //Get customer's id from the url - GET method
    $id = $_GET["id"];

    //Create query that deletes customer
    $del = "DELETE FROM tbl_users WHERE user_id = '$id'";

    $result = mysqli_query($dbc,$del);

    //If the query executed successfully or not
    if($result){

        //Keep this value to a session variable in order to display the message on manageCustomer.php 
        $_SESSION["deleted"] = "Customer deleted successfully!";

        //Redirected to manageCustomer.php
        header("location:https://localhost/website/admin/manageCustomer.php");
    }
    else{
        //Keep this value to a session variable in order to display the message on manageCustomer.php
        $_SESSION["deleted"] = "An error occured. Customer could not be deleted!";

        //Redirected to manageAdmin.php
        header("location:https://localhost/website/admin/manageCustomer.php");
    }

?>