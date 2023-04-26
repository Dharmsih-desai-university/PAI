<?php
  session_start();
  include("classes/config.php");
  include("classes/login.php");
  include("classes/user.php");
  include("classes/image.php");
  include("classes/post.php");

 //  isset($_SESSION['mybook_userid'])
 $login = new Login();
 $user_data = $login->check_login($_SESSION['mybook_userid']);
 if($_SERVER['REQUEST_METHOD'] == "POST"){
    $error="";
    if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
        if($_FILES['file']['type']=="image/jpeg"){
            $allowed_size=1024*1024*7;//its mean three mega byte
            if($_FILES['file']['size']<$allowed_size){
            //every thing is fine
            $filename="uploads/".$_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'],$filename);
            $change="profile";
                //check for mode
                if(isset($_GET['change'])){
                    $change=$_GET['change'];
                }
            $image= new Image();
            if($change=="cover"){
                $image->crop_image($filename,$filename,1560,488);
            }
            else{
                $image->crop_image($filename,$filename,800,800);
            }
            if(file_exists($filename)){
                $userid=$user_data['userid'];
                
                if($change=="cover"){
                    $query="UPDATE users SET cover_image='$filename' WHERE userid='$userid' limit 1";
                }
                else{
                    $query="UPDATE users SET profile_image='$filename' WHERE userid='$userid' limit 1";
                }
               
                
                $DB= new Database();
                $check=$DB->save($query);
                header("location:profile.php");
                die;
            }
            }
            else{
                echo "<div style = 'text-align:center;font-size:12px;color:white;background:grey;'
            >";
            echo "the following errors occured: <br><br>";
            echo "only 3MB size of images are alowed";
            echo "</div>";
            }
        }
        else{
            echo "<div style = 'text-align:center;font-size:12px;color:white;background:grey;'
            >";
            echo "the following errors occured: <br><br>";
            echo "please add valid image";
            echo "</div>";
        }

    }
    else{
        echo "<div style = 'text-align:center;font-size:12px;color:white;background:grey;'
            >";
            echo "the following errors occured: <br><br>";
            echo "please add valid image";
            echo "</div>";
    }   

 }
?>  
<!DOCTYPE html>
<html>
    <head>
        <title>Change profile image | My Book</title>
    </head>
    <style type="text/css">
        #bar{
        height: 50px;
        background-color: #1877F2;
        color: white;
        font-size: 20px;
        font-family: tahoma;
        border-radius: 5px;
        /* text-align: center; */
        }
        #search_box{
            width: 400px;
            height: 25px;
            border-radius: 4px;
            border: none;
            padding: 4px;
            background-image: url("Project/search2.png");
            background-repeat: no-repeat;
            background-position: right;
        }
        #profile_pic{
            width: 150px;
            border: solid 2px white;
        }
        #profile_area{
            min-height: 400px;
            margin-top: 20px;
            color: #1877F2;
            text-align: center;
            font-size: 20px;

        }
        
        #post_button{
            float: right;
            width: 100px;
            background-color: #1877F2;
            border: none;
            color:white;
            padding: 4px;
            font-size: 14px;
            border-radius: 2px;
        }
        #post_bar{
            margin-top: 20px;
            background-color: white;
            padding: 10px;
        }
        #post{
            padding: 4px;
            font-size: 13px;
            display: flex;
            margin-bottom: 20px;
        }
    </style>
    <body style="background-color: #d0d8e4;">

        <!-- Top Bar -->

        <?php
            include("header.php");
        ?>

        <div style="display: flex;">

                <!-- Profile area -->
                <div style="min-height: 400px;flex: 2.5;padding: 20px;padding-right: 0px;">
                <!-- Posts area -->
            <form action="" method = "post" enctype = "multipart/form-data">
               
                  <div style="border:solid thin #aaa;padding:10px;background-color:white">
                  <input type="file" name = "file">
                     <input  id="post_button" type="submit" value="change">
                    <br>
                  </div>
                
            </form>
            </div>      
        </div>    
    </body>
</html>