<script>document.title = 'Shopping Cart'</script>
<div class="jumbotron">
    <div class="container-fluid">
      <?php
      if(count($_SESSION['shopping_cart']) == 0){
          echo '<div id="no_product" class=" text-center">
            <h3>No product in the shopping cart.</h3>
          </div>
          ';
      }else{
        if ($msg->hasMessages()) {
            $msg->display();
        }
        echo'<div class="row">
            <div class="col-12">Shopping cart:</div>
        </div>
        <div class="row">
            <div class="col-4">Product</div>
            <div class="col-2">Stock</div>
            <div class="col-2">Price</div>
            <div class="col-1">Quantity</div>
            <div class="col-2">Total Price</div>
            <div class="col-1"></div>
        </div>
        <form id="updateForm"action="'.Config::BASE_URL.'do_update_cart" method="post"></form>
        ';
        foreach($productList as $key=>  $product){
            $deleteFormName  = 'delete_'.$product['watch_id'];
            echo '<div class="row">
            <div class="col-4">'.$product['brand'].'-'.$product['watch_name'].'</div>
            <div class="col-2">'.$product['quantity'].'</div>
            <div class="col-2">'.$product['price'].'</div>
            <div class="col-1"><input class="quantity_input"type="text" name="'.$product['watch_id'].'" value="'.$product['SCquantity'].'" form="updateForm""></div>
            <div class="col-2">$'.$product['SCquantity']*$product['price'].'</div>
            <div class="col-1">
                <form id="'.$deleteFormName.'" action="'.Config::BASE_URL.'do_delete_cart" method="post">
                    <input type="hidden" name="watch_id" value="'.$product['watch_id'].'" form="'.$deleteFormName.'">
                    <button type="submit" name="submit" class="btn btn-info btn-edit-user btn-lg" form="'.$deleteFormName.'">Delete</button>
                </form>
            </div>
            </div>';
        }
        echo '<div class="row">
            <div class="col-3">
                <button type="submit" name="submit" class="btn btn-info btn-edit-user btn-lg" form="updateForm">Update Cart</button>
            </div>
            <div class="col-3">
                
            </div>
            <div class="col-3">
                <h3>Total Price:'.$totalPrice.'</h3>
            </div>
            <div class="col-3">
                ';
            if(isset($_SESSION['memberID'])) echo '<a href="#">Order Item</a>';
            else echo '<a href="login">Login to order</a>';
            echo'</div>
        </div>';
      }
      ?>
    </div>
</div>