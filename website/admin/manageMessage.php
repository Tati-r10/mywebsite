<!--This is the page where admin can manage emails from contact form-->

<?php include("partials/header.php")?>

        <main id="mainContent">

            <h1>Manage Message</h1>
            <br>

            <div class="container" > 

                <table aria-label="Messages table" class="manageTables msgTable">
                    <tr class="linerow">
                        <th>Message ID</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>  
                    
                    <?php
                        //Select all messages in this array
                        $msgs = "SELECT * FROM tbl_message";

                        $result = mysqli_query($dbc, $msgs);

                        if($result){
                            
                            //Display messages
                            while($row = mysqli_fetch_assoc($result)){

                                echo "
                                    <tr>
                                        <td>{$row['message_id']}</td>
                                        <td>{$row['user_id']}</td>
                                        <td>{$row['full_name']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['msg']}</td>
                                        <td>
                                        <a aria-label='Delete Message' role='button' class='manageBtn delBtn' href='https://localhost/website/admin/deleteMessage.php?id={$row['message_id']}'>Delete</a>
                                        </td>
                                    </tr> 
                                ";
                            }
                        }
                    ?>
                </table>

                <div class="msgBoxes">        
                    <?php 
                        $result = mysqli_query($dbc, $msgs);

                        while($row = mysqli_fetch_assoc($result)){

                            //Display messages in a different way when width of user's screen is smaller than 1000px and 450px 
                            echo "

                                <table aria-label='Message Information' class='msgBox'>
                                        
                                    <tr>
                                        <th>Message ID:</th>
                                        <td>{$row['message_id']}</td>
                                    </tr>

                                    <tr>
                                        <th>Customer ID:</th>
                                        <td>{$row['user_id']}</td>
                                    </tr>

                                    <tr>
                                        <th>Customer Name:</th>
                                        <td>{$row['full_name']}</td>
                                    </tr>

                                    <tr>
                                        <th>Email:</th>
                                        <td>{$row['email']}</td>
                                    </tr>

                                    <tr>
                                        <th>Message:</th>
                                        <td>{$row['msg']}</td>
                                    </tr>

                                    <tr><td><a aria-label='Delete Message' role='button' class='manageBtn delBtn' href='https://localhost/website/admin/deleteMessage.php?id={$row['message_id']}'>Delete</a></td></tr>
                                </table>
                                <hr>

                                <table aria-label='Message Information' class='msgBox2'>
                                            
                                    <tr><th>Message ID:</th></tr>  
                                    <tr><td>{$row['message_id']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><th>Customer ID:</th></tr> 
                                    <tr><td>{$row['user_id']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><th>Customer Name:</th></tr> 
                                    <tr><td>{$row['full_name']}</td></tr>

                                    <tr><th>Email:</th></tr> 
                                    <tr><td>{$row['email']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><th>Message:</th></tr> 
                                    <tr><td>{$row['msg']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><td><a aria-label='Delete Message' role='button' class='manageBtn delBtn' href='https://localhost/website/admin/deleteMessage.php?id={$row['message_id']}'>Delete</a></td></tr>
                                </table>   
                                <hr> 
                            ";
                        }
                    ?>
                </div>
            </div>    
                
            <?php
                if(mysqli_num_rows($result)==0){
                      
                    echo "<h2 class='noResults'>There is no messages!</h2>";
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
        document.title = "Manage Messages - Accessible website";

        //It changes visually the current section of navbar every time the page is loaded
        localStorage.setItem("section","5");
    </script>
</body>
</html>