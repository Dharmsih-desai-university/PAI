<div id="post" style = "background: #fff;">
        <div>
              <?php
                   $image = "./Project/user_male.jpeg";
                   if($ROW_USER['gender'] == "Female"){
                         $image = "./Project/user_female.jpeg";
                   }
                   if(file_exists($ROW_USER['profile_image'])){
                        $image =$image_class->get_thumb_profile($ROW_USER['profile_image']);
                  }

              ?>
              <img src="<?php echo $image ?>" style="width: 75px; margin-right: 5px;border-radius:50%; ">
        </div>
        <div style="font-weight: bold;color: #405d9b;width:100%;">
            <?php
                   echo htmlspecialchars($ROW_USER['first_name'])  . " ".htmlspecialchars($ROW_USER['last_name']); 
                   if($ROW['is_profile_image']){
                        $pronoun="his";
                        if($ROW_USER['gender']=="Female"){
                              $pronoun="her";
                        }
                        echo "<span style='font-wieght:normal;color:#aaa;'> updated profile image</span>";
                   }
                   if($ROW['is_cover_image']){
                        $pronoun="his";
                        if($ROW_USER['gender']=="Female"){
                              $pronoun="her";
                        }
                        echo "<span style='font-wieght:normal;color:#aaa;'> updated cover image</span>";
                   }
                   
                   
               
            ?>
            <br>
               <br>
               <?php 
                 if(file_exists($ROW['image'])){
                  $post_image=$image_class->get_thumb_post($ROW['image']);
                  echo "<img src='$post_image' style='width:70%;'/>";
               
                 }
               
               ?>

                  
            <p style = "color: black; font-size:14px">
              <?php echo htmlspecialchars($ROW['post']) ?>
            </p>
            <br/><br/>
             <a href="">Like</a> . <a href="">Comment</a> .
             <span style="color: #888;">
               <?php echo $ROW['date'] ?>
               
            </span>
            <span style="color: #888; float:right;">
               Edit.Delete
               
            </span>
            
   
    </div>     
</div>