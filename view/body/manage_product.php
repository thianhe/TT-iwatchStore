<script>document.title = 'Manage Product'</script>
<div class="jumbotron">
    <div class="container">
        <div class="row container">
            <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <div class="display-4">Watch Info</div>
                    <div class="edit-user-btn">
                        <form action="<?php echo Config::BASE_URL?>product_edit" method="post">
                            <input type="hidden" name="watch_id" value="<?php echo $watchInfo['watch_id'];?>">
                            <button type="submit" name="submit" class="btn btn-info btn-edit-user btn-lg"><i class="fas fa-pen"></i>&nbsp;Edit</button>
                        </form>
                    </div>
                    <?php 
					//check for any errors
					if ($msg->hasMessages()) $msg->display();?>
                </div>

            </div>
        </div>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>Watch ID</td>
                    <td>
                        <?php echo $watchInfo['watch_id'];?>
                    </td>
                </tr>
                <tr>
                    <td>Watch Name</td>
                    <td>
                        <?php echo $watchInfo['watch_name'];?>
                    </td>
                </tr>
                <tr>
                    <td>Brand</td>
                    <td>
                        <?php echo $watchInfo['brand'];?>
                    </td>
                </tr>
                <tr>
                    <td>Operating System</td>
                    <td>
                        <?php echo $watchInfo['op_name'];?>
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>
                        <?php echo $watchInfo['price'];?>
                    </td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td>
                        <?php echo $watchInfo['quantity'];?>
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <?php echo $watchInfo['description'];?>
                    </td>
                </tr>
                <tr>
                    <td>Product Picture</td>
                    <td>
                        <div class="container row watch_info">
                            <form role="form" method="post" action="<?=Config::BASE_URL?>do_add_img" autocomplete="off"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <input class="" type="file" name="images[]" multiple="multiple">
                                    <input type="hidden" name="watch_id" value="<?php echo $watchInfo['watch_id'];?>">
                                    <input type="submit" name="submit" value="Upload" class="btn btn-primary" tabindex="11">
                                </div>
                            </form>
                        </div>
                        <div class="border border-dark">
                        <?php 
                            echo '<div class="row image_list">';
                                foreach($images as $image){
                                    echo'<div class="col-4 border-pic">                                 
                                            <form action="'.Config::BASE_URL.'do_delete_img" method="post">                                     
                                                <input type="hidden" name="watch_id" value="'.$watchInfo['watch_id'].'">
                                                <button type="button submit" name="submit" class="close" aria-label="Close">
                                                    <i class="fas fa-times-circle text-danger"></i>
                                                </button>
                                                <input type="hidden" name="path" value="'.$dir.$image.'">
                                            </form>                                                                        
                                        <img src='.$dir.$image.'>
                                    </div>';
                                }
                            echo '</div>';?>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-10">
                <a href="product_setting" class="btn">
                    <i class="fas fa-arrow-left"></i>
                    Go Back To All Product
                </a>
            </div>
            <div class="col-2 delete_form">
                <form action="<?php echo Config::BASE_URL?>do_delete_product" method="post">
                    <input type="hidden" name="watch_id" value="<?php echo $watchInfo['watch_id'];?>">
                    <input type="hidden" name="img_dir" value="<?php echo $dir;?>">
                    <input type="submit" name="submit" value="SURE">
                </form>
                <span class="mask"></span>
                <button class="f_delete text-center" href="#">Delete</button>
            </div>
        </div>
    </div>
</div>