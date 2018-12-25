<script>document.title = 'Place Order'</script>
<div class="jumbotron">
    <div class="container">
        <?php
        if ($msg->hasMessages()) {
            $msg->display();
        }
        echo 
            '<div class="row col-12">
                <h1>Place Order</h1>
            </div>
                      <table class="table" id="cart_table">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                            </tr>
                        </thead>';

                        foreach ($productList as $key => $product) {
                            $deleteFormName = 'delete_' . $product['watch_id'];
                            echo '<tbody>
                                <tr>
                                    <td>' . $product['brand'] . '-' . $product['watch_name'] . '</td>
                                    <td>' . $product['price'] . '</td>
                                    <td>' . $product['SCquantity'] . '</td>
                                    <td>NT$'.$product['SCquantity']*$product['price'].'</td>
                                </tr>
                                </tbody>';}
                    echo '</table>';
                    echo'<div class="row">
                                <div class="col d-flex justify-content-end">
                                    <h3>Total Price: NT$' . $oTotalPrice . '<br>Discounted Price: NT$' . $totalPrice . '<br>(Incude Shipping:NT$ '.$shipping.')</h3>
                                </div>
                         </div>';
        
        ?>
        <div class="jumbotron" id="receiver">
            <?php
                echo '<div class="row d-flex justify-content-center">
                    <form id="order_item_form" action="'.Config::BASE_URL.'do_order_item" method="post">
                    <h2 class="text-center">Receiver</h2>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Name &nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <input type="text" name="Rname" value="'.$memberInfo['last_name'].' '.$memberInfo['first_name'].'" form="order_item_form" required>
                        
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Phone &nbsp;&nbsp;</span>
                        </div>
                        <input type="text" name="Rphone" value="'.$memberInfo['phone_number'].'" form="order_item_form" required>
                        
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Email &nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <input type="text" name="Remail" value="'.$memberInfo['email'].'" form="order_item_form" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Address</span>
                        </div>
                        <input type="text" name="Raddress" value="'.$memberInfo['address'].'" form="order_item_form" required>
                        
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-info btn-edit-user btn-block" form="order_item_form">Confirm Order</button>
                
                    </form>
                </div>';
            ?>
        </div>
    </div>
</div>
 