<script>document.title = 'Product Info'</script>
<div class="jumbotron">
    <div class="container">
    <div class="row">
        <div class="col-3" style='background-color : green'>
        
        </div>
        <div class="col-9">
        <div class="row">
            <?php 
            echo '<div class="row image_list">';
                foreach($images as $image){
                    echo'<div class="col-2 ">
                        <img src='.$dir.$image.'>
                    </div>';
                }
            echo '</div>';
            ?>

            <div class="col-2">Watch Name</div>
            <div class="col-4"><?php echo $watchInfo['watch_name'];?></div>

            <div class="col-2">Brand</div>
            <div class="col-4"><?php echo $watchInfo['brand'];?></div>

            <div class="col-2">OS</div>
            <div class="col-4"><?php echo $watchInfo['op_name'];?></div>

            <div class="col-2">Price</div>
            <div class="col-4"><?php echo $watchInfo['price'];?></div>

            <div class="col-2">Quantity</div>
            <div class="col-4"><?php echo $watchInfo['quantity'];?></div>
            
        </div>
        <div class="row">
                <div class="col-2">Description</div>
                <div class="col-10"><?php echo $watchInfo['description'];?></div>
            </div>
        </div>
    </div>
    </div>
</div>
        
