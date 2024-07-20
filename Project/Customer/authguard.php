<?php
session_start();

if($_SESSION['login']==false){
    echo "<div style='background: linear-gradient(50deg, grey, rgb(0, 0, 0), grey, rgb(0, 0, 0), grey);
     height:465px; padding-top:300px'>
    <h1 style='display: flex; justify-content:space-around;'>Unauthorized Access 401</h1> 
    <i style='display: flex; justify-content:space-around;'>Please check again.... </i></div>";
    die;
}

if($_SESSION['usertype']!="Customer"){
    echo "<div style='background: linear-gradient(50deg, grey, rgb(0, 0, 0), grey, rgb(0, 0, 0), grey);
     height:465px; padding-top:300px'>
    <h1 style='display: flex; justify-content:space-around;'>Forbidden Access 403</h1>
    <i style='display: flex; justify-content:space-around;'>Please check again.... </i></div>";
    die;
}
?>
