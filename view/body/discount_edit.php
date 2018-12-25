<script>document.title = 'Update Discount'</script>
<div class="jumbotron">
	<div class="container">
		<div class="row">
		    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <form id="newForm" role="form" method="post" action="<?=Config::BASE_URL?>do_update_discount" autocomplete="off">
                        <h4>New Discount</h4>
                        <hr>
                        <label for="discount_name">Discount ID:</label>
                        <?php echo $discountInfo['discount_id'];?>
                        <input type="hidden" name="discount_id" id="discount_id" class="form-control input-lg" required
                                placeholder="New Discount Name" value="<?php echo $discountInfo['discount_id'];?>" tabindex="1">
                        <div class="form-group">
                            <label for="discount_name">Discount Name</label>
                            <input type="text" name="discount_name" id="discount_name" class="form-control input-lg" required
                                placeholder="New Discount Name" value="<?php echo $discountInfo['discount_name'];?>" tabindex="1">
                        </div>

                        <div class="form-group">
                            <label for="discount_type">Discount Type</label>
                            <div class="row">
                                <div class="col-4"><input type="radio" name="discount_type" value="1" tabindex="9"<?php if($discountInfo['discount_type']==1)echo "checked";?>> Shipping</div>
                                <div class="col-4"><input type="radio" name="discount_type" value="2" tabindex="10"<?php if($discountInfo['discount_type']==2)echo "checked";?>> Seasonings</div>
                                <div class="col-4"><input type="radio" name="discount_type" value="3" tabindex="10"<?php if($discountInfo['discount_type']==3)echo "checked";?>> Special Event</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="startDate">Starting Date</label>
                                    <input type="text" name="startDate" id="startDate" placeholder="YYYY-MM-DD" class="form-control input-lg"
                                    pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Enter a date in this format YYYY-MM-DD"
                                    tabindex="7" required value="<?php echo $discountInfo['startDate'];?>"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="endDate">End Date</label>
                                    <input type="text" name="endDate" id="endDate" placeholder="YYYY-MM-DD" class="form-control input-lg"
                                    pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Enter a date in this format YYYY-MM-DD"
                                    tabindex="7" required value="<?php echo $discountInfo['endDate'];?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label> <br>
                            <textarea id="description" name="description" form="newForm" style="width:100%;"><?php echo $discountInfo['description'];?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="get_free">Buy X Get 1 Free</label>
                                    <input type="text" name="get_free" id="get_free" class="form-control input-lg" 
                                    placeholder="X" value="<?php echo $discountInfo['get_free'];?>" tabindex="1">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="price_needed">Price Needed</label>
                                    <input type="text" name="price_needed" id="price_needed" class="form-control input-lg" 
                                    placeholder="Price Needed" value="<?php echo $discountInfo['price_needed'];?>" tabindex="1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="discount_percent">Discount Percent</label>
                                    <input type="text" name="discount_percent" id="discount_percent" class="form-control input-lg" 
                                    placeholder="Discount Percent" value="<?php echo $discountInfo['discount_percent'];?>" tabindex="1">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="discount_price">Discount Price</label>
                                    <input type="text" name="discount_price" id="discount_price" class="form-control input-lg" 
                                    placeholder="Discount Price" value="<?php echo $discountInfo['discount_price'];?>" tabindex="1">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="watches_content">Watches Content</label>
                            <input type="text" name="watches_content" id="watches_content" class="form-control input-lg" 
                            placeholder="Discount Price" value="<?php echo $discountInfo['watches_content'];?>" tabindex="1">
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
	</div>
</div>      