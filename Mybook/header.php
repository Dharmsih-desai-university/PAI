<?php
    $corner_image="project/user_male.jpg";
    
    if(isset($user_data)){
        
            $corner_image=$image_class->get_thumb_profile($user_data['profile_image']);
    }
   
?>

<div id="blue_bar" style = " background-color: #1877F2;">
    <div style="margin: auto;width: 800px;padding: 7px;">
        <a href="index.php" style = "color:#d0d8e4;text-decoration:none;">My Book</a>
        &nbsp;
        &nbsp;
        <input type="text" id="search_box" placeholder="Search For People">
        <a href="profile.php">
             <img src="<?php echo $corner_image;?>" style="width: 40px; float: right;border-radius:30%;">
        </a>
       
        <span style="font-size:11px;float: right;margin:10px;"><a href="logout.php" style="color:#fff;font-size:15px"> Log out </a></span>
    </div>
 </div>