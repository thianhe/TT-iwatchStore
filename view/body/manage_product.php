<script>document.title = 'Manage User'</script>

<div class="jumbotron">
    <div class="container">
        <div class="row watch_info">
            
            <div class="col-12">
                Watch Info
            </div>
            <?php 
			//check for any errors
			if ($msg->hasMessages()) $msg->display();?>
            <div class="col-2">Watch ID</div>
            <div class="col-4"><?php echo $watchInfo['watch_id'];?></div>

            <div class="col-2">Watch Name</div>
            <div class="col-4"><?php echo $watchInfo['watch_name'];?></div>

            <div class="col-2">Brand</div>
            <div class="col-4"><?php echo $watchInfo['brand'];?></div>

            <div class="col-2">Operating System</div>
            <div class="col-4"><?php echo $watchInfo['op_name'];?></div>

            <div class="col-2">Price</div>
            <div class="col-4"><?php echo $watchInfo['price'];?></div>

            <div class="col-2">Quantity</div>
            <div class="col-4"><?php echo $watchInfo['quantity'];?></div>

            <div class="col-2">Description</div>
            <div class="col-10"><?php echo $watchInfo['description'];?></div>

            <div class="row">
                <form role="form" method="post" action="<?=Config::BASE_URL?>do_add_img"
                    autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="images">Add Images</label> <br>
                        <input type="file" name="images[]" multiple="multiple">
                        <input type="hidden" name="watch_id" value="<?php echo $watchInfo['watch_id'];?>">
                    <input type="submit" name="submit" value="Add Images" class="btn"tabindex="11">
                    </div>
                </form>
                
            </div>

            <?php 
            echo '<div class="row image_list">';
                foreach($images as $image){
                    echo'<div class="col-2 ">
                        <div class="delete_form">
                            <form action="'.Config::BASE_URL.'do_delete_img" method="post">
                                <input type="hidden" name="watch_id" value="'.$watchInfo['watch_id'].'">
                                <input type="hidden" name="path" value="'.$dir.$image.'">
                                <input type="submit" name="submit" value="SURE">
                            </form>
                            <span class="mask"></span>
                            <a class="f_delete text-center" href="#" >Delete</a>
                        </div>

                        <img src='.$dir.$image.'>
                    </div>';
                }
            echo '</div>';
            ?>
            
        </div>
        <div class="row">
            <div class="col-2 edit_form">
                <form action="<?php echo Config::BASE_URL?>product_edit" method="post">
                    <input type="hidden" name="watch_id" value="<?php echo $watchInfo['watch_id'];?>">
                    <input type="submit" name="submit" value="Edit">
                </form>
            </div>
            <div class="col-2 delete_form">
                <form action="<?php echo Config::BASE_URL?>do_delete_watch" method="post">
                    <input type="hidden" name="watch_id" value="<?php echo $watchInfo['watch_id'];?>">
                    <input type="submit" name="submit" value="SURE">
                </form>
                <span class="mask"></span>
                <a class="f_delete text-center" href="#" >Delete</a>
            </div>
            <div class="col-2 text-center">
                <a href="product_setting">
                    <i class="fas fa-clock"></i>
                    All Product
                </a>
            </div>
        </div>
        
    </div>
</div>