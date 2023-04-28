<?php
  include("classes/autoload.php");
  $image_class=new Image();
 //  isset($_SESSION['mybook_userid'])
 $login = new Login();
 $user_data = $login->check_login($_SESSION['mybook_userid']);
?>  
<!DOCTYPE html>
<html>
    <head>
        <title>Timeline | My Book</title>
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
            <!-- below cover area -->
            <div style="display: flex;">

                <!-- friends area -->
                
                <div style="min-height: 400px;flex: 1;">
                    <div id="profile_area">
                        <img src="Project/dp2.jpg" id="profile_pic">
                        <br>
                        <a href="profile.php" style = "text-decoration: none">  <?php echo $user_data['first_name'] . "<br> " . $user_data['last_name'] ?>
                        </a>
                      
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
                                <img src="Project/tony.jpg" style="width: 75px; margin-right: 4px;">
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
                                <img src="Project/natasha.jpg" style="width: 75px; margin-right: 4px;">
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