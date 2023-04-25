<div id="Friends">
    <?php
         $image = "./Project/user_male.jpeg";
            if($FRIEND_ROW['gender'] == "
                Female"){
                $image = "./Project/user_female.jpeg";
            }

    ?>
    <img id="friends_img" src="<?php echo $image ?>">
    <br>
    <?php echo $FRIEND_ROW['first_name'] . " " . $FRIEND_ROW['last_name'] ?>
</div>