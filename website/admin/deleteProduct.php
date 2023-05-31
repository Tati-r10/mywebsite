<?php
    //This is a php file with functions that delete the chosen product from database

    include("../mysql/sqlConnect.php");

    //Get product id from the url - GET method
    $id = $_GET["id"];

    //Create query that deletes admin
    $del = "DELETE FROM tbl_product WHERE product_id = '$id'";

    $result = mysqli_query($dbc,$del);

    //If the query executed successfully or not
    if($result){

        //Keep this value to a session variable in order to display the message on manageProduct.php
        $_SESSION["deleted"] = "Product deleted successfully!";

        //Redirected to manageProduct.php
        header("location:https://localhost/website/admin/manageProduct.php");
    }
    else{
        //Keep this value to a session variable in order to display the message on manageProduct.php 
        $_SESSION["deleted"] = "An error occured. Product couldn not be deleted!";

        //Redirected to manageProduct.php
        header("location:https://localhost/website/admin/manageProduct.php");
    }

?>