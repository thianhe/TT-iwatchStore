<script>
    document.title = 'Products'
</script>
<div class="jumbotron">
    <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12">
            <div class="wrap">
                <ul class="list dropdown">
                    <li> <a href="#">Brand</a>
                        <ul class="item item1">
                            <li> <a class="filter" href="#">Apple</a></li>
                            <li> <a class="filter" href="#">Samsung</a></li>
                            <li> <a class="filter" href="#">Fitbit</a></li>
                            <li> <a class="filter" href="#">Verizon</a></li>
                            <li> <a class="filter" href="#">Fossil</a></li>
                            <li> <a class="filter" href="#">Techcomm</a></li>
                            <li> <a class="filter" href="#">APGtek</a></li>
                        </ul>
                    </li>
                    <li> <a href="#" class="dropdown">Price</a>
                        <ul class="item item2">
                            <li> <a class="price" min="0" max="1500" href="#">
                                    <1500NT$</a> </li> <li> <a class="price" min="1500" max="3000" href="#"> 1500 -
                                            3000NT$ </a></li>
                            <li> <a class="price" min="3000" max="99999" href="#"> >3000NT$ </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown">Operating System</a>
                        <ul class="item item3">
                            <li> <a class="filter" href="#">Apple iOS</a></li>
                            <li> <a class="filter" href="#">Android</a></li>
                            <li> <a class="filter" href="#">Wear OS</a></li>
                            <li> <a class="filter" href="#">watchOS</a></li>
                            <li> <a class="filter" href="#">Tizen</a></li>
                            <li> <a class="filter" href="#">Other</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
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
                        }
                     ?>
                    <div class="card col-lg-4 col-md-6 col-sm-12" style="display: block;">
                        <a href="product_info?id='.$p['watch_id'].'">
                            <div class="card_pic">
                                <div class="product_view text-center">
                                    <img src="<?php echo$imgPath;?>" />
                                    <p>
                                        <?php echo $p['watch_name']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="card_body">
                                <h5 class="card_title"></h5>
                                <div class="box float-right"></div>
                                <div class="box float-right"></div>
                            </div>
                        </a>
                    </div>
                    <div class="card col-lg-4 col-md-6 col-sm-12" style="display: block;">
                        <a href="product_info?id='.$p['watch_id'].'">
                            <div class="card_pic">
                                <div class="product_view text-center">
                                    <img src="<?php echo$imgPath;?>" />
                                    <p>
                                        <?php echo $p['watch_name']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="card_body">
                                <h5 class="card_title"></h5>
                                <div class="box float-right"></div>
                                <div class="box float-right"></div>
                            </div>
                        </a>
                    </div>
                    <div class="card col-lg-4 col-md-6 col-sm-12" style="display: block;">
                        <a href="product_info?id='.$p['watch_id'].'">
                            <div class="card_pic">
                                <div class="product_view text-center">
                                    <img src="<?php echo$imgPath;?>" />
                                    <p>
                                        <?php echo $p['watch_name']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="card_body">
                                <h5 class="card_title"></h5>
                                <div class="box float-right"></div>
                                <div class="box float-right"></div>
                            </div>
                        </a>
                    </div>
                    <div class="card col-lg-4 col-md-6 col-sm-12" style="display: block;">
                        <a href="product_info?id='.$p['watch_id'].'">
                            <div class="card_pic">
                                <div class="product_view text-center">
                                    <img src="<?php echo$imgPath;?>" />
                                    <p>
                                        <?php echo $p['watch_name']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="card_body">
                                <h5 class="card_title"></h5>
                                <div class="box float-right"></div>
                                <div class="box float-right"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>