<!--Here admin can change general informations about the website-->

<?php include("partials/header.php");?>

    <main id="mainContent">

        <h1>Manage General Information</h1>

        <div class="container">            
            
            <form method="POST" enctype="multipart/form-data" class="addTables">
                
                <label for="logo">Logo name:</label></td>
                <input type="file" id="logo" name="logo" placeholder="Image name of company's logo" class="inputStyle">

                <label for="logoDis">Logo discription:</label>
                <input type="text" id="logoDis" name="logoDis" placeholder="Small discription for logo" class="inputStyle">

                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Title for about section" class="inputStyle">
                
                <label for="abstract">Abstract:</label></td>
                <textarea type="text" id="abstract" name="abstract" placeholder="Abstract for the company (If you want to add ' you must write it as \'.)" class="inputStyle"></textarea>

                <label for="address">Adress:</label></td>
                <input type="text" id="address" name="address" placeholder="Company's address" class="inputStyle">

                <label for="telephone">Telephone:</label></td>
                <input type="tel" id="telephone" name="telephone" placeholder="Telephone number" class="inputStyle">

                <label for="email">Email:</label></td>
                <input type="email" id="email" name="email" placeholder="Email address" class="inputStyle">

                <label for="facebook">Facebook url:</label></td>
                <input type="facebook" id="facebook" name="facebook" placeholder="Facebook account url" class="inputStyle">

                <label for="instagram">Instagram url:</label></td>
                <input type="instagram" id="instagram" name="instagram" placeholder="Instagram account url" class="inputStyle">

                <label for="linkedin">LinkedIn url:</label></td>
                <input type="linkedin" id="linkedin" name="linkedin" placeholder="Linkedin account url" class="inputStyle">

                <button type="submit" name="addBtn">Apply</button>
           </form>
        </div>
    </main>

<?php
    include("partials/footer.php");

    //Check if the apply button was clicked, if the form was submitted
    if(isset($_POST["addBtn"])){

        $success = 1; //flag that checks if every selected field was inserted to database successfully
        
        $logoName =  $_FILES["logo"]["name"];
        $tempName = $_FILES["logo"]["tmp_name"];
        $folder = "../uploadedImages/logoImages/".$logoName;
        
        //If admin uploaded a new logo
        if ($logoName!= null){ 

            $upload = mysqli_query($dbc, "UPDATE tbl_general_info SET logo = '$logoName'");
            $move = move_uploaded_file($tempName, $folder);

            if(!$uploaded AND !$move){//If image wasn't uploaded or moved to folder successfully
                $success = 0;
            }
        }

        //If admin updated the alt text for logo
        if (isset($_POST["logoDis"]) AND ($_POST["logoDis"]!= null)){

            $alt = trim($_POST["logoDis"]);

            if(!mysqli_query($dbc, "UPDATE tbl_general_info SET alt = '$alt'")){
                $success = 0;
            }
        }

        //If admin updated the title for abstract
        if (isset($_POST["title"]) AND ($_POST["title"]!= null )){

            $title = trim($_POST["title"]);

            if(!mysqli_query($dbc, "UPDATE tbl_general_info SET title = '$title'")){
                $success = 0;
            }
        }

        //If admin updated the abstract
        if (isset($_POST["abstract"]) AND ($_POST["abstract"]!= null )){

            $abstract = trim($_POST["abstract"]);

            if(!mysqli_query($dbc, "UPDATE tbl_general_info SET abstract = '$abstract'")){
                $success = 0;
            }
        }

        //If admin updated the address
        if (isset($_POST["address"]) AND ($_POST["address"]!= null )){

            $address = trim($_POST["address"]);

            if(!mysqli_query($dbc, "UPDATE tbl_general_info SET comp_address = '$address'")){
                $success = 0;
            }
        }

        //If admin updated the telephone
        if (isset($_POST["telephone"]) AND ($_POST["telephone"]!= null )){

            $telephone = trim($_POST["telephone"]);

            if(!mysqli_query($dbc, "UPDATE tbl_general_info SET tel = '$telephone'")){
                $success = 0;
            }
        }

        //If admin updated the email
        if (isset($_POST["email"]) AND ($_POST["email"]!= null )){

            $email = trim($_POST["email"]);

            if(!mysqli_query($dbc, "UPDATE tbl_general_info SET email = '$email'")){
                $success = 0;
            }
        }

         //If admin updated the facebook
         if (isset($_POST["facebook"]) AND ($_POST["facebook"]!= null )){

            $facebook = trim($_POST["facebook"]);

            if(!mysqli_query($dbc, "UPDATE tbl_general_info SET facebook = '$facebook'")){
                $success = 0;
            }
        }

         //If admin updated the instagram
         if (isset($_POST["instagram"]) AND ($_POST["instagram"]!= null )){

            $instagram = trim($_POST["instagram"]);

            if(!mysqli_query($dbc, "UPDATE tbl_general_info SET instagram = '$instagram'")){
                $success = 0;
            }
        }

         //If admin updated the linkedin
         if (isset($_POST["linkedin"]) AND ($_POST["linkedin"]!= null )){

            $linkedin = trim($_POST["linkedin"]);

            if(!mysqli_query($dbc, "UPDATE tbl_general_info SET linkedin = '$linkedin'")){
                $success = 0;
            }
        }
        
        if($success == 1){//if every selected field was inserted successfully
            
            echo "
                <script>
                    var text = 'Selected information updated!';
                    alertText(text);
                </script>
            ";
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
?>

<script>

    //It changes the title of this page
    document.title = "Manage information - Accessible website";

    //It changes visually the current section of navbar every time the page is loaded
    window.onload = function(){ localStorage.setItem("section","0");};
</script>
</body>
</html>