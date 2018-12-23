<script>document.title = 'Shopping Cart'</script>
<div class="jumbotron">
    <div class="container-fluid">
      <?php
        if ($msg->hasMessages()) {
            $msg->display();
        }
        echo'<div class="row">
            <div class="col-12">Place Order:</div>
        </div>
        <div class="row">
            <div class="col-6">Product</div>
            <div class="col-2">Price</div>
            <div class="col-2">Quantity</div>
            <div class="col-2">Total Price</div>
        </div>
        ';
        foreach($productList as $key=>  $product){
            $deleteFormName  = 'delete_'.$product['watch_id'];
            echo '<div class="row">
            <div class="col-6">'.$product['brand'].'-'.$product['watch_name'].'</div>
            <div class="col-2">'.$product['price'].'</div>
            <div class="col-2">'.$product['SCquantity'].'</div>
            <div class="col-2">$'.$product['SCquantity']*$product['price'].'</div>
            </div>';
        }
        echo'<div class="row">

        </div>';
        echo '<div class="row">
            <div class="col-8"></div>
            <div class="col-4"><h3>Total Price:'.$totalPrice.'</h3></div>
            <form id="order_item_form" action="'.Config::BASE_URL.'do_order_item" method="post">
            <div class="col-12">Receiver</div>
            <div class="col-3">Name</div><div class="col-9"><input type="text" name="Rname" value="'.$memberInfo['last_name'].' '.$memberInfo['first_name'].'" form="order_item_form" required></div>
            <div class="col-3">Phone</div><div class="col-9"><input type="text" name="Rphone" value="'.$memberInfo['phone_number'].'" form="order_item_form" required></div>
            <div class="col-3">Email</div><div class="col-9"><input type="text" name="Remail" value="'.$memberInfo['email'].'" form="order_item_form" required></div>
            <div class="col-3">Address</div><div class="col-9"><input type="text" name="Raddress" value="'.$memberInfo['address'].'" form="order_item_form" required></div>
            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-info btn-edit-user btn-lg" form="order_item_form">Confirm Order</button>
            </div>
            </form>
        </div>';
      ?>
    </div>
</div>