<script>
    document.title = 'Products'
</script>
<div class="jumbotron">
    <div class="row">
        <?php include('view/body/product_filter.php')?>
        <div class="col-lg-9">
            <div class="container">
                <div class="row" id="">
                    <?php
                        foreach($productList as $p){
                            $dir = './image/product/'.$p['watch_id'].'/';
                            $imgPath = './image/no_img.png';
                            if (file_exists('./image/product/'.$p['watch_id']))
                            {   
                                $images= scandir($dir);
                                if(isset($images[2]))  $imgPath = $dir.$images[2];
                            }             
                            unset($image);
                            echo '
                            <div class="card col-lg-4 col-md-6 col-sm-12" style="display: block;">
                            <a href="product_info?id='.$p['watch_id'].'">
                                <div class="card_pic">
                                    <div class="product_view text-center">
                                        <img src="'.$imgPath.'" />
                                    </div>
                                </div>
                                <div class="card_body ">
                                    <h5 class="card_title font-weight-bold">'.$p['brand'].' - '.$p['watch_name'].'</h5>
                                    <div class="card_price d-flex ">Price<br>NT$'.$p['price'].'</div>
                                    
                                </div>
                            </a>
                        </div>';
                        }
                     ?>
                </div>
            </div>
        </div>
    </div>
</div>