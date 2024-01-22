<?php require_once("../resource/config.php");?>
<?php include(RESOURCE . DS . "front_header.php");?>
<?php include(RESOURCE . DS . "config.php");?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

        <!----CAtegories here --->
           <?php include(RESOURCE . DS . "front_side_nav.php");?>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                   <!--- Carousel --->
                   <?php include(RESOURCE . DS . "slider.php");?>
                    </div>

                </div>

                <div class="row">
                    <?php

                    $query="SELECT * from products";

                    $products = $conn -> query($query);

                    ?>
                    <?php if(!$product = "") : ?>
                    <?php while($row = $products -> fetch_assoc()): ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo $row['product_image'];?>" alt="">
                            <div class="caption">
                                <h4 class="pull-right"><?php echo $row['product_price'];?></h4>
                                <h4><a href="#"><?php echo $row['product_title']?></a>
                                </h4>
                                <p><?php echo $row['product_description']?></p>
                            </div>
                            <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
                            <div class="ratings">
                                <p class="pull-right">18 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endwhile ; ?>
                    <?php else : ?>
                        <p> Produkt nebyl přidán </p>
                    <?php endif ; ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Like this template?</a>
                        </h4>
                        <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
                        <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
                    </div>

                </div> <!------ Row ends HERe ----->

            </div>

        </div>

    </div>
    <!-- /.container -->

    <?php include(RESOURCE . DS . "front_footer.php");?>