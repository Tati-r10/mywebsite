<!--This is the page where admin can manage customer(add, delete)-->

<?php include("partials/header.php")?>

        <main id="mainContent">

            <h1>Manage Customers</h1>
            <br>

            <a aria-label="Move to add customer page" role="button" class="manageBtn addBtn" href="addCustomer.php">Add Customer</a>

            <div class="container" > 

                <table aria-label="Customers" class="manageTables customerTable">
                    <tr class="linerow">
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>  
                    
                    <?php
                        //Select all admins in this array
                        $customers = "SELECT * FROM tbl_users";

                        $result = mysqli_query($dbc, $customers);

                        if($result){
                            
                            //Display users
                            while($row = mysqli_fetch_assoc($result)){

                                echo "
                                    <tr>
                                        <td>{$row['user_id']}</td>
                                        <td>{$row['first_name']}</td>
                                        <td>{$row['last_name']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['username']}</td>
                                        <td>
                                        <a aria-label='Delete Customer' role='button' class='manageBtn delBtn' href='https://localhost/website/admin/deleteCustomer.php?id={$row['user_id']}'>Delete</a>
                                        </td>
                                    </tr> 
                                ";
                            }
                        }
                    ?>
                </table>

                <div class="customerBoxes">        
                    <?php 
                        $result = mysqli_query($dbc, $customers);

                        while($row = mysqli_fetch_assoc($result)){

                            //Display customers in a different way when width of user's screen is smaller than 1000px (adminBox table) and 450px (adminBox2 table)
                            echo "

                                <table aria-label='Customer's Information' class='custBox'>
                                        
                                    <tr>
                                        <th>Customer ID:</th>
                                        <td>{$row['user_id']}</td>
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
                                        <th>Email:</th>
                                        <td>{$row['email']}</td>
                                    </tr>

                                    <tr>
                                        <th>Username:</th>
                                        <td>{$row['username']}</td>
                                    </tr>

                                    <tr><td><a aria-label='Delete Customer' role='button' class='manageBtn delBtn' href='https://localhost/website/admin/deleteCustomer.php?id={$row['user_id']}'>Delete</a></td></tr>
                                </table>
                                <hr>

                                <table aria-label='Customer's Information' class='custBox2'>
                                            
                                    <tr><th>Customer ID:</th></tr>  
                                    <tr><td>{$row['user_id']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><th>Name:</th></tr> 
                                    <tr><td>{$row['first_name']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><th>Surname:</th></tr> 
                                    <tr><td>{$row['last_name']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><th>Email:</th></tr> 
                                    <tr><td>{$row['email']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><th>username:</th></tr> 
                                    <tr><td>{$row['username']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><td><a aria-label='Delete Customer' role='button' class='manageBtn delBtn' href='https://localhost/website/admin/deleteCustomer.php?id={$row['user_id']}'>Delete</a></td></tr>
                                </table>   
                                <hr> 
                            ";
                        }
                    ?>
                </div>
            </div>    
                
            <?php
                if(mysqli_num_rows($result)==0){
                      
                    echo "<h2 class='noResults'>There is no customers!</h2>";
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
        document.title = "Manage Customers - Accessible website";

        //It changes visually the current section of navbar every time
        localStorage.setItem("section","4");
    </script>
</body>
</html>