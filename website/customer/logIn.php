<!--This is the log in page-->

<?php 

    include("../customer/partials/header.php");

    $_SESSION['logIn'] = false; //if the user login to site the value will be true
?>
    <main>
        <div class="logInBox">

            <h1>Log in to your account</h1>

            <?php  
                //If admin has not logged in yet
                if(!isset($_SESSION['admin'])){
            ?>
                    <button aria-label="Move to admin's log in page" id="adminLogin" onclick="location.replace('https://localhost/website/admin/adminLogin.php')">Admin's Log In</button>
            <?php
                }
            ?>

            <form aria-label="Form to log in in your account" method="POST">

                <label for="username">Username:</label>
                <input id="username" name="username" type="text" placeholder="Username" required> 

                <label for="password">Password:</label>
                <input id="password" name="password" type="password" placeholder="Password" required>

                <button aria-label="Click to log in in your account" type="submit" name="logInSubmit" id="logInBtn">Log In</button>

            </form>

            <p>If you don't have an account yet,<br> you can create one here.<a aria-label="Click to move on sign up form" id="signUp" href="#createAcc"> Sign Up</a></p>   
        </div>

        <div class="signUpBox" id="createAcc" >

            <h1>Create an account</h1>

            <form aria-label="Form to create an account" method="POST">

                <label for="name">Name:</label>
                <input id="name" name="name" type="text" placeholder="Name" required>

                <label for="surname">Surname:</label>
                <input id="surname" name="surname" type="text" placeholder="Surname" required> 

                <label for="email">Email:</label>
                <input id="email" name="email" type="text" placeholder="Email" required> 

                <label for="newUsername">Username:</label>
                <input id="newUsername" name="newUsername" type="text" placeholder="Username" required> 

                <label for="newPassword">Password:</label>
                <input role="textbox" id="newPassword" name="newPassword" type="password" placeholder="Password" required>

                <button aria-label="Click to create the account" type="submit" name="signUpSubmit" id="signUpBtn">Sign Up</button>
            </form>
        </div>
    </main>

<?php include("../customer/partials/footer.php"); ?>

    <!--JAVASCRIPT code for logIn page-->
    <script>

        document.title = "Log in - Accessible website";

        //It moves to anchor tag - 100px above because the navbar was floating over it 
        window.addEventListener("hashchange", function () {
            window.scrollTo(window.scrollX, window.scrollY - 100);
        });

        //It moves to anchor tag - 100px above because the navbar was floating over it 
        window.onload = function () { window.scrollTo(window.scrollX, window.scrollY - 100); };
        
        //It changes visually the current section of navbar every time the page is loaded
        localStorage.setItem("section","4");

    </script>

    <?php 

        //PHP CODE FOR LOG IN BOX 
        //Check if the log in button was clicked, if the form was submitted
        if(isset($_POST["logInSubmit"])){

            //Get all tha data from form
            $username = trim($_POST["username"]);
            $password = SHA1(trim($_POST["password"]));

            //Check if the username or email exists, so it will return results if the user has already an account with this combination of username-password 
            $user_exists = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password'";

            $result = mysqli_query($dbc, $user_exists);
            $num = mysqli_num_rows($result);

            if($num == 1){ //if only one user exists

                $_SESSION["logIn"] = 1; //Flag to check if the user logged in successfully

                $row = mysqli_fetch_assoc($result);
                $_SESSION["user"] = $row["first_name"]." ".$row["last_name"];//It saves user's name
            }
            else{ //If no one user exists with this combination of username-password

                echo "<script>";
                echo "var text = 'Invalid Username or Password!Please try again!';";
                echo "alertText(text)";
                echo "</script>";
            } 
            
            if($_SESSION["logIn"] == 1) {//if user logged in successfully
        
                //redirect to the home page but with user header
                header("location: http://localhost/website/customer/index.php");
                ob_end_flush(); 
            }
        }

        //PHP CODE FOR SIGN UP BOX
        //Check if the sign up button was clicked, if the form was submitted
        if(isset($_POST["signUpSubmit"])){
            
            //Get all tha data from form
            $name = trim($_POST["name"]);
            $surname = trim($_POST["surname"]);
            $email = trim($_POST["email"]);
            $new_username = trim($_POST["newUsername"]);
            $new_pass = SHA1(trim($_POST["newPassword"]));


            //Check if the username or email exists, so if the user has already an account
            $user_exists = "SELECT * FROM tbl_users WHERE username = '$new_username' or email = '$email' ";

            $result = @mysqli_query($dbc, $user_exists);

            //If the user exists pop up an alert box with this message
            if(mysqli_num_rows($result)!=0){
                
                echo "<script>";
                echo "var text = 'The user exists! If you already have an account, please fill the form to the log in box. Otherwise create a new account with different data.';";
                echo "alertText(text)";
                echo "</script>";
            }
            else{//if the user does not exist

                //Query that inserts the form data to the database tbl_users
                $insert_user = "INSERT INTO tbl_users (first_name, last_name, email, username, password) VALUES ('$name', '$surname', '$email', '$new_username', '$new_pass')";

                //It executs query and saves data into database
                $result = @mysqli_query($dbc, $insert_user); 
            
                if($result){ //if the user was inserted
                    echo "<script>";
                    echo "var text = 'New user created!Please log in!';";
                    echo "alertText(text)";
                    echo "</script>";
                }
                else{
                    echo "<script>";
                    echo "var text = 'An error occured!Please try again';";
                    echo "alertText(text)";
                    echo "</script>";
                }
            }            
        }
    ?>
</body>
</html>