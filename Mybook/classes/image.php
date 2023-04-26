<?php

class Image{
    public function crop_image($original_file_name,$cropped_file_name,$max_width,$max_height){
        if(file_exists($original_file_name)){
            $original_image=imagecreatefromjpeg($original_file_name);
            $original_width=imagesx($original_image);
            $original_height=imagesy($original_image);
            if($original_height>$original_width){
                //make width equal to max width;
                $ration=$max_width/$original_width;
                $new_width=$max_width;
                $new_height=$original_height*$ration;
            }
            else{
                $ration=$max_height/$original_height;
                $new_height=$max_height;
                $new_width=$original_width*$ration;
            }
        }
        //adjust incase max width and heigh are different
        if($max_width!=$max_height){
            if($max_height>$max_width){
                if($max_height>$new_height){
                    $adjustment=($max_height/$new_height);
                }
                else{
                    $adjustment=($max_height/$new_height);
                }
                $new_width=$new_width*$adjustment;
                $new_height=$new_height*$adjustment;
            }
            else{
                if($max_width>$new_width){
                    $adjustment=($max_width/$new_width);
                }
                else{
                    $adjustment=($max_width/$new_width);
                }
                $new_width=$new_width*$adjustment;
                $new_height=$new_height*$adjustment;
            }
        }

        $new_image=imagecreatetruecolor($new_width,$new_height);

        imagecopyresampled($new_image,$original_image,0,0,0,0,$new_width,$new_height,$original_width,$original_height);
        imagedestroy($original_image);
        if($max_width!=$max_height){
            if($max_width>$max_height){
                $diff=($new_height-$max_height);
                if($diff<0)
                $diff=$diff*-1;
                $y=round($diff/2);
                $x=0;
            }else{
                $diff=($new_width-$max_height);
                if($diff<0)
                $diff=$diff*-1;
                $x=($diff/2);
                $y=0;
            }
        }
        else{

        }
        if($new_height>$new_width){
            $diff=($new_height-$new_width);
            $y=($diff/2);
            $x=0;
        }else{
            $diff=($new_width-$new_height);
            $x=($diff/2);
            $y=0;
        }
        $new_cropped_image=imagecreatetruecolor($max_width,$max_height);
        imagecopyresampled($new_cropped_image,$new_image,0,0,$x,$y,$max_width,$max_height,$max_width,$max_height);
        imagedestroy($new_image);
        imagejpeg($new_image,$cropped_file_name,90);
        imagedestroy($new_cropped_image);
    }
}