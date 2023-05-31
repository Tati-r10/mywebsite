<!--Here admin can add new admin accounts-->

<?php include("partials/header.php");?>

    <main id="mainContent">

        <h1>Add new admin</h1>

        <div class="container">            
            
           <form action="" method="POST" class="addTables">
                
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="New admin's name" class="inputStyle" required>
                
                <label for="surname">Surname:</label></td>
                <input type="text" id="surname" name="surname" placeholder="New admin's surname" class="inputStyle" required>

                <label for="username">Username:</label></td>
                <input type="text" id="username" name="username" placeholder="New admin's username" class="inputStyle" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="New admin's password" class="inputStyle" required>

                <button type="submit" name="addBtn">Add new admin</button>
           </form>

        </div>
    </main>

    <script>
        //It changes the title of this page
        document.title = "Add Admin - Accessible website";

        //It changes visually the current section of navbar every time the page is loaded
        window.onload = function(){ localStorage.setItem("section","1");};
    </script>

<?php
    include("partials/footer.php");

    //Check if the sign up button was clicked, if the form was submitted
    if(isset($_POST["addBtn"])){
        
        //Get all tha data from form
        $firstName = trim($_POST["name"]);
        $lastName = trim($_POST["surname"]);
        $username = trim($_POST["username"]);
        $pass = SHA1(trim($_POST["password"]));

        //Check if the username exists
        $admin_exists = "SELECT * FROM tbl_admin WHERE username = '$username'";

        $result = mysqli_query($dbc, $admin_exists);
        
        //If the user exists pop up an alert box with this message
        if(mysqli_num_rows($result) != 0){
            
            echo "
                    <script>
                        var text = 'Admin exists!';
                        alertText(text);
                    </script>
                ";
        }
        else{//if admin does not exist

            //Query that inserts the form data to the database tbl_users
            $insert_admin = "INSERT INTO tbl_admin (first_name, last_name, username, password) VALUES ('$firstName', '$lastName', '$username', '$pass')";

            //It executs query and saves data into database
            $result = mysqli_query($dbc, $insert_admin); 
            
            if($result){ //if admin was inserted
                 
                echo "
                    <script>
                        var text = 'New admin created!';
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
    }
?>
</body>
</html>