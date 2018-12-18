<script>document.title = 'Brand Setting'</script>
<div class="jumbotron">
    <div class="container">
        <div class="row setting_button_row">
            <div class="col-12">
            <?php if ($msg->hasMessages()) $msg->display();?>
                <a class="noTextDec setting_button" href="#hidden_form" onclick="ShowAddForm()">
                    Add New Brand
                </a>
            </div>
        </div>
        <div id="hidden_form"class="row hide">
        <a href="#hidden_form" class="cancel_button" onclick="HideAddForm()">X</a>
            <div class="col-xs-11 col-sm-10 col-md-8">
			    <form role="form" method="post" action="<?=Config::BASE_URL?>do_addbrand" autocomplete="off">    
                        <h4>New Brand</h4>
				    <hr>
				    <div class="form-group">
				    	<input type="text" name="brandName" id="brandName" class="form-control input-lg" required placeholder="New Brand Name" value="" tabindex="1">
			    	</div>
			    	<hr>
			    	<div class="row">
			    		<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
			    	</div>
		    	</form>
            </div>
        </div>

        <div class="row setting_list ">
            <div class="col-5">Brand Name</div>
            <div class="col-3">Contain Product</div>
            <div class="col-2"></div>
            <div class="col-2"></div>
            </div>
            <?php
                foreach($result as $r){
                    
                    echo '<div class="row setting_list ">
                        <div class="col-5">'.$r['brandName'].'</div>
                        <div class="col-3">'.$r['productsNumber'].'</div>
                        <div class="col-2"></div>
                        <div class="col-2 delete_form">
                            <form action="'.Config::BASE_URL.'do_deletebrand" method="post">
                                <input type="hidden" id="brandName" name="brandName" value="'.$r['brandName'].'">
                                <input type="submit" name="submit" value="SURE">
                            </form>
                            <span class="mask"></span>
                            <a class="f_delete text-center" href="#" >Delete</a>
                        </div>
                        </div>';
                }
            ?>
        
    </div>
</div>