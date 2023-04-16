<?php

class post
{
    private $error = "";

    public function create_post($userid,$data);
    {
        if(!empty($data['post']))
        {
            $post = addslashes($data['post']);
            $postid =$this->create_postid();
            
            $query = "insert into posts (userid,postid,post) values ('$userid','$postid','$post')";

            $DB = new Database();
            $DB->save($query);


        }
        else
        {
            $this->error .="please type something to post!<br>";
        }

        return $this->error;
    }

    private function create_postid()
    {
        $length = rand(4,19);
        $number ="";
        for($i=0;$i< $length;$i++)
        {
            #code...
            $new_rand = rand(0,9);
            $number = $number .$new_rand;
        }
        return $number;
    }
}