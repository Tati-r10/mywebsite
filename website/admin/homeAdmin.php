<!--Home page for admin.Here admin can see a review of the main website and general information about it-->

 <?php include("../admin/partials/header.php");?>
    
    <main id="mainContent">

        <h1>Dashboard</h1>

        <div aria-label="Preview of website" class="container dashboard">   
            
            <div class="boxes">
                <h2>Admins</h2>

                <?php
                    //Display number of admins

                    $admins = "SELECT * FROM tbl_admin";

                    $result = mysqli_query($dbc,$admins);

                    $num = mysqli_num_rows($result);

                    echo "<br><div class='number'>{$num}</div>";
                ?>
            </div>
            
            <div class="boxes">
                <h2>Categories</h2>

                <?php
                    //Display number of categories

                    $categories = "SELECT * FROM tbl_category";

                    $result = mysqli_query($dbc,$categories);

                    $num = mysqli_num_rows($result);

                    echo "<br><div class='number'>{$num}</div>";
                
                ?>
            </div>

            <div class="boxes">
                <h2>Products</h2>

                <?php
                    //Display number of prducts

                    $products = "SELECT * FROM tbl_product";

                    $result = mysqli_query($dbc,$products);

                    $num = mysqli_num_rows($result);

                    echo "<br><div class='number'>{$num}</div>";
                
                ?>
            </div>

            <div class="boxes">
                <h2>Customers</h2>

                <?php
                    //Display number of customers

                    $customers = "SELECT * FROM tbl_users";

                    $result = mysqli_query($dbc,$customers);

                    $num = mysqli_num_rows($result);

                    echo "<br><div class='number'>{$num}</div>";
                
                ?>
            </div>

            <div class="boxes">
                <h2>Messages</h2>

                <?php
                    //Display number of messages

                    $messages = "SELECT * FROM tbl_message";

                    $result = mysqli_query($dbc,$messages);

                    $num = mysqli_num_rows($result);

                    echo "<br><div class='number'>{$num}</div>";
                
                ?>
            </div>
        </div>
   

        <h1>General Information</h1>
        <br>

        <a aria-label="Move to manage general info page" role="button" class="manageBtn addBtn" href="manageInfo.php">Manage Information</a>

        <?php

            $info = "SELECT * FROM tbl_general_info";

            $result = mysqli_query($dbc,$info);

            if($result){

                //Display all general information
                while($row = mysqli_fetch_assoc($result)){

                    $logoName = $row["logo"];
                    $alt = $row["alt"];
                    $title = $row["title"];
                    $abstract = $row["abstract"];
                    $address = $row["comp_address"];
                    $telephone = $row["tel"];
                    $email = $row["email"];
                    $facebook = $row["facebook"];
                    $instagram = $row["instagram"];
                    $linkedin = $row["linkedin"];
                }
            }
            else{
                echo "
                    <script>
                        var text = 'An error occured. Please try again!';
                        alertText(text);
                    </script>
                ";
            }
        ?>

        <div class="container"> 
            <table aria-label="General website information" class="manageTables infoTable">
                <tr>
                    <th>Logo</th>
                    <td><img class='resimg' src='../uploadedImages/logoImages/<?php echo $logoName ?>' alt = '<?php echo $alt ?>'></td>
                </tr>

                <tr>
                    <th>Logo description</th>
                    <td><?php echo $alt ?></td>
                </tr>

                <tr>
                    <th>Title of abstract</th>
                    <td><?php echo $title ?></td>
                </tr>

                <tr>
                    <th>Abstract</th>
                    <td><?php echo $abstract ?></td>
                </tr>

                <tr>
                    <th>Address</th>
                    <td><?php echo $address ?></td>
                </tr>

                <tr>
                    <th>Telephone</th>
                    <td><?php echo $telephone ?></td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td><?php echo $email ?></td>
                </tr>

                <tr>
                    <th>Facebook url</th>
                    <td><?php echo $facebook ?></td>
                </tr>

                <tr>
                    <th>Instagram url</th>
                    <td><?php echo $instagram ?></td>
                </tr>

                <tr>
                    <th>LinkedIn url</th>
                    <td><?php echo $linkedin ?></td>
                </tr>
            </table>

            <table  aria-label="General website information" class="smallInfoTable">
                <tr><th>Logo</th></tr>
                <tr><td><img class='resimg' src='../uploadedImages/logoImages/<?php echo $logoName ?>' alt = '<?php echo $alt ?>'></td></tr>

                <tr class="empty"></tr>

                <tr><th>Logo description</th></tr>
                <tr><td><?php echo $alt ?></td></tr>

                <tr class="empty"></tr>
                
                <tr><th>Title of abstract</th></tr>
                <tr><td><?php echo $title ?></td></tr>

                <tr class="empty"></tr>
                
                <tr><th>Abstract</th></tr>
                <tr><td><?php echo $abstract ?></td></tr>

                <tr class="empty"></tr>
                
                <tr><th>Address</th></tr>
                <tr><td><?php echo $address ?></td></tr>

                <tr class="empty"></tr>
                
                <tr><th>Telephone</th></tr>
                <tr><td><?php echo $telephone ?></td></tr>

                <tr class="empty"></tr>

                <tr><th>Email</th></tr>
                <tr><td><?php echo $email ?></td></tr>

                <tr><th>Facebook url</th></tr>
                <tr><td><?php echo $facebook ?></td></tr>

                <tr><th>Instagram url</th></tr>
                <tr><td><?php echo $instagram ?></td></tr>

                <tr><th>LinkedIn url</th></tr>
                <tr><td><?php echo $linkedin ?></td></tr>

                <tr class="empty"></tr>
            </table>
        </div> 
    </main>

    <script>
        //It changes the title of this page
        document.title = "Home Admin - Accessible website";

        //It changes visually the current section of navbar every time
        localStorage.setItem("section","0");
    </script>
<?php include("../admin/partials/footer.php");?>


