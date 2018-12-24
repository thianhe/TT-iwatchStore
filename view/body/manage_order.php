<script>document.title = 'Manage Order'</script>
<div class="jumbotron">
    <div class="container">
        <div class="container">
            <div class="row" id="go_back">
                <a href="order_setting" class="btn">
                    <i class="fas fa-arrow-left"></i>
                    All order
                </a>
            </div>
            <div class="row">
                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <div class="display-4">Order Info</div>
                        <div class="edit-user-btn">
                            <form action="<?php echo Config::BASE_URL?>order_edit" method="post">
                                <input type="hidden" name="orderList_id" value="<?php echo $orderInfo['orderList_id'];?>">
                                <button type="submit" name="submit" class="btn btn-info btn-edit-user btn-lg"><i class="fas fa-pen"></i>&nbsp;Edit</button>
                            </form>
                        </div>
                        <?php 
					//check for any errors
					if ($msg->hasMessages()) $msg->display();?>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>State</td>
                    <td>
                        <?php 
                        if($orderInfo['state'] == 'p') 
                            echo "Processing"; 
                        else if($orderInfo['state'] == 'c') 
                            echo "Confirmed";
                            else if($orderInfo['state'] == 'f') 
                            echo "Finished";
                    ?>
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
                    </td>

                </tr>
                <tr>
                    <td>Receiver Name</td>
                    <td>
                        <?php echo $orderInfo['r_name'];?>
                    </td>
                </tr>
                <tr>
                    <td>Receiver email</td>
                    <td>
                        <?php echo $orderInfo['r_email'];?>
                    </td>
                </tr>
                <tr>
                    <td>Receiver Phone</td>
                    <td>
                        <?php echo $orderInfo['r_phone'];?>
                    </td>
                </tr>
                <tr>
                    <td>Receiver Address</td>
                    <td>
                        <?php echo $orderInfo['r_address'];?>
                    </td>
                </tr>
                <tr>
                    <td>Total Price</td>
                    <td>
                        <?php echo $orderInfo['cost'];?>
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
                        Quantity: <?php echo $orderItem[$a]['quantity'];?><br><br>
                        <a target="_blank" href="product_info?id=<?php echo  $orderItem[$a]['watch_id']?>">Watch Info</a>
                    </td>
                </tr>
                <?php
                endfor;
                ?>
            </tbody>
        </table> 
        <?php 
        echo '
        <div class="row d-flex justify-content-end">
            <div class="col-2 delete_form ">
                <form action="'.Config::BASE_URL.'do_delete_order" method="post">
                    <input type="hidden" name="orderList_id" value="'.$orderInfo['orderList_id'].'">
                    <input type="submit" name="submit" value="SURE">
                </form>
                <span class="mask"></span>
                <button class="f_delete text-center">Delete</button>
            </div>
        </div>';
        ?>
    </div>
</div>