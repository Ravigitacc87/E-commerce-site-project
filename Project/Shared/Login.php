<?php
session_start();
$_SESSION["login"]==false;

if(isset($_POST["s1"])){
  include_once "connection.php";
$email=$_POST['email'];
$pass=md5($_POST['password1']);
$usertype=$_POST['usertype'];

if(($usertype=='Vendor')){
  $sql="SELECT * FROM `vendor` where `email`='$email' and `password1`='$pass'";
  
  $result= mysqli_query($conn,$sql) or die("error in query".mysqli_error($conn));  
  
  
  $dbrow=mysqli_fetch_assoc($result);
  if($result){
    $row=mysqli_fetch_array($result);
    
    $password1=md5($_POST['password1']);
  } 
  $cnt=mysqli_affected_rows($conn);        
  mysqli_close($conn);
  if($cnt==1)
  {
    $_SESSION["login"]=true;
    $_SESSION['usertype']=$dbrow['usertype'];
    $_SESSION['userid']=$dbrow['userid'];
    
    header("location:../Vendor/Home.php");
  }
  else
  {
    echo"<script> alert('Password Incorrect');</script>";
    header("refresh:0;url=Login.html");
  } 
}
elseif($usertype=='Customer'){
  $sql="SELECT * FROM `customer` where `email`='$email' and `password1`='$pass'";
  
  $result= mysqli_query($conn,$sql) or die("error in query".mysqli_error($conn));   
  
  $dbrow=mysqli_fetch_assoc($result);
  
  if($result){
    $row=mysqli_fetch_array($result);
    
    $password1=md5($_POST['password1']);
  } 
  $cnt=mysqli_affected_rows($conn);        
  mysqli_close($conn);
  if($cnt==1)
  {
    $_SESSION["login"]=true;
    $_SESSION['usertype']=$dbrow['usertype'];
    $_SESSION['userid']=$dbrow['userid'];
    header("location:../Customer/Home.php");
  }
  else
  {
    echo"<script> alert('Password Incorrect');</script>";
    header("refresh:0;url=Login.html");
  }}}
  ?>