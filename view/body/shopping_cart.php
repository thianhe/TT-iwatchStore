<script> document.title = 'Shopping Cart'</script>
<div class="jumbotron">
    <div class="container">
        <?php
        if (count($_SESSION['shopping_cart']) == 0) {
            echo '<div id="no_product" class=" text-center">
                        <h3>No product in the shopping cart.</h3>
                    </div>';
        } else {
            if ($msg->hasMessages()) {
                $msg->display();
            }

        echo 
            '<div class="row col-12">
                <h1>Shopping Cart</h1>
            </div>       
                <table class="table" id="cart_table">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <form id="updateForm"action="' . Config::BASE_URL . 'do_update_cart" method="post"></form>';
                        foreach ($productList as $key => $product) {
                            $deleteFormName = 'delete_' . $product['watch_id'];
                            echo '<tbody>
                                <tr>
                                    <td><a href="product_info?id='.$product['watch_id'].'">' . $product['brand'] . '-' . $product['watch_name'] . '</a></td>
                                    <td>' . $product['quantity'] . '</td>
                                    <td>' . $product['price'] . '</td>
                                    <td><input class="quantity_input" type="text" name="' . $product['watch_id'] . '" value="' . $product['SCquantity'] . '" form="updateForm""></td>
                                    <td>NT$' . $product['SCquantity'] * $product['price'] . '</td>
                                    <td>
                                        <form class="d-flex justify-content-center" id="' . $deleteFormName . '" action="' . Config::BASE_URL . 'do_delete_cart" method="post">
                                            <input type="hidden" name="watch_id" value="' . $product['watch_id'] . '" form="' . $deleteFormName . '">
                                            <button type="submit" name="submit" class="btn btn-info btn-edit-user btn-lg" form="' . $deleteFormName . '">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>                       
                        ';}
        echo '</table>
        <div class="row">                                   
            <div class="col d-flex justify-content-end space">
                <button type="submit" name="submit" class="btn btn-info btn-edit-user btn-lg la" form="updateForm">Update Cart</button>
                    <h3>Total Price:<br>NT$' . $totalPrice . '</h3>
            </div>
        </div>
        <div class="row">                            
                <div class="col d-flex justify-content-end order_btn">';
                if (isset($_SESSION['memberID'])) {
                    echo '<a href="order_item" class="btn btn-lg btn_la"><i class="fas fa-hand-holding-usd"></i>Order Item</a>';
                } else {
                    echo '<a href="login" class="btn btn-lg btn_la"><i class="fas fa-sign-in-alt"></i>Login to Order</a>';
                }
                  
        echo '</div></div>';}
        ?>
    </div>
</div>
