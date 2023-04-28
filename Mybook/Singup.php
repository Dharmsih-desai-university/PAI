<?php
include("classes/config.php");
include("classes/singup.php");
$first_name = "";
$last_name = "";
$email = "";
$gender = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $signup = new Signup();
     $result = $signup->evaluate($_POST);

     if($result != ""){
        echo "<div style = 'text-align:center;font-size:12px;color:white;background:grey;'
        >";
        echo "the following errors occured: <br><br>";
        echo $result;
        echo "</div>";
        
     }else{
        header("Location: login.php");
        die;
     }
     $first_name = $_POST['first_name'];
     $last_name = $_POST['last_name'];
     $gender = $_POST['gender'];
     $email = $_POST['email'];
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mybook | Signup</title>
</head>
<style>
     #bar{
       height:130px; 
       background-color:rgb(59,89,152);
       color:#d9dfeb; 
       padding: 4px;
     }
     #signup_button{
         background-color: #42b72a;
         width: 70px;
         text-align: center;
         padding: 4px;
         border-radius: 4px;
         float: right;
     }
    #bar2{
        background-color: white;
         width: 400px;
         height: auto;
        margin: auto;
        margin-top: 50px;
        padding: 10px;
        padding-top: 50px;
        text-align: center;
        font-weight: bold;
        
    }

    #text{
        height: 40px;
        width: 300px;
        border-radius: 4px;
        border: solid 1px #ccc;
        padding: 4px;
        font-size: 14px;

    }
    #button{
        width:300px;
        height: 40px;
        border-radius: 4px;
        font-weight:  bold;
        border:none;
        background-color:blue;
        color: white;
    }
    #login{
        color:#fff;
    }
    #login:hover{
        cursor:pointer;
    }
   

</style>
<body style="font-family: tahoma; background-color:floralwhite;">
    <div  id="bar">
        <div style="font-size:40px;">Mybook</div>
        <div id="signup_button"><a href="login.php" id="login">Login</a></div>
    </div>
<div id="bar2">
        Sign up to Mybook<br><br>
    <form action="" method = "post" >
        <input value = "<?php echo $first_name ?>" type="text"  id="text" name = "first_name" placeholder="Firstname" ><br><br>
        <input value = "<?php echo $last_name ?>" type="text"  name = "last_name" id="text" placeholder="Lastname" ><br><br>
       <span style="font-weight: normal
        ;"> Gender:</span> <br>
        <select id="text" name = "gender">
        <option>Male</option>
        <option > <?php echo $gender?> </option>
        <option >Female</option>
        <option>Other</option>
        </select>
        <br><br>
        <input type="email"  value = "<?php echo $email ?>" name = "email" id="text" placeholder="Email address" ><br><br>
        <input type="password" name = "password1"  id="text" placeholder="Password" ><br><br>
        <input type="password"  name  = "password2" id="text" placeholder="Confirm Password" ><br><br>
        <input type="submit" id="button" value="Sign up">
    </form>
</div>

</body>
</html>