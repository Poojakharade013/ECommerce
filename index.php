
<?php include('layouts/header.php');?>



<!----home-->
      <section id="home">      

        <div class="container">
            <h5>NEW ARRIVALS</h5>
            <h1><span><strong>BEST PRICES</strong></span> <strong>THIS SEASON</strong></h1>
            <p>Eshop offers the best products for the most affordable prices</p>
            <button>SHOP NOW</button>
        </div>
      </section>

      <!--Brand-->
      <section id="brand" class="container">
        <div class="row">
          <marquee behavior="scroll" direction="left" class="marquee--inner">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg" alt="">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand2.jpg" alt="">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand3.png" alt="">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand4.jpg" alt="">
          </marquee>
        </div>

      </section>

      <!--New-->
      <section id="new" class="w-100"> 
        <div class="row p-0 m-0">
          <!--One-->
          <div class="one col-lg-4 col-md-12 col-sm-12">
            <img class="img-fluid" src="assets/imgs/shoe1.jpg" alt="">
            <div class="details">
              <h2>EXTREAMELY AWESOME SHOES</h2>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>
           <!--Two-->
           <div class="one col-lg-4 col-md-12 col-sm-12">
            <img class="img-fluid" src="assets/imgs/hoodie1.jpg" alt="">
            <div class="details">
              <h2>AWESOME HOODIES</h2>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>

            <!--Three-->
            <div class="one col-lg-4 col-md-12 col-sm-12">
              <img class="img-fluid" src="assets/imgs/figure1.jpg" alt="">
              <div class="details">
                <h2>50% OFF FIGURES</h2>
                <button class="text-uppercase">Shop Now</button>
              </div>
            </div>

        </div>
      </section>

      <!--Featured-->
      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>OUR FEATURED</h3>
          <hr class="mx-auto">
          <p>HERE YOU CAN CHECK OUR FEATURED PRODUCTS</p>
        </div>
        <div class="row mx-auto container-fluid">
          <?php include('server/get_featured_products.php');  ?>

          <?php while($row = $featured_products->fetch_assoc()){?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">

            <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" alt="">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
             <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">BUY NOW</button></a> 
           
          </div>
        <?php }?>

        </div>
      </section>

      <!--Banner-->
  
      <section id="banner" class="my-5 py-5">
      <div class="container">
        <h4>MID SEASON'S SALE</h4>
        <h1>AUTUM COLLECTION <br>UP TO 30% OFF</h1>
        <button class="text-uppercase">shop now</button>
      </div>
    </section>

    '<!--Clothes-->'
    <section id="featured" class="my-5 ">
      <div class="container text-center mt-5 py-5">
        <h3>T-SHIRTS & HOODIES</h3>
        <hr class="mx-auto">
        <p>HERE YOU CAN CHECK OUR T-SHIRTS & HOODIES</p>
      </div>
      <div class="row mx-auto container-fluid" >

      <?php include('server/get_coats.php');  ?>

      <?php while($row = $coats_products->fetch_assoc()){?>

        <div class="product text-center col-lg-3 col-md-4 col-sm-12">

          <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'];?>"  height="mx-auto">
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
          <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
          <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">BUY NOW</button></a> 

         
        </div>
        <?php }?>

      </div>
    </section>

    '<!--Figures-->'
    <section id="featured" class="my-5 ">
      <div class="container text-center mt-5 py-5">
        <h3>FIGURES</h3>
        <hr class="mx-auto">
        <p>HERE YOU CAN CHECK OUR FIGURES</p>
      </div>

      <div class="row mx-auto container-fluid" >

      <?php include('server/get_figures.php');  ?>

      <?php while($row = $figures->fetch_assoc()){?>

        <div class="product text-center col-lg-3 col-md-4 col-sm-12">

          <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'];?>" alt="" height="mx-auto">
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
          <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
          <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">BUY NOW</button></a> 

         
        </div>
        <?php }?>

      </div>
    </section>

     '<!--POSTERS-->'
     <section id="featured" class="my-5 ">
      <div class="container text-center mt-5 py-5">
        <h3>POSTERS</h3>
        <hr class="mx-auto">
        <p>HERE YOU CAN CHECK OUR POSTERS</p>
      </div>
      <div class="row mx-auto container-fluid" >
        
      <?php include('server/get_posters.php');  ?>

      <?php while($row = $posters->fetch_assoc()){?>

        <div class="product text-center col-lg-3 col-md-4 col-sm-12">

          <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'];?>" alt="" >
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
          <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
          <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">BUY NOW</button></a> 

         
        </div>
        <?php }?>

      </div>
    </section>


    <?php include('layouts/footer.php');?>