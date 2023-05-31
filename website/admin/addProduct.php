<!--Here admin can add a new product-->

<?php include("partials/header.php")?>

    <main id="mainContent">

        <h1>Add new Product</h1>

        <div class="container"> 
            
            <form action="" method="POST" enctype="multipart/form-data" class="addTables">
                    
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Name of new product" class="inputStyle" required>
                    
                    <label for="category">Category:</label></td>
                    <select id="category" name="category" class="inputStyle" required>
                        <?php

                            $categories = "SELECT * FROM tbl_category";

                            $result = mysqli_query($dbc,$categories);

                            while($row = mysqli_fetch_assoc($result)){

                                echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
            
                            }
                        ?>
                    </select>

                    <label for="image">Image name:</label></td>
                    <input type="file" id="image" name="image" placeholder="Image name of new product" class="inputStyle" required>

                    <label for="price">Price:</label></td>
                    <input type="number" id="price" name="price" min="0.00" step="0.01" placeholder="Price of new product" class="inputStyle" required>

                    <button type="submit" name="addBtn">Add new product</button>
            </form>

        </div>
    </main>

<?php

    include("partials/footer.php");

    //Check if the submit button was clicked, if the form was submitted
    if(isset($_POST["addBtn"])){
        
        //Get all tha data from form
        $name = trim($_POST["name"]);
        $category = $_POST['category'];
        $imageName = $_FILES["image"]["name"];
        $tempName = $_FILES["image"]["tmp_name"];
        $folder = "../uploadedImages/products/".$imageName;
        $price = $_POST['price'];

        //Check if the product name exists
        $product_exists = "SELECT * FROM tbl_product WHERE product_name = '$name'";

        $result = mysqli_query($dbc,  $product_exists);

        //If the product exists pop up an alert box with this message
        if(mysqli_num_rows($result) != 0){
            
            echo "
                    <script>
                        var text = 'Product exists!';
                        alertText(text);
                    </script>
                ";
        }
        else{//if product does not exist

            //Query that inserts the form data to the database tbl_product
            $insert_product = "INSERT INTO tbl_product (product_name, category_id , image_name, price) VALUES ('$name', '$category', '$imageName', '$price')";

            //It executes query and saves data into database
            $result = mysqli_query($dbc,  $insert_product); 
            
            if($result){ //if product was inserted

                if (move_uploaded_file($tempName, $folder)) {
                    echo "<script>
                            var text = 'New product created! Image uploaded successfully!';
                            alertText(text);
                        </script>
                    ";
                } 
                else {

                    echo "<script>
                        var text = 'New product created! But, failed to upload image!';
                        alertText(text);
                    </script>
                    ";
                }
            }
            else{
                echo "
                    <script>
                        var text = 'An error occured!Please try again';
                        alertText(text);
                    </script>
                ";
            }
        }            
    }
?>

    <script>
        //It changes the title of this page
        document.title = "Add new product - Accessible website";

        //It changes visually the current section of navbar every time the page is loaded
        window.onload = function(){ localStorage.setItem("section","3");};
    </script>
</body>
</html>