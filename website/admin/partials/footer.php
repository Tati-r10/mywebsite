<!--This file includes code for the footer on the admin pages-->
    
    <!--Alert box starts here-->
    <div id="alertMsg" role="alert">
        <p id="msg"></p>

        <!--When the button in alert box be clicked, the page will be refreshed-->
        <button onclick="closeAlert()">OK</button> 
    </div>
    <!--Alert box ends here-->
    <br>
    <!--Footer section starts here-->
      <footer class="container">        
        <h1 id="hfooter">All rights reserved.</h1>
    </footer>
    <!--Footer section ends here-->


    <!--Links for JAVASCRIPT files-->
    <script src="../JAVASCRIPT/navbar.js"></script>
    <script src="../JAVASCRIPT/settings.js"></script>
    <script>
        
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
