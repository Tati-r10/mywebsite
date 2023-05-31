<!--This is the footer for customer's side-->

<!--Alert box starts here-->
<div id="alertMsg" role="alert">
        <p id="msg"></p>

        <!--When the button in alert box be clicked, the page will be refreshed-->
        <button onclick="closeAlert()">OK</button> 
    </div>
    <!--Alert box ends here-->
    
    <!--Footer section starts here-->
    <footer class="container">

    <?php

        $info = "SELECT facebook, instagram, linkedin FROM tbl_general_info";

        $result = mysqli_query($dbc,$info);

        if($result){

            while($row = mysqli_fetch_assoc($result)){

                $facebook = $row["facebook"];
                $instagram = $row["instagram"];
                $linkedIn = $row["linkedin"];
            }
        }
    ?>

        <nav aria-label="Social media profile links" id="socialInfo">
            <h2>Join us on:</h2>
            <a aria-label="Move to our account on Facebook" href="<?php echo $facebook ?>"><img class="social" src="../images/facebook.png" alt="Facebook"/></a>
            <a aria-label="Move to our account on Instagram" href="<?php echo $instagram ?>"><img class="social" src="../images/instagram.png" alt="Instagram"/></a>
            <a aria-label="Move to our account on LinkedIn" href="<?php echo $linkedIn ?>"><img class="social" src="../images/linkedin.png" alt="LinkedIn"/></a>
        </nav>

        <h3 class="hfooter">All rights reserved.</h3>
    </footer>
    <!--Footer section ends here-->

    <!--Links for JAVASCRIPT files-->
    <script type="text/javascript" src="../JAVASCRIPT/navbar.js"></script>
    <script type="text/javascript" src="../JAVASCRIPT/settings.js"></script>

    <!-- JAVASCRIPT for alert boxes-->
    <script type="text/javascript">

        //It changes visually section of navbar that was clicked from the user
        activeSection( localStorage.getItem("section") ); 
        
        //It maintains the chosen accessibility settings
        selectedChoices(); 

        //Function that pop up the alert message
        function alertText(text){

            var msg = document.getElementById("msg");//element for the message text
            
            alertBox = document.getElementById("alertMsg"); //element for alert box
            
            msg.innerText = text; //display the desirable message
            alertBox.style.display = "block";
        }

        //Function that close the alert message
        function closeAlert(){
            
            alertBox = document.getElementById("alertMsg"); //element for alert box
            
            alertBox.style.display = "none";
            
            location.replace(location);
        }
    </script>