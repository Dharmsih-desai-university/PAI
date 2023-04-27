<?php
    
     include("classes/autoload.php");
     
    //  isset($_SESSION['mybook_userid'])
    $login = new Login();
    $user_data = $login->check_login($_SESSION['mybook_userid']);

      if(isset($_GET['id'])&& is_numeric($_GET['id'])){
            $profile=new Profile();
        $profile_data=$profile->get_profile($_GET['id']);
        if(is_array($profile_data)){
        $user_data=$profile_data[0];
      }
      }
      
            //for posting 
      if($_SERVER['REQUEST_METHOD'] == "POST"){
        
         $post = new Post();
         $id = $_SESSION['mybook_userid'];
         $result = $post->create_post($id , $_POST,$_FILES);
         if($result == ""){
            header("Location:profile.php");
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
      $id = $user_data['userid'];
      $posts = $post->get_posts($id);
      //collect firends
      $user = new User();
     
      $friends = $user->get_friends($id);

     $image_class=new Image();    
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
<body style="background-color: #d0d8e4;font-family:tahoma;">
        <!-- Top Bar -->
        <?php
            include("header.php");
        ?>
        <!-- Cover Area -->
        <div style="width: 800px; margin: auto;min-height: 400px;">
            <div style="color: #2a78b8; text-align: center;background-color: white;">
                    <?php
                       $image="project/cover.jpg";
                       if(file_exists($user_data['cover_image'])){
                         $image=$image_class->get_thumb_cover($user_data['cover_image']);
                       }
                       
                    ?>
                <img src="<?php echo $image;?>" style="width: 100%; height:400px;">
                <span style = "font-size: 11px">
                    <?php
                       $image="project/";
                       if($user_data['gender']=="Female"){
                           $image.="user_female.jpeg";
                       }
                       else{
                           $image.="user_male.jpeg";
                       }
                       if(file_exists($user_data['profile_image'])){
                        $image=$image_class->get_thumb_profile($user_data['profile_image']);
                       }
                       
                    ?>
                     <img id="profile_pic" src="<?php echo $image;?>"><br>
                      <a style="font-size:20px;text-decoration:none;color:#f0f;" href = "change_profile_image.php?change=profile">change profile image</a> |
                      <a style="font-size:20px;text-decoration:none;color:#f0f;" href = "change_profile_image.php?change=cover">change cover</a>
                </span>
               
                <br>
                <div style="font-size: 20px;"><?php echo $user_data['first_name']." ".$user_data['last_name']; ?></div>
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
                    <form action="" method = "post" enctype="multipart/form-data">
                    <textarea placeholder="Whats on your mind ?" name = "post"></textarea>
                        <input  id="post_button" name = "" type="submit" value="Post">
                        <br>
                        <input type="file" name="file">

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