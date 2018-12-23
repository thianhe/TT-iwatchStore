<script>
    document.title = 'Product Info'
</script>
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

                    <div class="flexslider" style="width:350px; margin-left:100px;">
                        <ul class="slides">
                            <?php
                            foreach($images as $image){
                                echo'<li><img src='.$dir.$image.' alt="" width="350" height="250"></li>';
                            }
                            ?>
                        </ul>
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
                    <span class="content_font">
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