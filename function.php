<?php
function displayStudent($y,$o, $g, $c,$p) {
  
  global $db;

    $statement=$db->prepare("SELECT * FROM alumntabele WHERE year_of_graduation= :year OR 	others= :other OR
    gender= :gender  OR school_of= :school OR current_position= :position");

    $statement->bindValue(':year',$y); 
    $statement->bindValue(':other',$o);
     $statement->bindValue(':gender',$g);
   
    $statement->bindValue(':school',$c);   
      $statement->bindValue(':position',$p);  

      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      // print_r($result);

      return $result;
}

?>