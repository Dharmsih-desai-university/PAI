<?php
     session_start();
     include("classes/config.php");
     include("classes/login.php");
     include("classes/user.php");
     include("classes/post.php");
    //  isset($_SESSION['mybook_userid'])
    $login = new Login();
    $user_data = $login->check_login($_SESSION['mybook_userid']);
      //for posting 
      if($_SERVER['REQUEST_METHOD'] == "POST"){
         $post = new Post();
         $id = $_SESSION['mybook_userid'];
         $result = $post->create_post($id , $_POST);
         if($result == ""){
            header("Location : profile.php");
         }else{
            echo "<div style = 'text-align:center;font-size:12px;color:white;background:grey;'
            >";
            echo "the following errors occured: <br><br>";
            echo $result;
            echo "</div>";
         }
      }
      // collect posts
      $post = new Post();
      $id = $_SESSION['mybook_userid'];
      $posts = $post->get_posts($id);
      //collect firends
      $user = new User();
      $id = $_SESSION['mybook_userid'];
      $friends = $user->get_friends($id);



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profile | My Book</title>
    </head>
    <style type="text/css">
        #blue_bar{
        height: 50px;
        background-color: #1877F2;
        color: white;
        font-size: 20px;
        font-family: tahoma;
        border-radius: 5px;
        text-decoration:none;
        /* text-align: center; */
        }
        #search_box{
            width: 400px;
            height: 25px;
            border-radius: 4px;
            border: none;
            padding: 4px;
            background-image: url("search2.png");
            background-repeat: no-repeat;
            background-position: right;
          
        }
        #profile_pic{
            width: 150px;
            margin-top:-200px;
            border-radius: 50%;
            border: solid 2px white;
        }
        #menu_buttons{
            width: 100px;
            display: inline-block;
            margin: 2px;
        }
        #friends_img{
            width: 75px;
            float: left;
            margin: 8px;
        }
        #friends_bar{
            min-height: 400px;
            margin-top: 20px;
            background-color:white;
            padding: 8px;
            color: #aaa;

        }
        #Friends{
            clear: both;
            font-size: 12px;
            font-weight: bold;
            color: #1877F2;
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
        <!-- Cover Area -->
        <div style="width: 800px; margin: auto;min-height: 400px;">
            <div style="color: #2a78b8; text-align: center;background-color: white;">
                <img src="project/cover.jpg" style="width: 100%;">
                <img id="profile_pic" src="project/dp2.jpg">
                <br>
                <div style="font-size: 20px;">Chris Taylor</div>
                <br>
                <a href="index.php" target = "_blank"><div id="menu_buttons">Timeline</div></a>
                <div id="menu_buttons">About</div>
                <div id="menu_buttons">Friends</div>
                <div id="menu_buttons">Photos</div>
                <div id="menu_buttons">Settings</div>
            </div>
            <!-- Below Cover area -->
            <div style="display: flex;">
                <!-- Friends area -->
                <div style="min-height: 400px;flex: 1;">
                    <div id="friends_bar">
                        Friend <br>
                        <?php
                         if($friends){
                            foreach($friends as  $FRIEND_ROW){
                                include("user.php");
                            }
                         }    
                         ?>
                        <!-- Friends photos and name  -->
                    </div>
                </div>
                <!-- Posts area -->
                <div style="min-height: 400px;flex: 2.5;padding: 20px;padding-right: 0px;">
                    <div style="border:solid thin #aaa; padding: 10px; background-color: white;">
                    <form action="" method = "post">
                    <textarea placeholder="Whats on your mind ?" name = "post"></textarea>
                        <input  id="post_button" name = "" type="submit" value="Post">
                        <br>

                    </form>
                       
                    </div>
                    <!-- Posts -->
                    <div id="post_bar">

                         <!-- Post-1 -->
                         <!-- Post-2 -->
                         <?php
                         if($posts){
                            foreach($posts as  $ROW){
                                $user = new User();
                                $ROW_USER = $user->get_user($ROW['userid']);
                                include("post.php");

                            }
                         }
                            
                         ?>

                    </div>
                </div>
           </div>
        </div>
    </body>
</html>