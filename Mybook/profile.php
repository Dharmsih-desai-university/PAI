<?php
     session_start();
     include("classes/config.php");
     include("classes/login.php");
     include("classes/user.php");
     if(isset($_SESSION['mybook_id']) && is_numeric($_SESSION['mybook_id'])){
        $id = $_SESSION['mybook_id'];
        $DB = new Login();
        $result = $DB->cheak_login($id);
        if($result){
             $user = new User();
             $user_data = $user->get_data($id);
             if(!$user_data){
                header("Location : login.php");
                die;
             }
        }else{
            header("Location : login.php");
            die;
        }
     }else{
        header("Location : login.php");
        die;
     }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profile | My Book</title>
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
        <div id="bar">
            <div style="margin: auto;width: 800px;padding: 7px;">
                 My Book &nbsp; &nbsp;<input type="text" id="search_box" placeholder="Search For People">
                <img src="dp2.jpg" style="width: 40px; float: right;">
            </div>
        </div>
        <!-- Cover Area -->
        <div style="width: 800px; margin: auto;min-height: 400px;">
            <div style="color: #2a78b8; text-align: center;background-color: white;">
                <img src="cover.jpg" style="width: 100%;">
                <img id="profile_pic" src="dp2.jpg">
                <br>
                <div style="font-size: 20px;">Chris Taylor</div>
                <br>
                <div id="menu_buttons">Timeline</div>
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
                        Friend 
                        <br>
                        <!-- Friends photos and name  -->
                        <div id="Friends">
                            <img id="friends_img" src="rdj.jpg">
                            <br>
                            Robert Downey jr
                        </div>
                        <div id="Friends">
                            <img id="friends_img" src="steve.jpg">
                            <br>
                            Steve
                        </div>
                        <div id="Friends">
                            <img id="friends_img" src="linda martin.jpg">
                            <br>
                            Linda 
                        </div>
                        <div id="Friends">
                            <img id="friends_img" src="jay.jpg">
                            <br>
                            Jay
                        </div>
                    </div>
                </div>
                <!-- Posts area -->
                <div style="min-height: 400px;flex: 2.5;padding: 20px;padding-right: 0px;">
                    <div style="border:solid thin #aaa; padding: 10px; background-color: white;">
                        <textarea placeholder="Whats on your mind ?"></textarea>
                        <input  id="post_button" type="submit" value="Post">
                        <br>
                    </div>
                    <!-- Posts -->
                    <div id="post_bar">

                         <!-- Post-1 -->
                        <div id="post">
                            <div>
                                <img src="tony.jpg" style="width: 75px; margin-right: 4px;">
                            </div>
                            <div style="font-weight: bold;color: #405d9b;">Tom</div>
                            <div>
                            <br>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                            <br><br>
                            <a href="">Like</a> . <a href="">Comment</a> . <span style="color: #888;">April 23 2020</span>
                            </div>
                        </div>

                         <!-- Post-2 -->
                         <div id="post">
                            <div>
                                <img src="natasha.jpg" style="width: 75px; margin-right: 4px;">
                            </div>
                            <div style="font-weight: bold;color: #405d9b;">Natasha</div>
                            <div>
                            <br>
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. 
                            <br><br>
                            <a href="">Like</a> . <a href="">Comment</a> . <span style="color: #888;">April 23 2020</span>
                            </div>
                        </div>

                    </div>
                </div>
           </div>
        </div>
    </body>
</html>