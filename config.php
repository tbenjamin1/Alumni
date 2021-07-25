<?php
error_reporting(E_ALL);
$db_user = "root";
$db_pass = "";
$db_name ="useraccounts";

//$db = new PDO ('mysql : host =localhost;dbname ='.$db_name .';charset = utf8' ,$db_user;$db_pass);
$db = new PDO('mysql:host=localhost;dbname=useraccounts', $db_user, $db_pass);
$db-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// try {
//     $db = new PDO('mysql:host=localhost;dbname=useraccounts', $db_user, $db_pass);
//     foreach($db->query('SELECT * from user') as $row) {
//         print_r($row);
//     }
//     $db = null;
// } catch (PDOException $e) {
//     print "Error!: " . $e->getMessage() . "<br/>";
//     die();
// }


?>