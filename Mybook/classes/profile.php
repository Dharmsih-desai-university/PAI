<?php
class Profile{
    public function get_profile($id){
        // $id=addslashes($id);
        $DB=new Database();
        $query="SELECT * FROM users WHERE userid='$id' limit 1";
         return $DB->read($query);
    }
}

