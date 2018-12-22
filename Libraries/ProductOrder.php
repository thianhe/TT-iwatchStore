<?php
class ProductOrder{
    public $member_id = 0;
    public $product_id = 5;
    public $quantity = 0;
    public function __construct($m_id,$p_id,$q){
        $this->member_id = $m_id;
        $this->product_id = $p_id;
        $this->quantity = $q;
    }
}
?>