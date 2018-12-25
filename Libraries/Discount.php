<?php
class Discount{
    public function __construct(){
    }

    public function seasonings($totalPrice){
        $min = $totalPrice;
        $today = date("Y-m-d");
        $result = Database::get()->execute('SELECT * from discount where discount_type = 2 and ("'.$today.'" BETWEEN  startDate and endDate)');
        foreach($result as $r){
            $newMin = $totalPrice;
            if($r['discount_price'] != 0)$newMin = $totalPrice - $r['discount_price'];
            if($r['discount_percent'] != 0) $newMin =$totalPrice - $totalPrice * ($r['discount_percent']*0.01);
            if($newMin <$min)
                $min = $newMin;
        }
        return $min;
    }
    public function shipping($totalPrice){
        $max = 0;
        $today = date("Y-m-d");
        $result = Database::get()->execute('SELECT * from discount where discount_type = 1 and ("'.$today.'" BETWEEN  startDate and endDate) and price_needed <= '.$totalPrice.'');
        foreach($result as $r){
            if($r['discount_price'] > $max)
                $max = $r['discount_price'];
        }
        return $max;
    }
    public function special($number, $watch){
        $min = $number * $watch['price'];
        $today = date("Y-m-d");
        $result = Database::get()->execute('SELECT * from discount where discount_type = 3 and ("'.$today.'" BETWEEN  startDate and endDate) and (watches_content like "% '.$watch['watch_id'].' %" or watches_content like "% '.$watch['watch_id'].'" or watches_content like "'.$watch['watch_id'].' %" or watches_content = "'.$watch['watch_id'].'")');
        foreach($result as $r){
            echo $watch['watch_id'];
            $newMin = $number * $watch['price'];
            if($r['discount_price'] != 0)$newMin = $number*($watch['price']-$r['discount_price']);
            if($r['discount_percent'] != 0) $newMin =$number*($watch['price'] - $watch['price'] * ($r['discount_percent']*0.01));
            if($r['get_free'] != 0){
                if($number>$r['get_free']){
                    $newNumber = $number - floor($number/($r['get_free']+1));
                    $newMin = $newNumber * $watch['price'];
                }
            }
            if($newMin <$min)
                $min = $newMin;
        }
        return $min;
    }
}
?>