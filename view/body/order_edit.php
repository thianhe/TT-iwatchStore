<script>document.title = 'Edit Order'</script>
<div class="jumbotron">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <div class="display-4">Edit Order</div>
                        <?php 
					//check for any errors
					if ($msg->hasMessages()) $msg->display();?>
                    </div>
                </div>
            </div>
        </div>
        <form id="editOrderForm"role="form" method="post" action="<?=Config::BASE_URL?>do_order_edit" autocomplete="off">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>State</td>
                    <td>
                    <input type="radio" name="state" value="p"tabindex="2" required <?php if($orderInfo['state'] == 'p') echo "checked";?>>Processing &nbsp;
                    <input type="radio" name="state" value="c"tabindex="2" required <?php if($orderInfo['state'] == 'c') echo "checked";?>>Confirmed &nbsp;
                    <input type="radio" name="state" value="f"tabindex="2" required <?php if($orderInfo['state'] == 'f') echo "checked";?>>Finished &nbsp;
                    </td>
                </tr>
                <tr>
                    <td>Account</td>
                    <td>
                        <?php echo $orderInfo['account'];?>
                    </td>
                </tr>
                <tr>
                    <td>Order ID</td>
                    <td>
                        <?php echo $orderInfo['orderList_id'];?>
                        <input type="hidden" name="orderList_id" value="<?php echo $orderInfo['orderList_id'];?>"tabindex="2" required ;?>
                    </td>

                </tr>
                <tr>
                    <td>Receiver Name</td>
                    <td>
                    <input type="text" name="Receiver_Name" value="<?php echo $orderInfo['r_name'];?>"tabindex="2" required ;?>
                    </td>
                </tr>
                <tr>
                    <td>Receiver email</td>
                    <td>
                        <input type="text" name="Receiver_Email" value="<?php echo $orderInfo['r_email'];?>"tabindex="2" required ;?>
                    </td>
                </tr>
                <tr>
                    <td>Receiver Phone</td>
                    <td>
                        <input type="text" name="Receiver_Phone" value="<?php echo $orderInfo['r_phone'];?>"tabindex="2" required ;?>
                    </td>
                </tr>
                <tr>
                    <td>Receiver Address</td>
                    <td>
                        <input type="text" name="Receiver_Address" value="<?php echo $orderInfo['r_address'];?>"tabindex="2" required ;?>
                    </td>
                </tr>
                <tr>
                    <td>Total Price</td>
                    <td>
                        <input type="text" name="Cost" value="<?php echo $orderInfo['cost'];?>"tabindex="2" required ;?>
                    </td>
                </tr>
                <tr>
                    <td>Date & Time</td>
                    <td>
                        <?php echo $orderInfo['date_time'];?>
                    </td>
                </tr>

            </tbody>
        </table>
        <table class="table table-striped order_item">
            <tbody>
                <?php
                for( $a=0; $a < count($orderItem); $a++):
                    $dir = './image/product/'.$orderItem[$a]['watch_id'].'/';
                    if (file_exists($dir)) 
                        $files= scandir($dir);
                ?>
                <tr>
                    <td class="image_td text-center"><?php echo $a+1;?>
                        <img src="<?php echo $dir.$files[2]?>" alt="">
                    </td>
                    <td>Product Name: <?php echo $orderItem[$a]['watch_name'];?><br><br>
                        Quantity: <input type="text" name="order_item<?php echo $orderItem[$a]['watch_id'];?>" value="<?php echo $orderItem[$a]['quantity'];?>"tabindex="2" required ;?><br><br>
                        <a target="_blank" href="product_info?id=<?php echo  $orderItem[$a]['watch_id']?>">Watch Info</a>
                    </td>
                </tr>
                <?php
                endfor;
                ?>
            </tbody>
        </table> 
        <div class="row text-center">
			<div class="col-xs-4 col-md-4"><input type="submit" name="submit" value="Save" class="btn btn-primary btn-block btn-lg" tabindex="11"></div>
		</div>
        </form>
    </div>
</div>