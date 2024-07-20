
<?php
include "authguard.php";
include "Menu.html";

print_r($_POST);
echo"<br>";

print_r($_FILES ['Ipath']['tmp_name']);

$source_path=$_FILES['Ipath']['tmp_name'];

$target_path="../Shared/images/".$_FILES['Ipath']['name'];

move_uploaded_file($source_path,$target_path);

 include_once "../Shared/connection.php";

 $status=mysqli_query($conn,"insert into products (Name,Price,Offprice,Offer,Detail,Ipath,owner)
 values('$_POST[Name]','$_POST[Price]','$_POST[Offprice]','$_POST[Offer]','$_POST[Detail]','$target_path',$_SESSION[userid])");

 if($status){
    header('location:View.php');
 }
 else{
    echo mysqli_error($conn);
 }

?>