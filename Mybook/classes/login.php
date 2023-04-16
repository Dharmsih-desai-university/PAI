<?php
class Login{
    private $error = "";
    public function evaluate($data){
        $email = addslashes($data['email']);
        $pwd = addslashes($data['password']);
        $query = "select * from users where email = '$email' limit 1 ";
      
        $DB = new Database();
        $result = $DB->read($query);
       if($result){ 
           $row = $result[0];
           if($pwd == $row['password']){
         //create session data;
            $_SESSION['mybook_userid'] = $row['userid'];
        
           }else{
              $this->error .= "wrong password<br>";
           }
            }else{
                $this->error .= "No such email wsa found <br>";
            }
            return $this->error;
    }
    public function cheak_login($id){
        $query = "select userid from users where userid = '$id' limit 1 ";
      
        $DB = new Database();
        $result = $DB->read($query);
        if($result){
            return true;
        }
        return false;
    }
}
?>