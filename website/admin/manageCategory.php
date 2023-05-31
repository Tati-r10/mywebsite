<!--This is the page where admin can manage categories(add, delete)-->

<?php include("partials/header.php")?>

        <main id="mainContent">

            <h1>Manage Categories</h1>
            <br>

            <a aria-label="Move to add category page" role="button" class="manageBtn addBtn" href="addCategory.php">Add Category</a>
            
            <div class="container" > 
                <table aria-label="Categories" class="manageTables categoryTable">
                    <tr class="linerow">
                        <th>Category ID</th>
                        <th>Name</th>
                        <th class='center'>Image</th>
                        <th>Actions</th>
                    </tr>     
                        
                    <?php
                        //Select all categories in this array
                        $categories = "SELECT * FROM tbl_category";

                        $result = mysqli_query($dbc, $categories);

                        if($result){
                                
                            //Display categories
                            while($row = mysqli_fetch_assoc($result)){

                                echo "
                                    <tr>
                                        <td>{$row['category_id']}</td>
                                        <td>{$row['category_name']}</td>
                                        <td class='center'><img class='resimg' src='../uploadedImages/categories/{$row['image_name']}' alt = '{$row['category_name']} category'></td>
                                        <td><a aria-label='Delete Category' role='button' class='manageBtn delBtn' href='https://localhost/website/admin/deleteCategory.php?id={$row['category_id']}'>Delete</a></td>
                                    </tr> 
                                ";
                            }
                        }?>
                </table>
            
                <div class="categoryBoxes">        
                    <?php 
                        $result = mysqli_query($dbc, $categories);

                        while($row = mysqli_fetch_assoc($result)){

                            //Display categories in a different way when width of user's screen is smaller than 1000px (adminBox table) and 450px (adminBox2 table)
                            echo "

                                <table aria-label='Category Information' class='catBox'>
                                        
                                    <tr>
                                        <th>Category ID:</th>
                                        <td>{$row['category_id']}</td>
                                    </tr>

                                    <tr>
                                        <th>Name:</th>
                                        <td>{$row['category_name']}</td>
                                    </tr>

                                    <tr>
                                        <th>Image:</th>
                                        <td><img class='resimg' src='../uploadedImages/categories/{$row['image_name']}' alt = '{$row['category_name']} category'></td>
                                    </tr>

                                    <tr><td><a aria-label='Delete Category' role='button' class='manageBtn delBtn' href='https://localhost/website/admin/deleteCategory.php?id={$row['category_id']}'>Delete</a></td></tr>
                                </table>
                                <hr>

                                <table aria-label='Category Information' class='catBox2'>
                                            
                                    <tr><th>Category ID:</th></tr>  
                                    <tr><td>{$row['category_id']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><th>Name:</th></tr> 
                                    <tr><td>{$row['category_name']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><th>Image:</th></tr> 
                                    <tr><td><img class='resimg' src='../uploadedImages/categories/{$row['image_name']}' alt = '{$row['category_name']} category'></td></tr>

                                    <tr class='empty'></tr>

                                    <tr><td><a aria-label='Delete Category' role='button' class='manageBtn delBtn' href='https://localhost/website/admin/deleteCategory.php?id={$row['category_id']}'>Delete</a></td></tr>
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

            <?php
                if(mysqli_num_rows($result)==0){
                    
                    echo "<p class='noResults'>There is no categories!</p>";
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
        document.title = "Manage Categories - Accessible website";

        //It changes visually the current section of navbar every time the page is loaded
        window.onload = function(){ localStorage.setItem("section","2");};
    </script>
</body>
</html>