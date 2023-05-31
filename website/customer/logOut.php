 <!--This is the log out page.It logs out the user and redirect to home page as customer without account-->
<?php 
    include("../customer/partials/header.php");
?>
    <!--An alert message presented before log out-->
    <main id="outFormBox" class="bclors">
        <form id="logOutBox" method="POST">
            <h1>Log out</h1>
            <h2>If you click the button you are going to log out, are you sure?</h2>
            <button aria-label="Click to log out" type="submit" name="yes" onclick="logOut()">Yes</button>
        </form>
    </main>

<?php
    include("../customer/partials/footer.php");
    
    //if the user want to log out
    if(isset($_POST["yes"])){

        session_destroy();
        header("Location: http://localhost/website/customer/index.php");
        ob_end_flush();
    }
?>

    <!--JAVASCRIPT code for log in page-->
    <script type="text/javascript">

        document.title = "Log Out - Accessible website";
  
        //It moves to anchor tag - 100px above because the navbar was floating over it 
        window.onload = function () { window.scrollTo(window.scrollX, window.scrollY - 100); };

        //It changes visually the current section of navbar every time the page is loaded
        localStorage.setItem("section","5");
    </script>
</body>
</html>