<div id="Friends">
    <?php
         $image = "./Project/user_male.jpeg";
            if($FRIEND_ROW['gender'] == "
                Female"){
                $image = "./Project/user_female.jpeg";
            }
            if(file_exists($FRIEND_ROW['profile_image'])){
                $image =$image_class->get_thumb_profile($FRIEND_ROW['profile_image']);
            }
           

    ?>
        <a href="profile.php?id=<?php echo $FRIEND_ROW['userid']; ?>">
        <img id="friends_img" src="<?php echo $image ?>">
        <br>
        <?php echo $FRIEND_ROW['first_name'] . " " . $FRIEND_ROW['last_name'] ?>
    </a>
</div>