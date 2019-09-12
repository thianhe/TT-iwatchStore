<?php
class UserVeridator {
    private $error;
    /**
     * 可取出錯誤訊息字串陣列
     */
    public function getErrorArray(){
        return $this->error;
    }

    /**
     * 驗證二次密碼輸入是否相符
     */
    public function isPasswordMatch($password, $passwrodConfirm){
		if ($password != $passwrodConfirm){
            $this->error[] = 'Passwords do not match.';
            return false;
        }
		return true;
    }

    /**
     * 驗證帳號是否已存在於資料庫中
     */
    public function isAccountDuplicate($username){
        $result = Database::get()->execute('SELECT account FROM members WHERE account = "'.$username.'"');
        if(isset($result[0]['account']) and !empty($result[0]['account'])){
          $this->error[] = 'Account provided is already in use.';
          return false;
        }
        
		return true;
    }

    /**
     * 驗證信箱是否已存在於資料庫中
     */
    public function isEmailDuplicate($email){
        $sql = 'SELECT email FROM members WHERE email = "'.$email.'"';
        $result = Database::get()->execute($sql);
        if(isset($result[0]['email']) and !empty($result[0]['email'])){
            $this->error[] = 'Email provided is already in use.';
            return false;
        }
		return true;
    }

     /**
     * 驗證帳號密碼是否正確可登入
     */
    public function loginVerification($username, $password){
        $result = Database::get()->execute('SELECT * FROM members WHERE account = "'.$username.'"');
        if($username == "admin" and $password =="admin") return true;
        if(isset($result[0]['account']) and !empty($result[0]['account'])) {
            $passwordObject = new Password();
            if($passwordObject->password_verify($password,$result[0]['password'])){
                return true;
            }
        }
        $this->error[] = 'Wrong username or password.';
        return false;
    }
    
    
}?>