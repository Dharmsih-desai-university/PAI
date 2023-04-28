<?php
class Signup{
    private $error = "";
    private function create_userid(){
        $lenght = rand(4,19);
        $number = "";
        for($i = 1; $i < $lenght; $i++){
            $new_rand = rand(0,9);
            $number .= $new_rand;
        }
        return $number;

    }
    public function evaluate($data){
        foreach($data as $key => $value){
            if(empty($value)){ 
                $this->error .= $key ." " . "is empty!<br>";

            }
            if($key == "email"){
                if(!preg_match(" /([\w\-]+\@[\w\-]+\.[\w\-]+)/ ",$value)){
                    $this->error .= "invalid email address !<br>";
                }
            }
            if($key == "last_name"){
                if(is_numeric($value)){
                    $this->error .= "last name cant be a number<br>";
                }else if(strstr($value , " ")){
                    $this->error .= "last name cant  have spaces<br>";
                }
            }
            if($key == "first_name"){
                if(is_numeric($value)){
                    $this->error .= "first name cant be a number<br>";
                }else if(strstr($value , " ")){
                    $this->error .= "first name cant have spaces<br>";
                }
            }
        }
        if($this->error == ""){
            //no error 
            $this->create_user($data);

        }else{
            return $this->error;
        }
    }
    public function create_user($data){
        $userid = $this->create_userid();
        $last_name = ucfirst($data['last_name']);
        $first_name = ucfirst($data['first_name']);
        $email = $data['email'];
        $gender = $data['gender'];
        $pwd = $data['password1'];
        $url_address = strtolower($first_name) . "." .strtolower($last_name);
        $query = "insert into users (userid,first_name, last_name , gender,email ,password ,url_address) values
        ('$userid' , '$first_name' , '$last_name' , '$gender' , '$email' , '$pwd' , '$url_address' )";
        // echo $query;
        $DB = new Database();
        $DB->save($query);
    }
   
}
?>