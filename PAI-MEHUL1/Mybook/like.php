<?php
echo "<pre>";
print_r($_SERVER);
echo "</pre>";

if(isset($_SERVER['HTTP_REFERER'])){
$return_to = $_SERVER['HTTP_REFERER'];
}else{
$return_to = "profile.php";
}
  if(isset($_GET['type']) && isset($_GET['id'])){
  if(is_numeric($_GET['id'])){

    $allowed[] = 'post';
    $allowed[] = 'profile';
    $allowed[] = 'comment';
     if(in_array($GET_['type'], $allowed)){
  
  $post =  new Post();
  $post->like_post($_GET['id'],$_GET['type']);
     }
  }
  }
header("Location: ".$return_to);
die;
