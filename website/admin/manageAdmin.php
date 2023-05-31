<!--This is the page where admin can manage other admins(add, delete)-->

<?php include("partials/header.php")?>

        <main id="mainContent">

            <h1>Manage Admin</h1>
            <br>

            <a aria-label="Move to add admin page" role="button" class="manageBtn addBtn" href="addAdmin.php">Add Admin</a>

            <div class="container" > 

                <table aria-label="Admins" class="manageTables adminTable">
                    <tr class="linerow">
                        <th>Admin ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>  
                    
                    <?php
                        //Select all admins in this array
                        $admins = "SELECT * FROM tbl_admin";

                        $result = mysqli_query($dbc, $admins);

                        if($result){
                            
                            //Display admins
                            while($row = mysqli_fetch_assoc($result)){

                                echo "
                                    <tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['first_name']}</td>
                                        <td>{$row['last_name']}</td>
                                        <td>{$row['username']}</td>
                                        <td>
                                        <a aria-label='Delete Admin' role='button' class='manageBtn delBtn' href='https://localhost/website/admin/deleteAdmin.php?id={$row['id']}'>Delete</a>
                                        </td>
                                    </tr> 
                                ";
                            }
                        }
                    ?>
                </table>

                <div class="adminBoxes">        
                    <?php 
                        $result = mysqli_query($dbc, $admins);

                        while($row = mysqli_fetch_assoc($result)){

                            //Display admins in a different way when width of user's screen is smaller than 1000px (adminBox table) and 450px (adminBox2 table)
                            echo "

                                <table aria-label='Admin's Information' class='adminBox'>
                                        
                                    <tr>
                                        <th>Admin ID:</th>
                                        <td>{$row['id']}</td>
                                    </tr>

                                    <tr>
                                        <th>Name:</th>
                                        <td>{$row['first_name']}</td>
                                    </tr>

                                    <tr>
                                        <th>Surname:</th>
                                        <td>{$row['last_name']}</td>
                                    </tr>

                                    <tr>
                                        <th>username:</th>
                                        <td>{$row['username']}</td>
                                    </tr>

                                    <tr><td><a aria-label='Delete Admin' role='button' class='manageBtn delBtn' href='https://localhost/website/admin/deleteAdmin.php?id={$row['id']}'>Delete</a></td></tr>
                                </table>
                                <hr>

                                <table aria-label='Admin's Information' class='adminBox2'>
                                            
                                    <tr><th>Admin ID:</th></tr>  
                                    <tr><td>{$row['id']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><th>Name:</th></tr> 
                                    <tr><td>{$row['first_name']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><th>Surname:</th></tr> 
                                    <tr><td>{$row['last_name']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><th>username:</th></tr> 
                                    <tr><td>{$row['username']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><td><a aria-label='Delete Admin' role='button' class='manageBtn delBtn' href='https://localhost/website/admin/deleteAdmin.php?id={$row['id']}'>Delete</a></td></tr>
                                </table>   
                                <hr> 
                            ";
                        }
                    ?>
                </div>
            </div>    
                
            <?php
                if(mysqli_num_rows($result)==0){
                      
                    echo "<h2 class='noResults'>There is no admins!</h2>";
                }
            ?>
        </main>

        <?php 
            include("partials/footer.php");

            if(isset($_SESSION["deleted"])){
                echo "
                    <script>
                        var text = '{$_SESSION["deleted"]}';
                        alertText(text);
                    </script>
            ";

            unset($_SESSION["deleted"]);
        }?>

    <script>

        //It changes the title of this page
        document.title = "Manage Admins - Accessible website";

        //It changes visually the current section of navbar every time the page is loaded
        window.onload = function(){ localStorage.setItem("section","1");};
    </script>
</body>
</html>