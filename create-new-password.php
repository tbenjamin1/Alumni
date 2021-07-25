
<?php
require_once('config.php');
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="new.css">

 
</head>
<body>

<div class="container">

<div class="row">
    


    <div class="col-sm-4">
  <?php
   session_start();
   $smg ="";
   
    // ENTER A NEW PASSWORD
if (!isset($_GET['$token'])) {
  header("location: http://localhost/form/pending.php");
}
$token = $_GET['token'];
$getEmail=$db->prepare("SELECT resetEmail FROM pwdreset WHERE resetToken= :token LIMIT 1");

$getEmail->bindValue(":token",$token);
$getEmail->execute();
$row = $getEmail->fetch(PDO::FETCH_ASSOC);

$emailGot = $row['email'];
if($getEmail->rowCount() == 0){
  header("location: http://localhost/form/pending.php");
}
date_default_timezone_set("Africa/kigali");
$result= $db ->prepare("SELECT TIMESTAMPDIFF (SECOND,date,NOW()) AS tdif FROM pwdreset WHERE resetToken= :token ");
$result->bindValue(':token',$token);
$result->execute();
$result=store_result();
$result->bind_result($tdif);
$result->fetch(PDO::FETCH_ASSOC);



if($tidf >= 900){
  $removeQuery = $db->prepare("DELETE FROM pwdreset WHERE resetToken= :token ");
  $removeQuery->bindValue(':token',$token);
  $removeQuery->execute();
  header("location: http://localhost/form/pending.php");

}
if (isset($_POST['reset-pwd-submit'])){
  $new_pass = $_POST['pwd'];
  $new_pass_c =  $_POST['pwd-repeat'];

  if(empty($_POST['pwd']) || empty($_POST['pwd-repeat']))
  {
    echo"<script> alert('all field are required')</script>";
  }

  elseif( $new_pass  != $new_pass_c){
    
    echo"<script> alert('Passwords do not match')</script>";
}
elseif(strlen($new_pass)<8){ // min 

echo"<script> alert('The password is 6 characters long')</script>";
}
elseif(strlen($new_pass)>20){ // Max 

echo"<script> alert('Max length 50 Characters Not allowed')</script>";
}
else{
  $new_pass = md5($new_pass);
  $sql = "UPDATE user SET password='$new_pass' WHERE email= :emailGot";
    $sql->bindValue(':emailGot',$emailGot);
    $sql->execute();
    if($sql->execute()){
      $remove = $db->prepare("DELETE FROM pwdreset WHERE resetToken= :token ");
      $remove->bindValue(':token',$token);
      $remove->execute();
      $smg ="<div class=' alert alert -success alert-dismissible' ><a href ='#' class='close' data-dismiss='alert' aria-label='close'> 
    &times;</a> password updated!successfully
    </div>";
    }else{
      $smg ="<div class=' alert alert -danger alert-dismissible' ><a href ='#' class='close' data-dismiss='alert' aria-label='close'> 
    &times;</a> something went! contact us
    </div>";

    }

}
}





  
  
?>
        
 <form action="create-new-password.php" method="POST" >
 <h1>reset your password</h1>
  
 
    
 
 
 <div class="mb-3">
 <input type="password" name=" pwd"  class="form-control" id="typepass" placeholder="enter a new password">
 </div>
 <div class="mb-3">
 <input type="password" name=" pwd-repeat"  class="form-control" id="typepass2" placeholder="confirm a new password">
 </div>
 <div class="mb-3">
 <input type="checkbox" name="check"  class="form-control" onclick="toggole()" >
 <p style="float:left; margin-left:5px;" >show password</p><br><br>
 </div>
 <div class="mb-3">
 <button type="submit" name="reset-pwd-submit" class="btn btn-primary">Reset password</button>
 </div>



  
  <!-- <button type="submit" name="sendlink" class="btn btn-primary">send link</button> -->
  
</form>
<p ><a href="login.php" style=" color:#00376b;" >login</a> </p>
  <br>
  <p>don't have an account?<a href="signup.php">sign up</a> </p>
</div>
        
    
    </div>
    </div>
    </div>
</body>
<script>
function toggole(){
  var pass = document.getElementById("typepass");
  var pass2 = document.getElementById("typepass2");

if(pass.type === "password"){
  pass.type = "text";
}
if(pass2.type === "password"){
  pass2.type = "text";
}
else{
  pass.type = "password";
  pass2.type = "password";
}

}
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" ></script>
</html> 