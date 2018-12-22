<script>document.title = 'Manage Product'</script>
<div class="jumbotron">
    <div class="container">
        <div class="container">
            <div class="row" id="go_back">
                <a href="product_setting" class="btn">
                    <i class="fas fa-arrow-left"></i>
                    Go Back To All Product
                </a>
            </div>
            <div class="row">
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
                    <div class="edit-user-btn">
                        <button type="button" class="btn btn-info btn-edit-user btn-lg" href="#hidden_form" onclick="ShowAddForm()">
                            <i class="fas fa-plus"></i>&nbsp;Add Storage
                        </button>
                    </div>

                    <?php 
					//check for any errors
					if ($msg->hasMessages()) $msg->display();?>
                </div>
            </div>
        </div>
        <div id="hidden_form" class="row hide">
            <a href="#hidden_form" class="cancel_button" onclick="HideAddForm()">X</a>
            <div class="col-xs-11 col-sm-10 col-md-8">
                <form id="newWatchForm" role="form" method="post" action="<?=Config::BASE_URL?>do_add_storage"
                    autocomplete="off">
                    <div class="form-group">
                        <label for="quantity">Quantity*</label>
                        <input type="text" name="quantity" id="quantity" class="form-control input-lg" required
                            placeholder="Quantity" value="" tabindex="1">
                    </div>
                    <div class="form-group">
                        <label for="cost">Cost*</label>
                        <input type="text" name="cost" id="cost" class="form-control input-lg" required
                            placeholder="Cost" value="" tabindex="1">
                    </div>
                    <input type="hidden" name="watch_id" value="<?php echo $watchInfo['watch_id'];?>">
                    <p>* required</p>
                    <div class="row">
                        <div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block btn-lg"
                                tabindex="11"></div>
                    </div>
                </form>
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
        <div class="row d-flex justify-content-end">           
            <div class="col-2 delete_form">
                <form action="<?php echo Config::BASE_URL?>do_delete_product" method="post">
                    <input type="hidden" name="watch_id" value="<?php echo $watchInfo['watch_id'];?>">
                    <input type="hidden" name="img_dir" value="<?php echo $dir;?>">
                    <input type="submit" name="submit" value="SURE">
                </form>
                <span class="mask"></span>
                <button class="f_delete text-center " href="#">Delete</button>
            </div>
        </div>
    </div>
</div>