<!--This is the page where admin can manage products(add, delete)-->

<?php include("partials/header.php")?>

        <main id="mainContent">

            <h1>Manage Products</h1>
            <br>

            <a aria-label="Move to add product page" role=button class="manageBtn addBtn" href="addProduct.php">Add Product</a>
            
            <div class="container" > 
                <table aria-label="Products" class="manageTables productTable">
                    <tr class="linerow">
                        <th>Product ID</th>
                        <th>Name</th>
                        <th class='center'>Image</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>     
                        
                    <?php
                        //Select all products in this array
                        $products = "SELECT * FROM tbl_product ORDER BY category_id";

                        $result = mysqli_query($dbc, $products);

                        if($result){
                                
                            //Display products
                            while($row = mysqli_fetch_assoc($result)){

                                echo "
                                    <tr>
                                        <td>{$row['product_id']}</td>
                                        <td>{$row['product_name']}</td>
                                        <td class='center'><img class='resimg' src='../uploadedImages/products/{$row['image_name']}' alt = 'Product {$row['product_name']}'></td>
                                        <td>{$row['price']}</td>
                                        <td><a aria-label='Delete Product' role='button' class='manageBtn delBtn' aria-label='Delete product' href='https://localhost/website/admin/deleteProduct.php?id={$row['product_id']}'>Delete</a></td>
                                    </tr> 
                                ";
                            }
                        }?>
                </table>

                <div class="productBoxes">        
                    <?php 
                         $result = mysqli_query($dbc, $products);

                        while($row = mysqli_fetch_assoc($result)){

                            //Display categories in a different way when width of user's screen is smaller than 1000px (adminBox table) and 450px (adminBox2 table)
                            echo "

                                <table aria-label='Product Information' class='proBox'>
                                        
                                    <tr>
                                        <th>Product ID:</th>
                                        <td>{$row['product_id']}</td>
                                    </tr>

                                    <tr>
                                        <th>Name:</th>
                                        <td>{$row['product_name']}</td>
                                    </tr>

                                    <tr>
                                        <th>Image:</th>
                                        <td><img class='resimg' src='../uploadedImages/products/{$row['image_name']}' alt = 'Product {$row['product_name']}'></td>
                                    </tr>

                                    <tr>
                                        <th>Price:</th>
                                        <td>{$row['price']}</td>
                                    </tr>

                                    <tr><td><a aria-label='Delete Product' role='button' class='manageBtn delBtn' aria-label='Delete product' href='https://localhost/website/admin/deleteProduct.php?id={$row['product_id']}'>Delete</a></td></tr>
                                </table>
                                <hr>

                                <table aria-label='Product Information' class='proBox2'>
                                            
                                    <tr><th>Product ID:</th></tr>  
                                    <tr><td>{$row['product_id']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><th>Name:</th></tr> 
                                    <tr><td>{$row['product_name']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><th>Image:</th></tr> 
                                    <tr><td><img class='resimg' src='../uploadedImages/products/{$row['image_name']}' alt = 'Product {$row['product_name']}'></td></tr>

                                    <tr class='empty'></tr>

                                    <tr><th>Price:</th></tr> 
                                    <tr><td>{$row['price']}</td></tr>

                                    <tr class='empty'></tr>

                                    <tr><td><a aria-label='Delete Product' role='button' class='manageBtn delBtn' aria-label='Delete product' href='https://localhost/website/admin/deleteProduct.php?id={$row['product_id']}'>Delete</a></td></tr>
                                </table>   
                                <hr> 
                            ";
                        }
                    ?>
                </div>
            </div>

            <?php
                if(mysqli_num_rows($result)==0){
                    
                    echo "<p class='noResults'>There is no products!</p>";
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
        document.title = "Manage Products - Accessible website";

        //It changes visually the current section of navbar every time the page is loaded
        window.onload = function(){ localStorage.setItem("section","3");};
    </script>
</body>
</html>