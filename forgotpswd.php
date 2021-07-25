

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgotpswd </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

 
</head>
<body>
<?php
session_start();
require_once ('config.php');

$result ='';


if(isset($_POST['sendlink']))
{
 $email = $_POST['email'];
 if($email ==""){
  $result ="<div class=' alert alert -success alert-dismissible' ><a href ='#' class='close' data-dismiss='alert' aria-label='close'> 
  &times;</a> plz  check your email cannot be empty
  </div>";
 }else{


 $stmt = $db->prepare("SELECT id FROM user WHERE email=:emaill");
 
 $stmt->bindValue(':emaill',$email);
 $stmt->execute();

 if(!$stmt->rowCount() >0)
 {
  $result ="<div class=' alert alert -success alert-dismissible' ><a href ='#' class='close' data-dismiss='alert' aria-label='close'> 
  &times;</a> no user registered with such email
  </div>";
 }
 else{

  $token =uniqid(true);
  $time =date("Y-m-d");
  echo $time;

  $sql ="INSERT INTO pwdreset(resetEmail, resetToken,date) VALUES(:resetEmail,:resetToken,:date)";
  
  $stmtinsert = $db ->prepare($sql);
  $stmtinsert->bindValue(':resetEmail', $email);
    $stmtinsert->bindValue(':resetToken',$token);
    $stmtinsert->bindValue(':date',$time);
   $insert=$stmtinsert->execute();
    print_r($insert);
    if(!$insert){
      $result ="<div class=' alert alert -success alert-dismissible' ><a href ='#' class='close' data-dismiss='alert' aria-label='close'> 
    &times;</a> plz  check error occured
    </div>";
    }else{
      // include('forgot_mailer.php');
      $result ="<div class=' alert alert -success alert-dismissible' ><a href ='#' class='close' data-dismiss='alert' aria-label='close'> 
    &times;</a> inserted
    </div>";

    }
     
    

 }
 
}

 }
  

?>

<div class="container">

    <div class="row">
    <div class="col-sm-4">
    
    <div class="">
    <p> <!--      .... --> <?php echo $result; ?> </p>
    </div>
    </div>
    <div class="col-sm-4">
      <div class="login_form">
        <h1>reset your password</h1>

<!--  -->

    <form action="forgotpswd.php" method="POST" >
  <div class="mb-3">
    <label  class="form-label">UserEmail</label>
    <input type="text" name=" email"  class="form-control"  >
  </div>
  
  <button type="submit" name="sendlink" class="btn btn-primary">send link</button>
  
</form>
<p ><a href="login.php" style=" color:#00376b;" >login</a> </p>
  <br>
  <p>don't have an account?<a href="signup.php">sign up</a> </p>
</div>
    </div>
    <div class="col-sm-4">
    <?php
    
    if(isset($_GET["rest"])){

      if($_GET["rest"]=="success"){
        echo'<div class="alert alert-warning alert-dismissible " role="alert">
        <button type="button"  class="close" data-dismiss="alert"><span>&times;></span></button>
        
        check your email!</div>';
      }
    }

    
    ?>
    
    </div>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" ></script>
</html> 