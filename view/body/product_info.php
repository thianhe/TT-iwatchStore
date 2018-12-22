<script>document.title = 'Product Info'</script>
<div class="jumbotron">
    <div class="container">
    <div class="row">
        <?php include('view/body/product_filter.php')?>
        <div class="col-lg-9">
            <div class="row">
            <?php 
            echo '<div class="row image_list">';
                foreach($images as $image){
                    echo'<div class="col-2 ">
                        <img src='.$dir.$image.'>
                    </div>';
                }
            echo '</div>';
            ?>

            <div class="col-2">Watch Name</div>
            <div class="col-4"><?php echo $watchInfo['watch_name'];?></div>

            <div class="col-2">Brand</div>
            <div class="col-4"><?php echo $watchInfo['brand'];?></div>

            <div class="col-2">OS</div>
            <div class="col-4"><?php echo $watchInfo['op_name'];?></div>

            <div class="col-2">Price</div>
            <div class="col-4"><?php echo $watchInfo['price'];?></div>

            <div class="col-2">Quantity</div>
            <div class="col-4"><?php echo $watchInfo['quantity'];?></div>
            
            </div>
            <div class="row">
                <div class="col-2">Description</div>
                <div class="col-10"><?php echo $watchInfo['description'];?></div>
            </div>
            <div class="row">
                <?php
                if($inCart){
                    echo '<form action="'.Config::BASE_URL.'do_remove_cart" method="post">
                        <input type="hidden" name="watch_id" value="'.$watchInfo['watch_id'].'">
                        <button type="submit" name="submit" class="btn btn-info btn-edit-user btn-lg">Remove from Cart</button>
                    </form>';
                }
                else{
                    echo '<form action="'.Config::BASE_URL.'do_add_cart" method="post">
                        <input type="hidden" name="watch_id" value="'.$watchInfo['watch_id'].'">
                        <button type="submit" name="submit" class="btn btn-info btn-edit-user btn-lg">Add to Cart</button>
                    </form>';
                }
                ?>
                
            </div>
        </div>
        
    </div>
    </div>
</div>
        
