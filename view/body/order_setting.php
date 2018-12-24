<script>document.title = 'Order_setting'</script>
<div class="jumbotron">
    <div class="container text-center">
    <div class="container row ">
            <div id="all_filter" class="text-center col-2 filter selected" onclick="UserFilter(0)">ALL</div>
            <div id="staff_filter" class="text-center col-2 filter" onclick="UserFilter(1)">STAFF</div>
            <div id="customer_filter" class="text-center col-2 filter" onclick="UserFilter(2)">CUSTOMER</div>
            <div class="col-6">
                <form id="searchBarForm" role="form" method="POST" action="<?=Config::BASE_URL?>user_setting"
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
            <a href="'.Config::BASE_URL.'user_setting"><i class="fas fa-times-circle fa-2x text-danger"></i></a>
        </div>';
            
        }
        ?>

        <div class="container">
            <div class="row setting_list ">
                <div class="col-1">State</div>
                <div class="col-2">Account</div>
                <div class="col-2">Order id</div>
                <div class="col-2">receiver name</div>
                <div class="col-3">receiver email</div>
            </div>
            <?php
                echo'<div id="process_list">';
                foreach($processingOrder as $po){
                    echo '
                    <div class="row setting_list">
                        <div class="col-1">'.$po['state'].'</div>
                        <div class="col-2">'.$po['account'].'</div>
                        <div class="col-2">'.$po['orderList_id'].'</div>
                        <div class="col-2">'.$po['r_name'].'</div>
                        <div class="col-3">'.$po['r_email'].'</div>
                    </div>
                    ';
                }
                echo '</div>
                <div id="confirm_list">';
                foreach($confirmedOrder as $co){
                    echo '
                    <div class="row setting_list">
                        <div class="col-1">'.$co['state'].'</div>
                        <div class="col-2">'.$co['account'].'</div>
                        <div class="col-2">'.$co['orderList_id'].'</div>
                        <div class="col-2">'.$co['r_name'].'</div>
                        <div class="col-3">'.$co['r_email'].'</div>
                    </div>
                    ';
                }
                echo '</div>
                <div id="finish_list">';
                foreach($finishedOrder as $fo){
                    echo '
                    <div class="row setting_list">
                        <div class="col-1">'.$fo['state'].'</div>
                        <div class="col-2">'.$fo['account'].'</div>
                        <div class="col-2">'.$fo['orderList_id'].'</div>
                        <div class="col-2">'.$fo['r_name'].'</div>
                        <div class="col-3">'.$fo['r_email'].'</div>
                    </div>
                    ';
                }
                echo '</div>';
                
            ?>
        </div>
</div>
