<?php
    //This is a php file with functions that delete the chosen category from database

    include("../mysql/sqlConnect.php");

    //Get category_id from the url - GET method
    $id = $_GET["id"];

    //Create query that deletes category
    $del = "DELETE FROM tbl_category WHERE category_id = '$id'";

    $result = mysqli_query($dbc,$del);

    //If the query executed successfully or not
    if($result){

        //Keep this value to a session variable in order to display the message on manageCategory.php 
        $_SESSION["deleted"] = "Category deleted successfully!";

        //Redirected to manageCategory.php
        header("location:https://localhost/website/admin/manageCategory.php");
    }
    else{
        //Keep this value to a session variable in order to display the message on manageCategory.php 
        $_SESSION["deleted"] = "An error occured. Category could not be deleted!";

        //Redirected to manageCategory.php
        header("location:https://localhost/website/admin/manageCategory.php");
    }

?>