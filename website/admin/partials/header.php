<!--This file includes code for the navbar and accessibility settings on the admin pages-->

<?php include("../mysql/sqlConnect.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--It is important to make our website responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessible Website</title>

    <!--Links for CSS files-->
    <link rel="stylesheet" href="../CSS/adminStyle/navbar.css">
    <link rel="stylesheet" href="../CSS/adminStyle/admin.css">
    <link rel="stylesheet" href="../CSS/footerStyle.css">
    <link rel="stylesheet" href="../CSS/settingsStyle.css">
</head>

<body class="bcolors">

    <!--Navbar section starts here-->
    <header class="container bcolors">
               
        <!--The invisible menu icon for responsive bar-->
        <div role="button" class="menuBtn" aria-label="Main menu" tabindex="0" onfocus="visibleMenu()" onmouseover="menuBtnUnfocus()" >
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div> 
                    
        <nav id="navbar" aria-label="Main menu" class="bcolors">
            <ul class="menu" aria-label="Main menu" role="menu" >
                <li role="none"><a role="menuitem" class="section active" href="homeAdmin.php" onclick="activeSection(0)">Home</a></li>
                <li role="none"><a role="menuitem" class="section" href="manageAdmin.php" onclick="activeSection(1)">Admin</a></li>
                <li role="none"><a role="menuitem" class="section" href="manageCategory.php" onclick="activeSection(2)">Categories</a></li>
                <li role="none"><a role="menuitem" class="section" href="manageProduct.php" onclick="activeSection(3)">Products</a></li>
                <li role="none"><a role="menuitem" class="section" href="manageCustomer.php" onclick="activeSection(4)">Customers</a></li>
                <li role="none"><a role="menuitem" class="section" href="manageMessage.php" onclick="activeSection(5)">Messages</a></li>				
            </ul>
        </nav>
    </header>
    <!--Navbar section ends here-->
    
    <nav class="adminChoices">
        <a aria-label="Move to website" role="button" class="manageBtn" href="../customer/index.php">Website</a>
        <a aria-label="Log out from account" role="button" class="manageBtn" href="../customer/logOut.php">Log Out</a>
    </nav>
    <br>
    <br>
    
    <?php include("../customer/partials/settings.php");?>