<!--This is the log in page-->

<?php 
    ob_start();
    include("../customer/partials/header.php");

    $_SESSION['logIn'] = false; //if the user login to site the value will be true
?>
    <div class="logInBox">

        <h1>Admin log in</h1>

        <form method="POST">

            <label for="username">Username:</label>
            <input id="username" name="username" type="text" placeholder="Username" required> 

            <label for="password">Password:</label>
            <input id="password" name="password" type="password" placeholder="Password" required>

            <button type="submit" name="logInSubmit" id="logInBtn">Log In</button>

        </form>
    </div>

<?php include("../customer/partials/footer.php"); ?>

    <!--JAVASCRIPT code for logIn page-->
    <script>

        document.title = "Admin's Log in - Accessible website";

        //It moves to anchor tag - 100px above because the navbar was floating over it 
        window.addEventListener("hashchange", function () {
            window.scrollTo(window.scrollX, window.scrollY - 100);
        });

        window.onload = function(){ localStorage.setItem("section","4");};//It changes visually the current section of navbar at the first load
        activeSection( localStorage.getItem("section") ); //It changes visually section of navbar that was clicked from the user


        selectedChoices(); //It maintains the chosen accessibility settings
    </script>

    <?php 

        //PHP CODE FOR LOG IN BOX 
        //Check if the log in button was clicked, if the form was submitted
        if(isset($_POST["logInSubmit"])){

            //Get all tha data from form
            $username = trim($_POST["username"]);
            $password = SHA1(trim($_POST["password"]));

            //Check if the username or email exists, so it will return results if the admin has already an account with this combination of username-password 
            $admin_exists = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";

            $result = mysqli_query($dbc, $admin_exists);
            $num = mysqli_num_rows($result);

            if($num == 1){ //if only one user exists

                $_SESSION['logIn'] = 'true'; //Flag to check if the user logged in successfully
                $_SESSION['admin'] = $num['fist_name'] + ' ' + $num['last_name'];
            }
            else{ //If no one user exists with this combination of username-password

                echo "<script>";
                echo "var text = 'Invalid Username or Password!Please try again!';";
                echo "alertText(text)";
                echo "</script>";
            } 
            
            if($_SESSION["logIn"]) {//if user logged in successfully

                //redirect to the home page for user
                header("location: https://localhost/website/admin/homeAdmin.php");
                ob_end_flush(); 
            }
        }
    ?>
</body>
</html>