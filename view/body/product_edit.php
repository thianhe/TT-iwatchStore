<script>document.title = 'Update Product'</script>
<div class="jumbotron">
	<div class="container">
		<div class="row">
		    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<form id="editWatchForm"role="form" method="post" action="<?=Config::BASE_URL?>do_product_edit" autocomplete="off">
					<h2>Edit Product</h2>
					<hr>
					<?php 
					//check for any errors
					if ($msg->hasMessages()) $msg->display();?>
					<div class="form-group">
						<label for="watch_id">Watch ID: </label>
						<?php echo $watchInfo['watch_id'] ?>
                        <input type="hidden" name="watch_id" value="<?php echo $watchInfo['watch_id']?>">
					</div>
					<div class="form-group">
						<label for="watch_name">Watch Name: </label>
						<?php echo $watchInfo['watch_name'] ?>
					</div>
                    <div class="form-group">
						<label for="brand">Brand: </label>
						<?php echo $watchInfo['brand'] ?>
					</div>
                    <div class="form-group">
						<label for="op">Operating System:</label>
						<?php echo $watchInfo['op_name'] ?>
					</div>
					<div class="form-group">
						<label for="price">Price*</label>
						<input type="text" name="price" id="price" placeholder="Price" class="form-control input-lg" required value="<?php echo $watchInfo['price'];?>"tabindex="7"/>
					</div>
                    <div class="form-group">
						<label for="quantity">Quantity*</label>
						<input type="text" name="quantity" id="quantity" placeholder="Quantity" class="form-control input-lg" required value="<?php echo $watchInfo['quantity'];?>"tabindex="7"/>
					</div>
					<div class="form-group">
					<div class="form-group">
                        <label for="description">Description</label> <br>
                        <textarea id="description" name="description" form="editWatchForm"><?php echo $watchInfo['description'];?></textarea>
                    </div>
					<p>* required</p>
					<div class="row">
						<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Save" class="btn btn-primary btn-block btn-lg" tabindex="11"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>      