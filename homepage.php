<?php
require_once('config.php');

session_start();
echo "welcome" .$_SESSION["email"];

?> 


<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js">
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALUMN DATABASE</title>
    
    <link rel="stylesheet" type="text/css" href="styles.css">
    

</head>
<script>
function text(x){
    if(x == 0) document.getElementById('mycode').style.display="none";
    else document.getElementById('mycode').style.display="block";
    return;
}
</script>
<body >
<div class="container">
    <header>
        <div class="header-warraper">
            <div ><img src="images/ur.png" class="logo"></div>
            <h1 class="page-header">Welcome to our almuni !</h1>
           
              <div class="tasks" id="tasks">
        <div class="cell " data-cell>CST</div>
        <div class="cell " data-cell>CMHS</div>
        <div class="cell" data-cell>CAVEM</div>
        <div class="cell" data-cell>CBE</div>
        <div class="cell" data-cell>ALL COLLEGES</div>
        <!-- <button type="submit" class="btn btn-primary" id="logout" >logout</button> -->
        <a href="logout.php" tite="Logout">Logout </a>  
          
    </div>
        </div>
        
        <div class="img-wrapper"><img src="images/arton69.jpg" ></div>
        <div class="banner">
            
               <h1>ur alumni</h1>
               <p>
               click! the button below to submit your address 
               </p>
               <div class="progress">
               <div class="progress-bar progress-bar-success progress-bar-striped active">progress
               50% </div>
               <hr>
               <button type="submit" class="btn btn-primary"  
onclick="document.getElementById('id01').style.display='block'"  >submit address</button>
</div>
           </div>
    </header>
    </div>
    <?php
    if(isset($_POST["reset"])){
    $regNo=$_POST['RegNo'];
    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $gender=$_POST['gender'];
    
    $email= $_POST['email'];
    $TelNo=$_POST['telNo'];
    $college= $_POST['college'];
    $schoolOf= $_POST['school_of'];
    $department= $_POST['department'];
    
    $insitution = $_POST['current_insitution_belong'];
    $graduation= $_POST['year_of_graduation'];
    $jobPosition= $_POST['current_position'];

        if(!empty($_POST['RegNo']) && !empty($_POST['fname']) && !empty($_POST['lname']) 
    && !empty($_POST['gender']) && !empty($_POST['email'])&& !empty($_POST['telNo'])
     && !empty($_POST['college'])&& !empty($_POST['school_of']) && ! empty($_POST['department'])
      && !empty($_POST['year_of_graduation']) && !empty($_POST['current_insitution_belong']
      ) && !empty($_POST['current_position'])) {

        $regNo="";
        $firstname="";
        $lastname="";
        $gender="";
        
        $email= "";
        $TelNo="";
        $college= "";
        $schoolOf= "";
        $department= "";
        
        $insitution = "";
        $graduation= "";
        $jobPosition= "";
      }else{
        echo"<script> alert('no input value')</script>";
      }
    }
    
    
    ?>
    
    
   
    <div class="list-todo">
        
    <?php
   
    
    
    if(isset($_GET["newUser"])){

      if($_GET["newUser"]=="updated"){
        echo'<div class="alert alert-warning alert-dismissible " role="alert">
        <button type="button"  class="close" data-dismiss="alert"><span>&times;></span></button>
        
        successfully updated </div>';
      }
    }

    
    ?>

    
    ?>
        <div id="list">
        <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-4" >
            <h1>UR - alumni </h1> 
            </div>
    <div class="col-md-2 col-sm-2 col-xs-4"> 
    <p> 
    <mark>alumni</mark> can be a great partner of the University of Rwanda
    based on their expertise.</p> 
    <p> 
    this is one of the areas we need to empower through inviting
     those alumni to give their contribution to <u> the University of Rwanda</u> 

    </p>
    <button type="button" class="btn btn-primary"  >ReadMore</button>
    </div>
    </div>



<p>Sytem Report</p><br>
<a href="admin.php">admin account!</a> 
            </div>
      </div>
   
      <div class="container" >
        <div id="id01" class="modal">
    
       <form class="address_form" id="id0" action="homepage.php" method="post" > 
        
       
            <div >
                <span onclick="document.getElementById('id01').style.display='none'"
            class="close" title="Close form">&times;</span> 
        </div>
        
          <div class="form_container" >
          <h1> fill the form </h1>
          <hr> 
          <p><span class="error"></span></p>
          <div class="row">
          <div class="col-sm-5">
          <div class="form-group">
            <label class="lebel_txt">RegNo:</label>
             <input type="text" class="form-control" name="RegNo"   required="" >
             </div>
             <hr>
        <div class="form-group">
                <label class="lebel_txt">First Name</label>
                <input type="text" class="form-control" name="fname" required="" >

                
                </div>
               
                <hr>
                <div class="form-group">
                    <label class="lebel_txt">Last Name</label>
                    <input type="text" class="form-control" name="lname" >
                    

                    
            </div>
            <hr>
            <hr class="mb-3">
            <div class="form-check">
            <label class="form-check-label" >male</label>
            <input class="form-check-input" type="radio" name="gender"  value="male" checked>
            <label class="form-check-label" >female</label>
            <input class="form-check-input" type="radio" name="gender"  value="female" >
            
             </div>
        
             <hr>
             <hr class="mb-3">
           
                <div class="form-group">
                    <label class="lebel_txt">Email</label>
                    <input type="text" class="form-control" name="email"   required >
                 </div>
                 
                 <hr>
                <div class="form-group">
                    <label class="lebel_txt">Tel No:</label>
                    <input type="text" class="form-control" name="telNo" required="" >
                </div>
                <hr>
                <div class="form-group">
                    <label class="lebel_txt">others:</label>
                    <input type="checkbox" id="d-checkbox" value="others" name="other"  onclick ="text(0)" >
                </div>
                <div class="form-group">
                    <label class="lebel_txt">current insitution belongs:</label>
                    <input type="text" class="form-control" name="current_insitution_belong"    >
                </div>
                <hr>
                <div class="form-group">
                    <label class="lebel_txt">current position</label>
                    <input type="text" class="form-control" name="current_position"    >
                </div>
                </div>
                <div id="mycode" >
                <div class="form-group">
                    <label class="lebel_txt">college :</label>
                    <input type="text" class="form-control" name="college" id="color"      >
                </div>
                <hr>
                <div class="form-group">
                    <label class="lebel_txt">school of :</label>
                    <input type="text" class="form-control" name="school_of"    >
                </div>
                <hr>
                <div class="form-group">
            <label class="lebel_txt">department</label>
             <input type="text" class="form-control" name="department"    >
             </div>
             <hr>
                <div class="form-group">
                    <label class="lebel_txt">year of graduation</label>
                    <input type="text" class="form-control" name="year_of_graduation"   >
                </div>
                <hr>
                </div>
                <hr>
              <hr class="mb-3">
                <button type="submit" class="btn btn-primary" name="submit_alumn" >submit</button>
             
              <button type="submit" class="btn btn-primary" name="reset" >reset</button>
             
             </div>
             </div>
             </div>
        
 </div>
            
        </form>
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
<?php



if(isset($_POST['submit_alumn'])){
    $regNo=$_POST['RegNo'];
    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $gender=$_POST['gender'];
    
    $email= $_POST['email'];
    $TelNo=$_POST['telNo'];
    $other=$_POST['other'];
    $college= $_POST['college'];
    $schoolOf= $_POST['school_of'];
    $department= $_POST['department'];
    
    $insitution = $_POST['current_insitution_belong'];
    $graduation= $_POST['year_of_graduation'];
    $jobPosition= $_POST['current_position'];

    if(empty($_POST['RegNo']) && empty($_POST['fname']) && empty($_POST['lname']) 
    && empty($_POST['gender']) && empty($_POST['email'])&& empty($_POST['telNo'])) {
		echo"<script> alert('all field are required')</script>";
	} elseif(empty($_POST['RegNo'])) {
		
        echo"<script> alert('reg no is required')</script>";
	} elseif(empty($_POST['fname'])) {
		
        echo"<script> alert('fname is required')</script>";
	} elseif(empty($_POST['lname'])) {
		

        echo"<script> alert('lname is required')</script>";
	} elseif(empty($_POST['gender'])) {
		
        echo"<script> alert('gender required')</script>";
        
	} 

    elseif(empty($_POST['email'])) {
    $msg = "A password is required";
    
    echo"<script> alert('email is required')</script>";

} elseif(empty($_POST['telNo'])) {
   
    echo"<script> alert('A tel is required')</script>";
}
 
    elseif(!preg_match("/[A-Za-z0-9]+/", $_POST['fname'])) {
 		$msg = "The username provided is invalid";
	}  elseif(!preg_match("/[A-Za-z0-9]+/", $_POST['lname'])) {
        
        echo"<script> alert('The username provided is invalid')</script>";
   }
    
    
    
    
    

      elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        
        echo"<script> alert('The email ".$email." is not a valid email.')</script>";
	} elseif(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/",  $TelNo)) {
        echo"<script> alert('The phone". $TelNo." is not a valid phone number.')</script>";
    }
    else {
	
	

    
    
      
      $sql ="INSERT INTO alumntabele(RegNo,fname,lname,gender,telNo,others,
      email,college,school_of,department,
      current_insitution_belong,year_of_graduation,current_position) 
      VALUES(:RegNo,:fname,:lname,:gender,:telNo,:others,:email,:college,
      :school_of,:department,:current_insitution_belong,:year_of_graduation,
      :current_position)";
      
      $stmtinsert = $db ->prepare($sql);
      
      $stmtinsert->bindValue(':RegNo', $regNo);
      $stmtinsert->bindValue(':fname', $firstname);
       $stmtinsert->bindValue(':lname', $lastname);
       $stmtinsert->bindValue(':gender', $gender);
       $stmtinsert->bindValue(':telNo', $TelNo);
       $stmtinsert->bindValue(':others', $other);
       $stmtinsert->bindValue(':email', $email);
      $stmtinsert->bindValue(':college', $college);
      $stmtinsert->bindValue(':school_of', $schoolOf);
      $stmtinsert->bindValue(':department', $department);
      
      $stmtinsert->bindValue(':current_insitution_belong', $insitution);
      $stmtinsert->bindValue(':year_of_graduation', $graduation);
      $stmtinsert->bindValue(':current_position', $jobPosition);
      $stmtinsert->execute();
      if($stmtinsert->execute()){
          
       header("location: http://localhost/form/homepage.php?newUser=updated");
    //    echo"<script> alert('thank for registering to UR-almuni')</script>";
      }else{
        echo"<script> alert('not registered')</script>";
      }

    }
}



?> 

       
      
</body>  


</html>