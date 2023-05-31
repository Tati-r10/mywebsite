<!--Here admin can add new customers-->

<?php include("partials/header.php");?>

    <main id="mainContent">

        <h1>Add new customer</h1>

        <div class="container">            
            
            <form method="POST" class="addTables">
                
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Customer's name" class="inputStyle" required>
                
                <label for="surname">Surname:</label></td>
                <input type="text" id="surname" name="surname" placeholder="Customer's surname" class="inputStyle" required>

                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="Customer's email" class="inputStyle" required> 

                <label for="username">Username:</label></td>
                <input type="text" id="username" name="username" placeholder="Customer's username" class="inputStyle" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Customer's password" class="inputStyle" required>

                <button type="submit" name="addBtn">Add new admin</button>
           </form>

        </div>
    </main>

    <script>
        //It changes the title of this page
        document.title = "Add new customer - Accessible website";

        //It changes visually the current section of navbar every time the page is loaded
        window.onload = function(){ localStorage.setItem("section","4");};
    </script>

<?php
    include("partials/footer.php");

    //Check if the sign up button was clicked, if the form was submitted
    if(isset($_POST["addBtn"])){
        
        //Get all tha data from form
        $name = trim($_POST["name"]);
        $surname = trim($_POST["surname"]);
        $email = trim($_POST["email"]);
        $username = trim($_POST["username"]);
        $password = SHA1(trim($_POST["password"]));

        //Check if the username or email exists, so if the customer has already an account
        $customer_exists = "SELECT * FROM tbl_users WHERE username = '$username' or email = '$email' ";

        $result = @mysqli_query($dbc, $customer_exists);

        //If the customer exists pop up an alert box with this message
        if(mysqli_num_rows($result)!=0){
                
            echo "<script>";
            echo "var text = 'The customer has already account!';";
            echo "alertText(text)";
            echo "</script>";
        }
        else{//if the customer does not exist

            //Query that inserts the form data to the database tbl_users
            $insert_user = "INSERT INTO tbl_users (first_name, last_name, email, username, password) VALUES ('$name', '$surname', '$email', '$username', '$password')";

            //It executs query and saves data into database
            $result = @mysqli_query($dbc, $insert_user); 
        
            if($result){ //if the customer was inserted
                echo "<script>";
                echo "var text = 'New customer created!';";
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