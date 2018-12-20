<script>document.title = 'Product Setting'</script>
<div class="jumbotron">
    <div class="container">
        <div class="row setting_button_row">
            <div class="col-12">
            <?php if ($msg->hasMessages()) $msg->display();?>
                <a class="noTextDec setting_button" href="#hidden_form" onclick="ShowAddForm()">
                    Add new watch
                </a>
            </div>
        </div>
        <div id="hidden_form"class="row hide">
        <a href="#hidden_form" class="cancel_button" onclick="HideAddForm()">X</a>
            <div class="col-xs-11 col-sm-10 col-md-8">
                <form id="newWatchForm" role="form" method="post" action="<?=Config::BASE_URL?>do_add_new_watch" autocomplete="off"enctype="multipart/form-data">
                    <div class="form-group">
						<label for="watch_name">Watch Name*</label>
						<input type="text" name="watch_name" id="watch_name" class="form-control input-lg" required placeholder="Watch Name" value="" tabindex="1">
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
						        <input type="text" name="price" id="price" class="form-control input-lg" required placeholder="Price" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
					    	    <label for="quantity">Quantity*</label>
						        <input type="text" name="quantity" id="quantity" class="form-control input-lg" required placeholder="Quantity" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label> <br>
                        <textarea id="description"name="description" form="newWatchForm"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="images">Images</label> <br>
                        <input type="file" name="images[]" multiple="multiple">
                    </div>
                    <p>* required</p>
					<div class="row">
						<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block btn-lg" tabindex="11"></div>
					</div>
				</form>
            </div>
        </div>

        <div class="row ">
            <div class="col-6">
                <form id="searchBarForm"role="form" method="POST" action="<?=Config::BASE_URL?>product_setting" autocomplete="off">
                    <div class="search-bar text-center">
                        <input type="text"name="key" placeholder="..." required/>
                        <div class="search-icon"></div>
                        <input type="submit"name="submit" value="search" class="hidden"/>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if(isset($_POST['submit'])){
            echo'<div class="row">
                    <div class="col-10"><h3>Searched: '.$key.'</h3></div>
                    <div class="col-2"><a href="'.Config::BASE_URL.'product_setting">Show all</a></div>
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
                                <form action="'.Config::BASE_URL.'manage_watch" method="post">
                                    <input type="hidden" name="watch_id" value="'.$p['watch_id'].'">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="col-2 delete_form">
                                <form action="'.Config::BASE_URL.'do_delete_watch" method="post">
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