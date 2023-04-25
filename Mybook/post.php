<div id="post" style = "background: #fff;">
        <div>
              <?php
                   $image = "./Project/user_male.jpeg";
                   if($ROW_USER['gender'] == "
                   Female"){
                         $image = "./Project/user_female.jpeg";
                   }

              ?>
              <img src="<?php echo $image ?>" style="width: 75px; margin-right: 5px ">
        </div>
        <div style="font-weight: bold;color: #405d9b;">
            <?php echo $ROW_USER['first_name']  . " ". $ROW_USER['last_name']; ?>
            <p style = "color: black; font-size:14px">
              <?php echo $ROW['post'] ?>
            </p>
            <br/><br/>
             <a href="">Like</a> . <a href="">Comment</a> .
             <span style="color: #888;">
               <?php echo $ROW['date'] ?>
            </span>
            
   
    </div>     
</div>