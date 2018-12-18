<?php
class GoodsVeridator {
    private $error;
    /**
     * 可取出錯誤訊息字串陣列
     */
    public function getErrorArray(){
        return $this->error;
    }

    /**
     * 驗證帳號是否已存在於資料庫中
     */
    public function isBrandDuplicate($brandName){
        $result = Database::get()->execute('SELECT brand FROM COMPANY WHERE brand = "'.$brandName.'"');
        if(isset($result[0]['brand']) and !empty($result[0]['brand'])){
          $this->error[] = 'Brand provided is already in use.';
          return false;
        }
		return true;
    }
    public function isBrandUsed($brandName){
        $result = Database::get()->execute('SELECT count(*) as number FROM COMPANY C,WATCH W WHERE C.brand = "'.$brandName.'" and C.COMPANY_ID = W.BRAND_ID;');
        if(isset($result[0]['number']) and !empty($result[0]['number']) and $result[0]['number']!=0 ){
          $this->error[] = 'Brand '.$brandName.' is already in used, cannot delete.';
          return false;
        }
		return true;
    }
}
?>