<?php
    //This is a php file with functions that delete the chosen message from database

    include("../mysql/sqlConnect.php");

    //Get message id from the url - GET method
    $id = $_GET["id"];

    //Create query that deletes message
    $del = "DELETE FROM tbl_message WHERE message_id = '$id'";

    $result = mysqli_query($dbc,$del);

    //If the query executed successfully or not
    if($result){

        //Keep this value to a session variable in order to display the message on manageMessage.php
        $_SESSION["deleted"] = "Message deleted successfully!";

        //Redirected to manageMessage.php
        header("location:https://localhost/website/admin/manageMessage.php");
    }
    else{
        //Keep this value to a session variable in order to display the message on manageMessage.php 
        $_SESSION["deleted"] = "An error occured. Message couldn not be deleted!";

        //Redirected to manageProduct.php
        header("location:https://localhost/website/admin/manageMessage.php");
    }

?>