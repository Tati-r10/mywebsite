<!--This is the header for customer's side--> 

<?php include("../mysql/sqlConnect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--It is important to make our website responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessible Website</title>

    <!--Links for CSS files-->
    <link rel="stylesheet" href="../CSS/webStyle.css">
    <link rel="stylesheet" href="../CSS/navbarStyle.css">
    <link rel="stylesheet" href="../CSS/settingsStyle.css">
    <link rel="stylesheet" href="../CSS/categoriesStyle.css">
    <link rel="stylesheet" href="../CSS/productStyle.css">
    <link rel="stylesheet" href="../CSS/aboutStyle.css">
    <link rel="stylesheet" href="../CSS/contactStyle.css">
    <link rel="stylesheet" href="../CSS/footerStyle.css">
</head>

<body class="bcolors">

    <!--Navbar section starts here-->
    <header class="container bcolors">

        <?php

            $info = "SELECT logo, alt FROM tbl_general_info";

            $result = mysqli_query($dbc,$info);

            if($result){

                while($row = mysqli_fetch_assoc($result)){

                    $logoName = $row["logo"];
                    $alt = $row["alt"];
                }
            }
        ?>

        <div class="logo"><img class="responsiveImg" src="../uploadedImages/logoImages/<?php echo $logoName ?>" alt="<?php echo $alt ?>"></div>
        
        <!--The invisible menu icon for responsive bar-->
        <div role="button" class="menuBtn" aria-label="Main menu" tabindex="0" onmouseover="menuBtnUnfocus()" onfocus="visibleMenu()" >
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div> 
                    
        <nav id="navbar" aria-label="Main menu" class="bcolors">
            <ul class="menu" aria-label="Main menu" role="menu" >
                <li role="none"><a role="menuitem" class="section" href="../customer/index.php" onclick="activeSection(0)">Home</a></li>
                <li role="none"><a role="menuitem" class="section" href="../customer/index.php#categories" onclick="activeSection(1)">Categories</a></li>
                <li role="none"><a role="menuitem" class="section" href="../customer/index.php#about" onclick="activeSection(2)">About us</a></li>
                <li role="none"><a role="menuitem" class="section" href="../customer/index.php#contact" onclick="activeSection(3)">Contact</a></li>			
            </ul>

            <?php 

                if(!isset($_SESSION["user"])){ //if user hasn't logged in yet

                    echo '
                        <ul class="loginMenu" aria-label="Account menu" role="menu">
                            <li role="none"><a role="menuitem" class="section" id="logIn" href="../customer/logIn.php" onclick="activeSection(4)">Log In</a></li>
                        </ul>
                    ';
                }
                else{ //if user logged in to account

                    echo '
                        <ul class="loginMenu" aria-label="Account menu" role="menu">
                            <li role="none"><a role="menuitem" class="section" id="logOut" href="../customer/logOut.php" onclick="activeSection(5)">LogOut</a></li>
                        </ul>
                    ';
                }
            ?>
        </nav>
    </header>

    <div id="line"></div> 

    <?php
        if(isset($_SESSION['admin'])){

            echo "
                <nav class='adminChoices'>
                    <a aria-label='Move to admin page' role='button' class='adminPage' href='../admin/homeAdmin.php'>Admin Page</a>
                </nav>
                <br>
                <br>
            ";
        }
    ?>


    <!--Navbar section ends here-->
    
<?php include("../customer/partials/settings.php");?>