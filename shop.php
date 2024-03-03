<?php

include('server/connection.php');



if(isset($_POST['search'])){

        //determine page no
        if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
            // already entered page
            $page_no = $_GET['page_no'];
        }else{
            //if user entered shop
            $page_no = 1;
        }

        $category = $_POST['category'];
        $price = $_POST['price'];


        $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products WHERE product_category=? AND product_price=?");
        $stmt1->bind_param('si',$category,$price);
        $stmt1->execute();
        $stmt1->bind_result($total_records);
        $stmt1->store_result();
        $stmt1->fetch();

         // set total no of products per page
    $total_records_per_page = 8;
    $offset = ($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1 ;
    $next_page = $page_no + 1;

    $adjacents = "2";
    $total_no_of_pages = ceil($total_records/ $total_records_per_page );

        // get all products

        $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=? LIMIT $offset,$total_records_per_page");
        $stmt2->bind_param("si",$category,$price);
        $stmt2->execute();
        $products = $stmt2->get_result();




    // $stmt = $conn->prepare("SELECT * FROM products WHERE product_category = ? AND product_price <= ?");

    // $stmt->bind_param("si",$category,$price);
   
    // $stmt->execute();
    
    // $products = $stmt->get_result();

}else{
    //determine page no
    if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
        // already entered page
        $page_no = $_GET['page_no'];
    }else{
        //if user entered shop
        $page_no = 1;
    }
    //return no. of products
    $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products");
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();

    // set total no of products per page
    $total_records_per_page = 8;
    $offset = ($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1 ;
    $next_page = $page_no + 1;

    $adjacents = "2";
    $total_no_of_pages = ceil($total_records/ $total_records_per_page );

    // get all products

    $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
    $stmt2->execute();
    $products = $stmt2->get_result();



}







?>



<?php include('layouts/header.php');?>

    <style>
        .product{
            /* width: 100%;
            height: auto; */
            box-sizing: border-box;
            object-fit: cover;
        }
        .page-link{
            
            color: #251b1b;
           
                }
       .pagination li:hover a{
            color:#fff ;
            background-color: coral;
       }         
    </style>


      <!--shop-->

       <section id="search" class="my-5 py-5 ms-2">
        <div class="container mt-5 py-5">
            <p>SEARCH PRODUCTS</p>
            <hr>
        </div>
        <form action="shop.php" method="POST">
            <div class="row mx-auto container" >
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>CATEGORY</p>
                    <div class="form-check">
                    <input class="form-check-input" value="shoes" type="radio" name="category" id="categroy_one" <?php if(isset($category) && $category =='shoes'){echo 'checked';}?>>

                    <label for="flexRadioDefault1" class="form-check-label">SHOES</label>
                    </div>

                    <div class="form-check">
                    <input class="form-check-input" value="coats" type="radio" name="category" id="categroy_two" <?php if(isset($category) && $category =='coats'){echo 'checked';}?>>

                    <label for="flexRadioDefault2" class="form-check-label">T-SHIRTS</label>
                    </div>

                    <div class="form-check">
                    <input class="form-check-input" value="figures" type="radio" name="category" id="categroy_two" <?php if(isset($category) && $category =='figures'){echo 'checked';}?>>

                    <label for="flexRadioDefault2" class="form-check-label">FIGURES</label>
                    </div>

                    <div class="form-check">
                    <input class="form-check-input" value="posters" type="radio" name="category" id="categroy_two" <?php if(isset($category) && $category =='posters'){echo 'checked';}?>>

                    <label for="flexRadioDefault2" class="form-check-label">POSTERS</label>
                    </div>
                   
                </div>
            </div>

            <div class="row mx-auto container mt-5">
                 <div class="col-lg-12 col-md-12 col-sm-12">
                     <p>Price</p>
                            <input type="range" class="form-range w-50" name="price" value="<?php if(isset($price)){echo $price;}else{ echo"2000" ;}?>"  min="1" max="5000" id="customRange2">
                            <div class="w-50">
                            <span style="float: left;">1</span>
                            <span style="float: right;">5000</span>
                            </div>
                            </div>
                            </div>
                            
                            <div class="form-group my-3 mx-3">
                            <input type="submit" name="search" value="Search" class="btn btn-primary">
                            </div>


        </form>
       </section>

      <section id="featured" class="my-5 py-5">
        <div class="container text-center mt-5 py-5">
          <h3>OUR PRODUCTS</h3>
          <hr class="mx-auto">
          <p>HERE YOU CAN CHECK OUR PRODUCTS</p>
        </div>
        <div class="row mx-auto container">

        <?php  while($row = $products->fetch_assoc()){  ?>


          <div onclick="window.location.href='<?php echo "single_product.php?product_id=".$row['product_id'];?>'" class="product text-center col-lg-3 col-md-4 col-sm-12">

            <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" alt="">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">&#8377 <?php echo $row['product_price']; ?> </h4>
             <a class="btn shop-buy-btn" href="<?php echo "single_product.php?product_id=".$row['product_id'];?>"> BUY NOW</a>
           
          </div>


            <?php }?>



        
<!--PAGINATION-->
        <!-- <nav aria-label="Page navigation example">
            <ul class="pagination mt-5">
                <?php  ?>
                <li class="page-item <?php if ($page_no<=1) {echo 'disabled';} ?>">
                     <a class="page-link" href="<?php if($page_no <=1){echo '#';}else{ echo"?page_no=".($page_no-1);} ?>">PREVIOUS</a>
                </li>



                <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>


                <?php if ($page_no>=3) { ?>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no;?>"><?php echo $page_no;?></a>
                </li>

                    <?php }?>

                <li class="page-item <?php if ($page_no >= $total_no_pages) {echo 'disabled';} ?>">
                    <a class="page-link" href="<?php if($page_no >= $total_no_pages){echo '#';}else{ echo"?page_no=".($page_no+1);} ?>">NEXT</a>
                </li>
            </ul>
        </nav> -->
<!-- PAGINATION -->
<nav aria-label="Page navigation example">
    <ul class="pagination mt-5">
        <li class="page-item <?php if ($page_no <= 1) echo 'disabled'; ?>">
            <a class="page-link" href="<?php if ($page_no <= 1) echo '#'; else echo "?page_no=" . ($page_no - 1); ?>">PREVIOUS</a>
        </li>

        <?php
        $half_total_pages = floor($total_no_of_pages / 2);
        $visible_pages = 5; // Set the number of visible pages

        for ($i = 1; $i <= $total_no_of_pages; $i++) :
            if (($i >= $page_no - $half_total_pages && $i <= $page_no + $half_total_pages) || $total_no_of_pages <= $visible_pages) :
        ?>
                <li class="page-item <?php if ($page_no == $i) echo 'active'; ?>">
                    <a class="page-link" href="?page_no=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
        <?php
            elseif ($i == 1 || $i == $total_no_of_pages) :
        ?>
                <li class="page-item">
                    <a class="page-link" href="?page_no=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
        <?php
            elseif (($i == $page_no - $half_total_pages - 1 || $i == $page_no + $half_total_pages + 1) && $total_no_of_pages > $visible_pages) :
        ?>
                <li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>
        <?php
            endif;
        endfor;
        ?>

        <li class="page-item <?php if ($page_no >= $total_no_of_pages) echo 'disabled'; ?>">
            <a class="page-link" href="<?php if ($page_no >= $total_no_of_pages) echo '#'; else echo "?page_no=" . ($page_no + 1); ?>">NEXT</a>
        </li>
    </ul>
</nav>

        </div>
      </section>

     









      <?php include('layouts/footer.php');?>