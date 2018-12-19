<script>document.title = 'Product Setting'</script>
<div class="jumbotron">
    <div class="container">
        <div class="row setting_button_row">
            <div class="col-12">
            <?php if ($msg->hasMessages()) $msg->display();?>
                <a class="noTextDec setting_button" href="#hidden_form" onclick="ShowAddForm()">
                    Create User
                </a>
            </div>
        </div>
        <div id="hidden_form"class="row hide">
        <a href="#hidden_form" class="cancel_button" onclick="HideAddForm()">X</a>
            <div class="col-xs-11 col-sm-10 col-md-8">
                <form role="form" method="post" action="<?=Config::BASE_URL?>do_register" autocomplete="off">
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