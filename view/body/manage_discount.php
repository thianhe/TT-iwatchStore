<script>document.title = 'Manage Discount'</script>
<div class="jumbotron">
    <div class="container">
        <div class="container">
            <div class="row" id="go_back">
                <a href="discount_setting" class="btn">
                    <i class="fas fa-arrow-left"></i>
                    All discount
                </a>
            </div>
            <div class="row">
                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <div class="display-4">Order Info</div>
                        <?php
                        if($_SESSION['memberID'] <= 0):
                        ?>
                        <div class="edit-user-btn">
                            <form action="<?php echo Config::BASE_URL?>discount_edit" method="post">
                                <input type="hidden" name="discount_id" value="<?php echo $discountInfo['discount_id'];?>">
                                <button type="submit" name="submit" class="btn btn-info btn-edit-user btn-lg"><i class="fas fa-pen"></i>&nbsp;Edit</button>
                            </form>
                        </div>
                        <?php 
                        endif;
					//check for any errors
					if ($msg->hasMessages()) $msg->display();?>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>Discount ID</td>
                    <td>
                        <?php echo $discountInfo['discount_id'];?>
                    </td>
                </tr>
                <tr>
                    <td>Discount Name</td>
                    <td>
                    <?php echo $discountInfo['discount_name'];?>
                    </td>
                </tr>
                <tr>
                    <td>Discount Type</td>
                    <td>
                    <?php 
                        if($discountInfo['discount_type'] == 1) 
                            echo "Shipping"; 
                        else if($discountInfo['discount_type'] == 2) 
                            echo "Seasonings";
                            else if($discountInfo['discount_type'] == 3) 
                            echo "Special Event";
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Starting Date</td>
                    <td>
                        <?php echo $discountInfo['startDate'];?>
                    </td>
                </tr>
                <tr>
                    <td>End Date</td>
                    <td>
                        <?php echo $discountInfo['endDate'];?>
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <?php echo $discountInfo['description'];?>
                    </td>
                </tr>
                <tr>
                    <td>Buy X Get 1 Free</td>
                    <td>
                        <?php echo $discountInfo['get_free'];?>
                    </td>
                </tr>
                <tr>
                    <td>Price Needed</td>
                    <td>
                        <?php echo $discountInfo['price_needed'];?>
                    </td>
                </tr>
                <tr>
                    <td>Discount Percent</td>
                    <td>
                        <?php echo $discountInfo['discount_percent'];?>
                    </td>
                </tr>
                <tr>
                    <td>Discount Price</td>
                    <td>
                        <?php echo $discountInfo['discount_price'];?>
                    </td>
                </tr>
                <tr>
                    <td>Watches Content</td>
                    <td>
                        <?php echo $discountInfo['watches_content'];?>
                    </td>
                </tr>

            </tbody>
        </table>
        <?php 
        if($_SESSION['memberID'] <= 0)
        echo '
        <div class="row d-flex justify-content-end">
        <div class="col-2 delete_form">
            <form action="'.Config::BASE_URL.'do_delete_discount" method="post">
            <input type="hidden" id="discount_id" name="discount_id" value="'.$discountInfo['discount_id'].'">
            <input type="submit" name="submit" value="SURE">
            </form>
        <span class="mask"></span>
        <button class="f_delete text-center">Delete</button>
    </div>
        </div>';
        ?>
    </div>
</div>