<?php
$conn=OpenCon();
echo "connected Successfully";

function OpenCon()
 {
 $dbhost = "localhost:4000";
 $dbuser = "root";
 $dbpass = "admin";
 $db = "sakila";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>