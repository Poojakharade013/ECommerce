<?php

include('server/connection.php');

if(isset($_GET['product_id'])){

        $product_id = $_GET['product_id'];
        $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ? ");
        $stmt->bind_param("i",$product_id);

        $stmt->execute();

        $product = $stmt->get_result();


}else{

        header('location: index.php');

}




?>








<?php include('layouts/header.php');?> 

<style>
  .buy-btn1 {
    background-color: coral;
    color: white;
    border: none;
    font-size: 16px;
    cursor: pointer;
    text-decoration: none;
    padding: 10px;
    width: 400px;
}

/* Hover Effect */
.buy-btn1:hover {
    background-color: black;
}
</style>

  
 <!--single product-->

      <section class="container single-product my-5 pt-5">
        <div class="row mt-5">

        <?php while($row = $product->fetch_assoc()){?>

            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="assets/imgs/<?php echo $row['product_image']; ?>" alt="" id="mainImg">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image']; ?>" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image2']; ?>" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image3']; ?>" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image4']; ?>" alt="" width="100%" class="small-img">
                    </div>
                </div>
                

            </div>
           

            <div class="col-lg-6 col-md-12 col-sm-12">
                <h6>ANIME SHOES</h6>
                <h3 class="py-4"><?php echo $row['product_name'] ?></h3>
                <h2><?php echo $row['product_price'] ?></h2>
                <input type="number" value="1"/>
                <button class="buy-btn" onclick="openForm()">ADD TO CART</button>
                <h4 class="mt-5 mb-5">PRODUCT DETAILS</h4>
                <span><?php echo $row['product_description'] ?></span>
            </div>

            <?php }?> 
        </div>
      </section>

 <!--related-->
           <!--related-->
<section id="related-products" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>RELATED PRODUCTS</h3>
        <hr class="mx-auto">
    </div>
    <div class="row mx-auto container-fluid">

        <?php
        // Fetching random products from the database
        $stmtRandom = $conn->prepare("SELECT * FROM products ORDER BY RAND() LIMIT 4");
        $stmtRandom->execute();
        $resultRandom = $stmtRandom->get_result();

        while ($rowRandom = $resultRandom->fetch_assoc()) {
        ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $rowRandom['product_image']; ?>" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $rowRandom['product_name']; ?></h5>
                <h4 class="p-price">&#8377 <?php echo $rowRandom['product_price']; ?> </h4>
                <a href="single_product.php?product_id=<?php echo $rowRandom['product_id']; ?>" class="buy-btn1">BUY NOW</a>

        </div>
        <?php } ?>

    </div>
</section>














    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
     var mainImg = document.getElementById("mainImg");
     var smallImg = document.getElementsByClassName("small-img"); 

     for( let i=0; i<4 ;i++){
                    smallImg[i].onclick =function(){
                        mainImg.src = smallImg[i].src;
                    }
    }

    function openForm() {
    // You can use window.open or any other method to open your mail.html in a new window or modal
    // Here, I'm using window.open as an example
    window.location.href = 'mail.html';

    }
    


    </script>



<?php include('layouts/footer.php');?>