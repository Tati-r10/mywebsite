<!--This is the page where admin can create a new category-->

<?php include("partials/header.php");?>

    <main id="mainContent">

        <h1>Add new category</h1>

        <div class="container">            
            
           <form action="" method="POST" enctype="multipart/form-data" class="addTables">
                
                <label for="name">Name:</label>
                <input type="text" id="name" name="catName" placeholder="Name of new category" class="inputStyle" required>
                
                <label for="image">Image name:</label></td>
                <input type="file" id="image" name="image" placeholder="Image name of new category" class="inputStyle" required>

                <label for="imgLabel">Image label:</label></td>
                <input type="text" id="imgLabel" name="imgLabel" placeholder="Name of this category (e.g. sunglasses)" class="inputStyle" required>

                <button type="submit" name="addBtn">Add new category</button>
           </form>

        </div>
    </main>

<?php
    include("partials/footer.php");

    //Check if the sign up button was clicked, if the form was submitted
    if(isset($_POST["addBtn"])){
        
        //Get all tha data from form
        $name = trim($_POST["catName"]);
        $imageName = $_FILES["image"]["name"];
        $tempName = $_FILES["image"]["tmp_name"];
        $folder = "../uploadedImages/categories/".$imageName;
        $ariaLabel = "Move to ".trim($_POST["imgLabel"])." category";

        //Check if the category name exists
        $category_exists = "SELECT * FROM tbl_category WHERE category_name = '$name'";

        $result = mysqli_query($dbc,  $category_exists);
        
        //If the category exists pop up an alert box with this message
        if(mysqli_num_rows($result) != 0){
            
            echo "
                    <script>
                        var text = 'Category exists!';
                        alertText(text);
                    </script>
                ";
        }
        else{//if category does not exist

            //Query that inserts the form data to the database tbl_category
            $insert_category = "INSERT INTO tbl_category (category_name, image_name, aria_label) VALUES ('$name', '$imageName', '$ariaLabel')";

            //It executes query and saves data into database
            $result = mysqli_query($dbc,  $insert_category); 
            
            if($result){ //if category was inserted

                if (move_uploaded_file($tempName, $folder)) {
                    echo "<script>
                            var text = 'New category created! Image uploaded successfully!';
                            alertText(text);
                        </script>
                    ";
                } 
                else {

                    echo "<script>
                        var text = 'New category created! But failed to upload image!';
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
        document.title = "Add new category - Accessible website";

        //It changes visually the current section of navbar every time the page is loaded
        window.onload = function(){ localStorage.setItem("section","2");};
    </script>
</body>
</html>