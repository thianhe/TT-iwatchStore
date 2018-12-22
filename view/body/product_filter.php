<div class="col-lg-3 col-md-12 col-sm-12">
    <div class="wrap">
        <ul class="list">
            <li> <a href="products">All</a>
            </li>
            <li> <a href="#" class="dropdown">Brand</a>
                <ul class="item item1">
                    <?php
                    foreach($brandList as $brand){ 
                        echo '<li> <a class="filter item1_child" href="products?brand='.$brand['company_id'].'">'.$brand['brand'].'</a></li>';
                    }
                        
                    ?>
                </ul>
            </li>
            <li> <a href="#" class="dropdown">Price</a>
                <ul class="item item2">
                    <li> <a class="price" min="0" max="1500" href="#"><1500NT$</a> </li> 
                    <li> <a class="price" min="1500" max="3000" href="#"> 1500 -3000NT$ </a></li>
                    <li> <a class="price" min="3000" max="99999" href="#"> >3000NT$ </a></li>
                </ul>
            </li>
            <li><a href="#" class="dropdown">Operating System</a>
                <ul class="item item3">
                <?php
                    foreach($opList as $op){
                        echo '<li> <a class="filter item3_child" href="products?op='.$op['op_id'].'">'.$op['op_name'].'</a></li>';
                    }
                        
                    ?>
                </ul>
            </li>
        </ul>
    </div>
</div>
<script>CountChildHeigh()</script>