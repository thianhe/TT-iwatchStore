<script>document.title = 'Products'</script>
<div class="jumbotron">
    <div class="container">
    <div class="row">
        <div class="col-3" style='background-color : green'>
        
        </div>
        <div class="col-9">
            <div class="row">
                <?php
                foreach($productList as $p){
                    $dir = './image/product/'.$p['watch_id'].'/';
                    $imgPath = './image/no_img.png';
                    if (file_exists('./image/product/'.$p['watch_id']))
                    {   
                        $images= scandir($dir);
                        if(isset($images[2]))  $imgPath = $dir.$images[2];
                    } 
                    echo '
                    <div class="col-4">
                        <a href="product_info?id='.$p['watch_id'].'">
                            <div class="product_view text-center">
                                <img src="'.$imgPath.'"/>
                                <p>'.$p['watch_name'].'</p>
                            </div>
                        </a>
                    </div>';
                    
                    unset($image);
                }
                ?>
            </div>
        </div>
    </div>
    </div>
</div>