<script>document.title = 'Discount Setting'</script>
<div class="jumbotron">
    <div class="container">
        <div class="container">
            <div class="row" id="go_back">
                <a href="<?php echo $profilePage;?>" class="btn">
                    <i class="fas fa-arrow-left"></i>
                    Profile
                </a>
            </div>
            <div class="row">
                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <div class="display-4">Edit Discount</div>
                    </div>
                    <button type="button" class=" btn btn-info btn-edit-user " href="#hidden_form" onclick="ShowAddForm()">
                        <i class="fas fa-plus"></i>&nbsp;Add discount
                    </button>
                    <?php if ($msg->hasMessages()) $msg->display();?>
                </div>
            </div>
        </div>

        <div class="container">
            <div id="hidden_form" class="row hide">
                <a href="#hidden_form" class="cancel_button" onclick="HideAddForm()">X</a>
                <div class="col-xs-11 col-sm-10 col-md-8">
                    <form id="newForm" role="form" method="post" action="<?=Config::BASE_URL?>do_add_discount" autocomplete="off">
                        <h4>New Discount</h4>
                        <hr>

                        <div class="form-group">
                            <label for="discount_name">Discount Name</label>
                            <input type="text" name="discount_name" id="discount_name" class="form-control input-lg" required
                                placeholder="New Discount Name" value="" tabindex="1">
                        </div>

                        <div class="form-group">
                            <label for="discount_type">Discount Type</label>
                            <div class="row">
                                <div class="col-4"><input type="radio" name="discount_type" value="1" tabindex="9"> Shipping</div>
                                <div class="col-4"><input type="radio" name="discount_type" value="2" tabindex="10"> Seasonings</div>
                                <div class="col-4"><input type="radio" name="discount_type" value="3" tabindex="10"> Special Event</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="startDate">Starting Date</label>
                                    <input type="text" name="startDate" id="startDate" placeholder="YYYY-MM-DD" class="form-control input-lg"
                                    pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Enter a date in this format YYYY-MM-DD"
                                    tabindex="7" required/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="endDate">End Date</label>
                                    <input type="text" name="endDate" id="endDate" placeholder="YYYY-MM-DD" class="form-control input-lg"
                                    pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Enter a date in this format YYYY-MM-DD"
                                    tabindex="7" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label> <br>
                            <textarea id="description" name="description" form="newForm" style="width:100%;"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="get_free">Buy X Get 1 Free</label>
                                    <input type="text" name="get_free" id="get_free" class="form-control input-lg" 
                                    placeholder="X" value="" tabindex="1">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="price_needed">Price Needed</label>
                                    <input type="text" name="price_needed" id="price_needed" class="form-control input-lg" 
                                    placeholder="Price Needed" value="" tabindex="1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="discount_percent">Discount Percent</label>
                                    <input type="text" name="discount_percent" id="discount_percent" class="form-control input-lg" 
                                    placeholder="Discount Percent" value="" tabindex="1">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="discount_price">Discount Price</label>
                                    <input type="text" name="discount_price" id="discount_price" class="form-control input-lg" 
                                    placeholder="Discount Price" value="" tabindex="1">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="watches_content">Watches Content</label>
                            <input type="text" name="watches_content" id="watches_content" class="form-control input-lg" 
                            placeholder="Discount Price" value="" tabindex="1">
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block btn-lg" tabindex="5">
                            </div>
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
                            <button class="f_delete text-center">Delete</button>
                        </div>
                        </div>';
                }
            ?>
        </div>
    </div>
</div>