<!--This is the page with products-->

<?php include("../customer/partials/header.php"); ?>

    <!--Products categories starts here-->
    <main id="products">

        <?php
            //It returns all category name and category id from table
            $categories = "SELECT category_id, category_name FROM tbl_category ORDER BY category_id ASC";

            $result = mysqli_query($dbc,$categories);

            if($result){
                
                while($row = mysqli_fetch_assoc($result)){

                    //An associative array with category_id and category_name
                    $cat[$row["category_id"]] = $row["category_name"];
                }

                foreach($cat as $cid => $cname){

                    echo "
                        <div class='container' id='{$cname}'>

                            <h1>{$cname}</h1>

                            <div class='boxes'>
                    ";

                    $products = "SELECT * FROM tbl_product where category_id = $cid ORDER BY product_id ASC";

                    $result = mysqli_query($dbc,$products);

                    if($result){

                        while($prod = mysqli_fetch_assoc($result)){

                            echo "
                                <div aria-label='{$prod["product_name"]} details' class='productBox'>

                                    <img class='responsiveImg' tabindex='0' aria-label='{$prod["product_name"]}' src='../uploadedImages/products/{$prod["image_name"]}' alt='Product {$prod["product_name"]}'>

                                    <div class='details'>

                                        <h2>{$prod["product_name"]}</h2>

                                        <ul class='prodDetails'>

                                            <li>Code: <b>{$prod["product_id"]}</b></li>
                                            <li>Price: <b>{$prod["price"]}€</b></li>
                                        
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                    }
                }
            }
        ?>

    </main>  
    <!--Products categorie ends here-->
    
<?php include("../customer/partials/footer.php"); ?>

    <!--JAVASCRIPT code for product page-->
    <script type="text/javascript">

        //It changes the title of this page
        document.title = "Products - Accessible website";

        //It moves to anchor tag - 100px above because the navbar was floating over it 
       // window.addEventListener("hashchange", function () {
         //   window.scrollTo(window.scrollX, window.scrollY - 100);
        //});

        window.onload = function(){

            window.scrollTo(window.scrollX, window.scrollY - 100);


        };

        //It changes visually the current section of navbar every time
        localStorage.setItem("section","1");;

    </script>
</body>
</html>