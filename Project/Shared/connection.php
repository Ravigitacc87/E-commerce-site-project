<?php
require_once("auth.php");
$conn=mysqli_connect(Host,User,Password,database);
if($conn->connect_error){
   die("connection fail");
   } 
   ?>