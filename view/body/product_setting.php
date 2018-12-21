<script>document.title = 'Product Setting'</script>
<div class="jumbotron">
    <div class="container">
        <div class="row container">
            <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <div class="display-4">Edit Products</div>
                    <?php if ($msg->hasMessages()) $msg->display();?>
                </div>
                <button type="button" class=" btn btn-info btn-edit-user " href="#hidden_form" onclick="ShowAddForm()">
                    <i class="fas fa-plus"></i>&nbsp;Add Watch
                </button>
            </div>
        </div>
        <div id="hidden_form" class="row hide">
            <a href="#hidden_form" class="cancel_button" onclick="HideAddForm()">X</a>
            <div class="col-xs-11 col-sm-10 col-md-8">
                <form id="newWatchForm" role="form" method="post" action="<?=Config::BASE_URL?>do_add_new_watch"
                    autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="watch_name">Watch Name*</label>
                        <input type="text" name="watch_name" id="watch_name" class="form-control input-lg" required
                            placeholder="Watch Name" value="" tabindex="1">
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand*</label>
                        <div class="row">
                            <?php
                                foreach($brandList as $b){
                                    echo '<div class="col-4"><input type="radio" name="brand_id" value="'.$b['company_id'].'"tabindex="2" required>'.$b['brand'].'</div>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="op">Operating System*</label>
                        <div class="row">
                            <?php
                                foreach($opList as $o){
                                    echo '<div class="col-4"><input type="radio" name="op_id" value="'.$o['op_id'].'"tabindex="3" required>'.$o['op_name'].'</div>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="price">Price*</label>
                                <input type="text" name="price" id="price" class="form-control input-lg" required
                                    placeholder="Price" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="quantity">Quantity*</label>
                                <input type="text" name="quantity" id="quantity" class="form-control input-lg" required
                                    placeholder="Quantity" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label> <br>
                        <textarea id="description" name="description" form="newWatchForm"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="images">Images</label> <br>
                        <input type="file" name="images[]" multiple="multiple">
                    </div>
                    <p>* required</p>
                    <div class="row">
                        <div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block btn-lg"
                                tabindex="11"></div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row justify-content-end">
            <div class>
                <form id="searchBarForm" role="form" method="POST" action="<?=Config::BASE_URL?>product_setting"
                    autocomplete="off">
                    <div class="input-group stylish-input-group mb-1 ">
                        <input type="text" name="key" class="form-control" placeholder="Search product" required>
                        <span class="input-group-addon">
                            <input type="submit" name="submit" value="search" class="hidden" />
                        </span>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" name="submit" value="search" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if(isset($_POST['submit'])){
            echo' <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <h2>Your search result for "'.$key.'"</h2>
            </div>
            <a href="'.Config::BASE_URL.'product_setting"><i class="fas fa-times-circle fa-2x text-danger"></i></a>
        </div>';
        }
        ?>
        <div class="row setting_list ">
            <div class="col-2">Watches</div>
            <div class="col-2">Brand</div>
            <div class="col-2">Price</div>
            <div class="col-2">Quantity</div>
        </div>
        <?php
                echo'<div id="product_list">';
                foreach($product as $p){
                    echo '<div class="row setting_list">
                            <div class="col-2">'.$p['watch_name'].'</div>
                            <div class="col-2">'.$p['brand'].'</div>
                            <div class="col-2">'.$p['price'].'</div>
                            <div class="col-2">'.$p['quantity'].'</div>
                            <div class="col-2 user_detail_button">
                                <form action="'.Config::BASE_URL.'manage_product" method="post">
                                    <input type="hidden" name="watch_id" value="'.$p['watch_id'].'">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="col-2 delete_form">
                                <form action="'.Config::BASE_URL.'do_delete_product" method="post">
                                    <input type="hidden" name="watch_id" value="'.$p['watch_id'].'">
                                    <input type="submit" name="submit" value="SURE">
                                </form>
                                <span class="mask"></span>
                                <a class="f_delete text-center" href="#" >Delete</a>
                            </div>
                        </div>';
                }
                echo '</div>';
            ?>

    </div>
</div>