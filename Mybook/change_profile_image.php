<?php
  session_start();
  include("classes/config.php");
  include("classes/login.php");
  include("classes/user.php");
  include("classes/post.php");
 //  isset($_SESSION['mybook_userid'])
 $login = new Login();
 $user_data = $login->check_login($_SESSION['mybook_userid']);
 if($_SERVER['REQUEST_METHOD'] == "POST"){
      print_r($_POST);
      print_r($_FILES);
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
            width: 50px;
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

                <!-- Posts area -->
            <form action="" method = "post" enctype = "multipart/form-data">
                <div style="min-height: 400px;flex: 2.5;padding: 20px;padding-right: 0px;">
                   <input type="file" name = "file">
                     <input  id="post_button" type="submit" value="Post">
                    <br>
                </div>
            </form>
                
        </div>    
    </body>
</html>