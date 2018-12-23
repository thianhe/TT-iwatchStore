<script>
    document.title = 'Product Info'
</script>
<?php
    $files = scandir("image/product/0/");

?>
<div class="jumbotron" id="product_info">
    <div class="container">
        <div class="container">
            <div class="row" id="go_back">
                <a href="products" class="btn">
                    <i class="fas fa-arrow-left"></i>
                    All Product
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12">

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                    <?php 
                        $i = 0;
                        for( $a=2; $a < count($files); $a++):
                    ?>
                        <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $i == 0 ? 'active': ''; ?>"></li>
                        <?php 
                        $i++;
                        endfor;
                    ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                    <?php 
                        $i = 0;
                        for( $a=2; $a < count($files); $a++):
                    ?>
                    
                        <div class="item <?php echo $i == 0 ? 'active':'';?>">
                            <img src="image/product/1/<?php echo $files[$a];?>" alt="">
                        </div>
                    <?php 
                        $i++;
                        endfor;
                    ?>

                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


                <div id="review_jumbotron" class="jumbotron">

                    <h3>Review</h3>
                    <hr>
                    <span class="title_font">TONY<br></span>
                    <span class="content_font">
                        FUCKING TRASH
                    </span>
                    <hr>

                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12">
                <div id="product_jumbotron" class="jumbotron">
                    <h3 class="jumbotron_title">
                        <?php echo $watchInfo['brand'],' - ',$watchInfo['watch_name'];?>
                    </h3>
                    <hr>
                    <span class="title_font">Brand<br></span>
                    <span class="content_font">
                        <?php echo $watchInfo['brand'];?>
                    </span>
                    <hr>
                    <span class="title_font">OS<br></span>
                    <span class="content_font">
                        <?php echo $watchInfo['op_name'];?>
                    </span>
                    <hr>
                    <span class="title_font">Price<br></span>
                    <span class="content_font">NT$
                        <?php echo $watchInfo['price'];?>
                    </span>
                    <hr>
                    <span class="title_font">Quantity<br></span>
                    <span class="content_font">
                        <?php echo $watchInfo['quantity'];?>
                    </span>
                    <hr>
                    <span class="title_font">Description<br></span>
                    <span class="content_font">
                        <?php echo $watchInfo['description'];?>
                    </span>
                    <div class="">
                        <?php
                            if($inCart){
                                echo '<form action="'.Config::BASE_URL.'do_delete_cart" method="post">
                                    <input type="hidden" name="watch_id" value="'.$watchInfo['watch_id'].'">
                                    <button type="submit" name="submit" class="btn btn_la btn-lg btn-block">Remove from Cart</button>
                                </form>';
                            }
                            else{
                                echo '<form action="'.Config::BASE_URL.'do_add_cart" method="post">
                                    <input type="hidden" name="watch_id" value="'.$watchInfo['watch_id'].'">
                                    <button type="submit" name="submit" class="btn btn_la btn-lg btn-block"><i class="fas fa-cart-plus"></i>&nbsp;Add to Cart</button>
                                </form>';
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>