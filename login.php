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

<?php
session_start();


error_reporting(0);

if(isset($_POST['login'])){

  $email= $_POST['email'];
  $password= md5($_POST['password']);
  if(empty($_POST['email']) || empty($_POST['password']))
  {
    echo"<script> alert('all field are required')</script>";
  }
  else{
    $chk =  $db ->prepare("SELECT email FROM user WHERE email= :email AND password =:password");
    $chk->bindValue(':email',$email);
    $chk->bindValue(':password',$password);
      $chk->execute();
       if($chk->rowCount() >0 ){
        // $row = $chk->fetch(PDO::FETCH_ASSOC); 
        // $_SESSION["id"] = $row['id'];
         $_SESSION["email"] = $_POST["email"];

         header("location: http://localhost/form/homepage.php");
          
        

       }else{
        echo"<script> alert('Invalid Username or Password!')</script>";
       }
  }



     
}



?>

<div class="container" >
<div class="img-wrapper"><img src="images/arton68.jpg" ></div>
        <div class="banner">

     <div >

      <div class="row">
       <h1 class="page-header">welcome to our alumn <small>sign in first</small> </h1>
       <div class="col-sm-4"> <br>
        </div>
      <div class="progress">
               <div class="progress-bar progress-bar-succes progress-bar-striped active">
               progress  10% </div>
</div>
<hr>
<button type="submit" class="btn btn-warning"  
    onclick="document.getElementById('login').style.display='block'"  >
    GetStarted</button>
    </div>
    <div id="login" class="modal">
    <div class="col-sm-4">
    <div >
                <span onclick="document.getElementById('login').style.display='none'"
            class="close" title="Close form">&times;</span> 
        </div>
      <div class="login_form">
        <!-- <h1>welcome to UR-Ulumn I Database</h1> -->

<!--  -->

    <form action="login.php" method="POST"  >
    
     <div class="mb-3">
    <label  class="form-label">Username or Email</label>
    <input type="text" name=" email"  class="form-control" value ="<?php echo $email;?>" require >
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password"  name ="password" class="form-control" value ="<?php echo $_POST['password'];?>" require >
  </div>
  <label>
  <input type="checkbox"  class="form-checkbox" > Remember me
  </label>
  
  <button type="submit" name="login" class="btn btn-primary">login</button>
  
</form>
<a href="forgotpswd.php" style=" color:#00376b;" >forgot password?</a> 
  <br>
  <a href="signup.php">sign up</a> </p>
</div>
    </div>
    <div class="col-sm-4"></div>
    </div>
    </div>
    </div>
    
    <footer >
        <div class="footer-content">
            <p class="copy">
                copyright&copy;2021,all rights reversed
            </p>
            <div class="social-list">
                <a href="#"><img src="images/face.png"></a>
                <a href="#"><img src="images/twitter.jpg"></a>
                <a href="#"><img src="images/inst.png"></a>
            </div>
        </div>
        </footer>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" ></script>
</html> 