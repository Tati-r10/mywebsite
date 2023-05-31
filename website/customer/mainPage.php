<!--This file includes the main content of website (categories, products, contact info)-->

<main>
<!--Products categories starts here-->
    <section aria-label="Product categories section" id="categories">
        <div class="container">
            <h1 >Categories</h1>

            <?php

                //Select all categories in category table
                $categories = "SELECT * FROM tbl_category";

                $result = mysqli_query($dbc, $categories);

                if($result){

                    echo "<div class='boxes'>";
                        
                    //Display categories
                    while($row = mysqli_fetch_assoc($result)){

                        $imgUrl = "../uploadedImage/{$row['image_name']}";

                        echo "
                            <a class='boxCategory' href='../customer/products.php#{$row["category_name"]}' style='background-image: url(../uploadedImages/categories/{$row['image_name']});' aria-label= '{$row['aria_label']}'>                                
                                <h2>{$row['category_name']}</h2>
                            </a>
                        ";
                    }
                }

                echo "</div>";
            ?>
        </div>
    </section>
   <!--Products categories ends here-->

    <!--About section starts here-->
    <section aria-label="About company section" id="about">
        <div class="container">
            <h1>About us</h1>

            <?php

                //Select all general information about the webpage
                $generalInfo = "SELECT * FROM tbl_general_info";

                $result = mysqli_query($dbc, $generalInfo);

                if($result){

                    while($row = mysqli_fetch_assoc($result)){

                        $title = $row["title"];
                        $abstract = $row["abstract"];
                        $address = $row["comp_address"];
                        $telephone = $row["tel"];
                        $email = $row["email"];
                    }
                }
            ?>

            <div class="aboutBox">
                <h2><?php echo $title;?></h2>
                <p id="aboutAbstract"><?php echo $abstract;?></p>
                <br>
            </div> 
        </div>
    </section>
    <!--About section ends here-->

    <!--Contact section starts here-->
    <section aria-label="Contact information section" id="contact">
        <div class="container">
            <h1>Contact</h1>

            <div class="contactBox">

                <ul class="contactInfo">
                    <li role="listitem" name="address"><img class="icons responsiveImg" src="../images/address.png" alt=""/> Address: <i><?php echo $address ?></i></li>
                    <li role="listitem" name="telephone"><img class="icons responsiveImg" src="../images/tel.png" alt=""/> Telephone: <i><?php echo $telephone ?></i></li>
                    <li role="listitem" name="email"><img class="icons responsiveImg" src="../images/email.png" alt=""/> Email: <i><?php echo $email ?></i></li>	
                </ul>
                <div class="formBox">
                    <h2>Get in Touch</h2>
                    <h3>If you have any questions or need help, please fill out the form below.</h3>

                    <form method="POST" >
                        <label for="name">Name:</label>
                        <input  class="fields" type="text" id="name" name="fullName" placeholder="Full Name" autocomplete="on" required>
                        
                        <label for="email">Email:</label>
                        <input class="fields" type="email" id="email" name="email" placeholder="Email Address" autocomplete="on" required>
                        
                        <label for="message">Message:</label>
                        <textarea class="fields" type="text" id="message" name="message" placeholder="Write your message..." required></textarea>
                        
                        <button type="submit" id="sendBtn" name="emailSubmit">Send</button>
                    </form>
                </div>
            </div> 
        </div>
    </section>
    <!--Contact section ends here-->

</main>

    <?php
        //PHP CODE FOR CONTACT BOX 
        //Check if the send button was clicked, if the form was submitted
        if(isset($_POST["emailSubmit"])){
            
            ///Get all tha data from form
            $fullName = $_POST["fullName"];
            $email = $_POST["email"];
            $message = $_POST["message"];

            //Check if the email exists and the user has already account
            $user_exists = "SELECT * FROM tbl_users WHERE email = '$email'";

            $result = mysqli_query($dbc, $user_exists);
            $num = mysqli_num_rows($result);

            if($num == 1){ //If user has account

                $row = mysqli_fetch_assoc($result);

                $userID = $row["user_id"];

                //Query that inserts the form data to the database tbl_message
                $insert_message = "INSERT INTO tbl_message (user_id, full_name, email, msg) VALUES ('$userID', '$fullName', '$email', '$message')";
            }
            else{ //If user has not account

               //Query that inserts the form data to the database tbl_message
                $insert_message = "INSERT INTO tbl_message (full_name, email, msg) VALUES ('$fullName', '$email', '$message')";

            }

            //It executs query and saves data into database
            $result = mysqli_query($dbc, $insert_message); 
        
            if($result){ //if the message was inserted

                //redirect to thankYou page for user
                header("location: http://localhost/website/customer/thankYou.php");
                ob_end_flush(); 
            }
            else{
                echo "<script>";
                echo "var text = 'An error occured!Please try again';";
                echo "alertText(text)";
                echo "</script>";
            }
        }

        ob_end_flush(); //It executes the output that was stored in the buffer
    ?>    
