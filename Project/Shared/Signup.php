<?php
if(isset($_POST["s1"])){
include_once "connection.php";
   $email=$_POST['email'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$usertype=$_POST['usertype'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$pass=md5($password1);

if(($password1!=$password2)){
  echo"<script> alert('Password not matched');</script>";
  header("refresh:0;url=Signup.html");
}
else{
  if(($usertype=='Vendor')){
    $sql="INSERT INTO `vendor` (`userid`, `email`, `password1`,  `usertype`, `address`, `gender`) VALUES (NULL, '$email', '$pass', '$usertype',  '$address',  '$gender')";

    if($conn->query($sql)==true){ 
      echo "";
    }
      else { echo
    "connection failed"; 
    }
    
     $conn->close(); 
     header("location:Login.html");
  }else{
  $sql="INSERT INTO `customer` (`userid`, `email`, `password1`,  `usertype`, `address`, `gender`) VALUES (NULL, '$email', '$pass','$usertype',  '$address',  '$gender')";

if($conn->query($sql)==true){ 
  echo "";
}
  else { echo
"connection failed"; 
}

 $conn->close(); 
 header("location:Login.html");
}}}
?>