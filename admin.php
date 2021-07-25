<?php
require_once('config.php');
require_once('function.php');
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

 
</head>
<body>

        <div class="header-warraper">
            <div ><img src="images/ur.png" class="logo"></div>
            <h1>you can create your  report</h1>
           
              <!-- <div class="tasks" id="tasks">
             <div class="cell " data-cell>CST</div>
          <div class="cell " data-cell>CMHS</div>
           <div class="cell" data-cell>CAVEM</div>
         <div class="cell" data-cell>CBE</div>
         <div class="cell" data-cell>ALL COLLEGES</div> -->
           <button type="submit" class="btn btn-primary" id="logout" >logout</button>
           
        </div>
<div class="container">
<div class="row">

<div class="col-sm-8">
      <!-- <div class="login_form"> -->
       



    <form action="admin.php" method="POST" >
   
    <div class="form-group">
                    <label class="lebel_txt">year</label>
                    <input type="text" class="form-control" name="year"  >
 
            </div>
            
            <hr class="mb-3">
            <div class="form-check">
            <label class="form-check-label" >male</label>
            <input  type="radio" name="gender"  value="male" >
            <label class="form-check-label" >female</label>
            <input  type="radio" name="gender"  value="female">
            
             </div>
             <div class="form-group">
                    <label class="lebel_txt">others:</label>
                    <input type="checkbox" id="d-checkbox" name="other" value="other" >
                </div>
        
             
             <hr class="mb-3">
             <div class="form-group">
             <label for="cars">school_of:</label>
<select id="schools" name="school" size="8" multiple>
  <option value="ict">ict</option>
  <option value="engineering">engineering</option>
  <option value="medecine">medecine</option>
  <option value="pharmacy">agriculture</option>
  <option value="agriculture">pharmacy</option>
  <option value="nursing">nursing</option>
  <option value="business">business</option>
  <option value="education">education</option>
</select><br><br>
</div>
              
                 <div class="form-group">
                    <label class="lebel_txt">position</label>
                    <input type="text" class="form-control" name="position"  >
 
            </div>
                 <hr class="mb-3">
                 
                 
  <button type="submit" name="report" class="btn btn-primary">Generate</button>
  <hr>
</form>
</div>

 <table class="table table-striped table-bordered table-hover" >
 <thead>
 <tr class="success" >
 <th>regno</th>
 <th>firstname</th>
 <th>lastname</th>
 <th>gender</th>
 <th>email</th>
 <th>tel</th>
 <th>others</th>
 <th>college</th>
 <th>school_of</th>
 <th>department</th>
 <th>year of graduation</th>
 <th>current insitution </th>
 <th>current position</th>
 </tr>
 </thead>

<?php
 
 if(isset($_POST['report'])){

    $year=$_POST['year'];
    $other=$_POST['other'];
    $gender=$_POST['gender'];
    $school=$_POST['school'];
    $position=$_POST['position'];

    


    
    if($year|| $other){
       $statement=displayStudent($year,$other, $gender, $school,$position);
      //  print_r($result);
          
        }
        ?> 
        <tbody>  

        <?php

      foreach($statement as $state) { ?> 
  <tr><td><?php echo ($state['RegNo']);?></td>
  <td><?php echo ($state['fname']);?></td>
  <td><?php echo ($state['lname']);?></td>
  <td><?php echo ($state['gender']);?></td>
  <td><?php echo ($state['email']);?></td>
  <td><?php echo ($state['telNo']);?></td>
  <td><?php echo ($state['others']);?></td>
  <td><?php echo ($state['college']);?></td>
  <td><?php echo ($state['school_of']);?></td>
  <td><?php echo ($state['department']);?></td>
  <td><?php echo ($state['year_of_graduation']);?></td>
  <td><?php echo ($state['current_insitution_belong']);?></td>
  <td><?php echo ($state['current_position']);?></td>
  </tr>

    <?php }?>
        </tbody>
        </table>  

     <?php }  ?>

</div>   
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@8.9.1/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" ></script>
</html>