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
    <link rel="stylesheet" type="text/css" href="styles.css">


</head>
<body>
<div class="img-wrapper"><img src="images/arton68.jpg" ></div>
        <div class="banner">

    <div>
<?php
error_reporting(0);

if(isset($_POST['create'])){

    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password= md5($_POST['password']);
    $passwordconfirm=md5($_POST['passwordconfirm']);
    $passwordToken =md5(rand());
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$password == $passwordconfirm||!$uppercase || !$lowercase 
    || !$number || !$specialChars || strlen($password) < 8){
      echo "<script> alert(' Password should be at least 8 characters
       in length and should include at 
      least one upper case letter, one number,
       and one special character')</script>";
    
    }elseif(!preg_match("/[A-Za-z0-9]+/", $_POST['firstname'])) {
      $msg = "The username provided is invalid";
   }  elseif(!preg_match("/[A-Za-z0-9]+/", $_POST['lastname'])) {
         
         echo"<script> alert('The username provided is invalid')</script>";
    }
     
     
     
     
     
 
       elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
         
         echo"<script> alert('The email ".$email." is not a valid email.')</script>";
   } 

  else{


  $sql ="INSERT INTO user(firstname,lastname,username,email,password,passwordconfirm,passwordToken) 
  VALUES(:firstname,:lastname,:username,:email,:password,:passwordconfirm,:passwordToken)";
  $stmtinsert = $db ->prepare($sql);
  
   $stmtinsert->bindValue(':firstname', $firstname);
   $stmtinsert->bindValue(':lastname', $lastname);
   $stmtinsert->bindValue(':username', $username);
   $stmtinsert->bindValue(':email', $email);
   $stmtinsert->bindValue(':password', $password);
  $stmtinsert->bindValue(':passwordconfirm', $passwordconfirm);
  $stmtinsert->bindValue(':passwordToken', $passwordToken);

  $chk =  $db ->prepare("SELECT email FROM user WHERE email= :emaill");
  $chk->bindValue(':emaill',$email);
  $chk->execute();

  if($chk->rowCount() >0 ){
    echo"<script> alert('wow user already exist registered')</script>";
    
  }else{
    if($stmtinsert->execute()){
      echo"<script> alert('wow user  registered')</script>";
       header("location: http://localhost/form/login.php");
      
      $firstname = "";
     $lastname = "";
     $username = "";
     $email = "";
     $_POST['password'] = "";
     $_POST['passwordconfirm'] = "";
    }
    else{

     
      $firstname = "";
     $lastname = "";
     $username = "";
     $email = "";
     $_POST['password'] = "";
     $_POST['passwordconfirm'] = "";
    }
  

  }
 }

}

      //
      
     
?>




    </div>

<!-- <div class="container"> -->

    <!-- <div class="row"> -->
    <!-- <h2>please sign up first !</h2> -->
    <div class="col-sm-4">
    
    </div>
    <div class="col-sm-4">
      <div class="signup_form">
     

<!--  -->

    <form action="signup.php" method="POST" >
    <div class="mb-3">
    <label class="form-label">first name</label>
    <input type="text"  name ="firstname" class="form-control" value="<?php echo $firstname; ?>" required >
  </div>
  <div class="mb-3">
    <label  class="form-label">lastname </label>
    <input type="text" name="lastname"  class="form-control" value="<?php echo $lastname; ?>" required  >
  </div>
  <div class="mb-3">
    <label class="form-lab el">Username</label>
    <input type="text"  name ="username" class="form-control" value="<?php echo $username; ?>" required >
  </div>
  <div class="mb-3">
    <label class="form-label">email</label>
    <input type="text"  name ="email" class="form-control" value="<?php echo $email; ?>" required >
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password"  name ="password" class="form-control" value="<?php echo $_POST['password']; ?>" required >
  </div>
  <div class="mb-3">
    <label class="form-label">confirm Password</label>
    <input type="password"  name ="passwordconfirm" class="form-control" value="<?php echo  $_POST['passwordconfirm']; ?>" required >
  </div>
  
  <button type="submit" name="create" class="btn btn-primary" id="register">signup</button>
  
</form>

  
   have an account?<a href="login.php">sign in</a> 
</div>
    </div>
    <div class="col-sm-4"></div>
    <!-- </div>
    </div> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
    

            
    
    </script>
</body>

</html> 