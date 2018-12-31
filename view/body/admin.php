<script>document.title = 'Admin Page'</script>
<div class="jumbotron">
    <div class="container text-center">
        <div class="row d-flex justify-content-center">
            <?php if(isset($_SESSION['memberID']) and $_SESSION['memberID'] ==0):?>
            <div class="col-md-4 col-sm-6">
                <a href="user_setting">
                    <i class="fas fa-users-cog fa-5x"></i>
                    <div class="control_link">User</div>
                </a>
            </div>
            <?php endif;?>
            <div class="col-md-4 col-sm-6">
                <a href="brand_setting">
                    <i class="fas fa-building fa-5x"></i>
                    <div class="control_link">Brand</div>
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="product_setting">
                    <i class="fas fa-clock fa-5x"></i>
                    <div class="control_link">Product</div>
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="order_setting">
                    <i class="fas fa-money-check-alt fa-5x"></i>
                    <div class="control_link">Order</div>
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="discount_setting">
                    <i class="fas fa-hand-holding-usd fa-5x"></i>
                    <div class="control_link">Discount</div>
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
            <a href="reprot">
                    <i class="fas fa-clipboard-list fa-5x"></i>
                    <div class="control_link">Report</div>
                </a>
            </div>
        </div>
    </div>
</div>
