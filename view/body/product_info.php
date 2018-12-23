<script>
    document.title = 'Product Info'
</script>
<div class="jumbotron" id="product_info">
    <div class="container">
        <div class="row" id="go_back">
            <a href="products" class="btn">
                <i class="fas fa-arrow-left"></i>
                All Product
            </a>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12">
            <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators">
                <?php 
                $i = 0;
                for( $a=2; $a < count($files); $a++):
                ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php echo $i == 0 ? 'active': ''; ?>"></li>
                <?php 
                $i++;
                endfor;
                ?>
            </ol>
            <div id="home_watch_carousel"class="carousel-inner">
                <?php 
                $i = 0;
                for( $a=2; $a < count($files); $a++):
                ?>
                <div class="carousel-item text-center <?php echo $i == 0 ? 'active':'' ;?>">
                    <img src="<?php echo $dir.$files[$a];?>" alt="">
                </div>
                <?php 
                $i++;
                endfor;
                ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
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