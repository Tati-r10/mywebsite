<!--This is the home page that customer can see before log in to the account-->

<?php 

    include("../customer/partials/header.php");

    include("../customer/mainPage.php");

    include("../customer/partials/footer.php");
?>

<!--JAVASCRIPT code for the body-->
<script type="text/javascript">

    //It moves to anchor tag - 100px above because the navbar was floating over it 
    window.addEventListener("hashchange", function () {
        window.scrollTo(window.scrollX, window.scrollY - 100);
    });
    
    //It moves to anchor tag - 100px above because the navbar was floating over it 
    window.onload = function(){

        function load()
{
        window.location.hash="mylocation"; 
}
        window.scrollTo(window.scrollX, window.scrollY - 100);
    };



    
   

    //It changes visually the current section of navbar every time the page is loaded
    window.onload = function(){ localStorage.setItem("section","0");};
</script>

</body>
</html>