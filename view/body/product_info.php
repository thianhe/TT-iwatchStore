<script>
    document.title = 'Product Info'
</script>

<div class="jumbotron" id="product_info">
    <div class="container">
        <div class="container row" id="go_back">
            <a href="products" class="btn">
                <i class="fas fa-arrow-left"></i>
                All Product
            </a>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12">
            <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators" >
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
            <div class="review_jumbotron jumbotron">
                <h3>Review</h3>
                <hr>
                <div id="comment_list">
                <?php foreach($commentList as $c):?>
                <span class="title_font"><?php echo $c['first_name'].' '.$c['last_name'];?></span><br>
                <span class="title_font">Rate:<?php echo $c['rate'];?>/5 </span><br>
                <span class="content_font">
                    <?php echo $c['comment'];?>
                </span><br>
                <span class="title_font"><?php echo $c['comment_datetime'];?> </span>
                <hr>
                <?php endforeach;?>
                </div>
                
            </div>
            <?php if(isset($_SESSION['memberID'])):?>
            <div class="review_jumbotron jumbotron">
                <form id="comment_form" action="do_add_comment" role="form" method="post">
                    <h2>Rate</h2>
                    <div class="row">
                    <div class="col-2"><input type="radio" name='rate' value='1' required>1</div>
                    <div class="col-2"><input type="radio" name='rate' value='2'>2</div>
                    <div class="col-2"><input type="radio" name='rate' value='3'>3</div>
                    <div class="col-2"><input type="radio" name='rate' value='4'>4</div>
                    <div class="col-2"><input type="radio" name='rate' value='5'>5</div>
                    </div>
                    <h2>Comment</h2>
                    <textarea name="comment" id="comment" cols="50" form='comment_form'required ></textarea>
                    <input type="hidden" name='watch_id' value='<?php echo $watchInfo['watch_id']?>'>
                    <input type="submit" name="submit" value="Submit" class="btn  btn-lg">
                </form>
            </div>
            <?php endif;?>
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
                            if($inTrace){
                                echo '<form action="'.Config::BASE_URL.'do_delete_trace" method="post">
                                    <input type="hidden" name="watch_id" value="'.$watchInfo['watch_id'].'">
                                    <input type="hidden" name="member_id" value="'.$_SESSION['memberID'].'">
                                    <input type="hidden" name="account" value="'.$_SESSION['account'].'">
                                    <button type="submit" name="submit" class="btn btn_la btn-lg btn-block">Remove from Trace List</button>
                                </form>';
                            }
                            else{
                                echo '<form action="'.Config::BASE_URL.'do_add_trace" method="post">
                                    <input type="hidden" name="watch_id" value="'.$watchInfo['watch_id'].'">
                                    <button type="submit" name="submit" class="btn btn_la btn-lg btn-block"><i class="fas fa-calendar-plus"></i>&nbsp;Add to Trace List</button>
                                </form>';
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>