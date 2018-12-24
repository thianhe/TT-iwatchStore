<script>document.title = 'Order_setting'</script>
<div class="jumbotron">
    <div class="container text-center">
        <div class="container row ">
            <div id="all_filter" class="text-center col-2 filter selected" onclick="OrderFilter(0)">ALL</div>
            <div id="process_filter" class="text-center col-2 filter" onclick="OrderFilter(1)">Processing</div>
            <div id="confirm_filter" class="text-center col-2 filter" onclick="OrderFilter(2)">Confirmed</div>
            <div id="finish_filter" class="text-center col-2 filter" onclick="OrderFilter(3)">Finished</div>
            <div class="col-4">
                <form id="searchBarForm" role="form" method="POST" action="<?=Config::BASE_URL?>order_setting"
                    autocomplete="off">
                    <div class="input-group stylish-input-group mb-1">
                        <input type="text" name="key" class="form-control" placeholder="Search User" required>
                        <span class="input-group-addon">
                            <input type="submit" name="submit" value="search" class="hidden" />
                        </span>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" name="submit" value="search" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if(isset($_POST['submit'])){
            
            echo' <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <h2>Your search result for "'.$key.'"</h2>
            </div>
            <a href="'.Config::BASE_URL.'order_setting"><i class="fas fa-times-circle fa-2x text-danger"></i></a>
        </div>';
            
        }
        ?>

        <div class="container">
            <div class="row setting_list ">
                <div class="col-1">State</div>
                <div class="col-2">Account</div>
                <div class="col-1">OrderId</div>
                <div class="col-2">receiver name</div>
                <div class="col-2">receiver email</div>
            </div>
            <?php
                echo'<div id="process_list">';
                foreach($processingOrder as $po){
                    echo '
                    <div class="row setting_list">
                    <div class="col-1">';
                    if($po['state'] == 'p') 
                        echo "Processing"; 
                    else if($po['state'] == 'c') 
                        echo "Confirmed";
                    else if($po['state'] == 'f') 
                        echo "Finished";
                    echo'</div>
                        <div class="col-2">'.$po['account'].'</div>
                        <div class="col-1">'.$po['orderList_id'].'</div>
                        <div class="col-2">'.$po['r_name'].'</div>
                        <div class="col-2">'.$po['r_email'].'</div>
                        <div class="col-1 user_detail_button">
                                <form action="'.Config::BASE_URL.'manage_order" method="post">
                                    <input type="hidden" name="orderList_id" value="'.$po['orderList_id'].'">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="col-3 delete_form">
                                <form action="'.Config::BASE_URL.'do_delete_order" method="post">
                                    <input type="hidden" name="orderList_id" value="'.$po['orderList_id'].'">
                                    <input type="submit" name="submit" value="SURE">
                                </form>
                                <span class="mask"></span>
                                <button class="f_delete text-center">Delete</button>
                            </div>
                    </div>
                    ';
                }
                echo '</div>
                <div id="confirm_list">';
                foreach($confirmedOrder as $co){
                    echo '
                    <div class="row setting_list">
                        <div class="col-1">';
                            if($co['state'] == 'p') 
                                echo "Processing"; 
                            else if($co['state'] == 'c') 
                                echo "Confirmed";
                            else if($co['state'] == 'f') 
                                echo "Finished";
                            echo'</div>
                        <div class="col-2">'.$co['account'].'</div>
                        <div class="col-1">'.$co['orderList_id'].'</div>
                        <div class="col-2">'.$co['r_name'].'</div>
                        <div class="col-2">'.$co['r_email'].'</div>
                        <div class="col-1 user_detail_button">
                                <form action="'.Config::BASE_URL.'manage_order" method="post">
                                    <input type="hidden" name="orderList_id" value="'.$co['orderList_id'].'">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="col-3 delete_form">
                                <form action="'.Config::BASE_URL.'do_delete_order" method="post">
                                    <input type="hidden" name="orderList_id" value="'.$co['orderList_id'].'">
                                    <input type="submit" name="submit" value="SURE">
                                </form>
                                <span class="mask"></span>
                                <button class="f_delete text-center">Delete</button>
                            </div>
                    </div>
                    ';
                }
                echo '</div>
                <div id="finish_list">';
                foreach($finishedOrder as $fo){
                    echo '
                    <div class="row setting_list">
                    <div class="col-1">';
                    if($fo['state'] == 'p') 
                        echo "Processing"; 
                    else if($fo['state'] == 'c') 
                        echo "Confirmed";
                    else if($fo['state'] == 'f') 
                        echo "Finished";
                    echo'</div>
                        <div class="col-2">'.$fo['account'].'</div>
                        <div class="col-1">'.$fo['orderList_id'].'</div>
                        <div class="col-2">'.$fo['r_name'].'</div>
                        <div class="col-2">'.$fo['r_email'].'</div>
                        <div class="col-1 user_detail_button">
                                <form action="'.Config::BASE_URL.'manage_order" method="post">
                                    <input type="hidden" name="orderList_id" value="'.$fo['orderList_id'].'">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="col-3 delete_form">
                                <form action="'.Config::BASE_URL.'do_delete_order" method="post">
                                    <input type="hidden" name="orderList_id" value="'.$fo['orderList_id'].'">
                                    <input type="submit" name="submit" value="SURE">
                                </form>
                                <span class="mask"></span>
                                <button class="f_delete text-center">Delete</button>
                            </div>
                    </div>
                    ';
                }
                echo '</div>';
                
            ?>
        </div> 
    </div>
</div>
