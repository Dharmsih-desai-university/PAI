<?php
  include("classes/autoload.php");
  $image_class=new Image();
 //  isset($_SESSION['mybook_userid'])
 $login = new Login();
 $user_data = $login->check_login($_SESSION['mybook_userid']);
 
 $ERROR="";
 if(isset($_GET['id'])){

    $Post = new Post();
     $ROW = $Post ->get_one_post($_GET['id']);
    if(!$ROW){
        $ERROR = "No such post was found!";
    }else{
        if($ROW != $_SESSION['mybook_userid']){
            $ERROR ="Access denied! you can not delete this file!";  
        }
    }

    }else{

        $ERROR = "No such post was found!";
    
    }
 }else{
    $ERROR = "No such post was found!";
 }
 // if somthing was posted
 if($_SERVER['REQUEST_METHOD'] == "POST"){
    $Post->delete_post($_POST['postid']);
    header("Location:profile.php");
    die;

 }
?>  
<!DOCTYPE html>
<html>
    <head>
        <title>Delete | My Book</title>
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
        textarea{
            width: 100%;
            border: none;
            font-size: 14px;
            font-family: tahoma;
            height: 60px;
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

        <div style="width: 800px;margin:auto;min: height 400px;"></div>

            <div style="display: flex;">
                <!-- Posts area -->

                <div style="min-height: 400px;flex: 2.5;padding: 20px;padding-right: 0px;">
                    <div style="border:solid thin #aaa; padding: 10px; background-color: white;">
                        
                        <h2>Delete Post</h2>
                        <form method="post">
                        
                            <?php

                                if($ERROR != ""){
                                    echo $ERROR;
                                }else{
                                
                                    echo "Are you sure you want to delete this post??<br><br>";
                                    $user - new User();
                                    $ROW_USER = $user->get_user($ROW['userid']);

                                    include("post_delete.php");
                                    echo "<input type='hidden' name='postid' value='$ROW[postid]'>";
                                    echo "<input id='post_button' type 'submit' value='Delete'>";

                                }
                            ?>
                        
                        

                        <br>
                        </form>
                        
                    </div>

                </div>
           </div>
        </div>    
    </body>
</html>