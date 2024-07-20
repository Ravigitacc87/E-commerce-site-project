<?php

include "authguard.php";
include "../Shared/connection.php";
include "Menu.html";

 $table1=mysqli_query($conn, "SELECT * FROM orders");
 $db1=mysqli_fetch_assoc($table1);
 $table2=mysqli_query($conn,"select * from placeorder join products on placeorder.Pid=products.Pid where  userid=$_SESSION[userid]");
  $db2=mysqli_fetch_assoc($table2);
 $table3=mysqli_query($conn,"select * from placeorder join orders on placeorder.orderid=orders.Orderid where  userid=$_SESSION[userid]");
  $db3=mysqli_fetch_assoc($table3);


echo " <div>
<table style='background-color: rgb(224, 249, 249,0.321);width: 100%;height: 180px;margin-top: 12px;border-radius: 35px;'>
    <tr style='text-align: left;'>
    <th style='color: rgb(0, 0, 0);padding-left:22px;'><p style='text-decoration: underline;'>Delivery Address</p>
    <p>$db3[name]</p>
    </th>
    <th style='text-decoration: underline;'>Invoice</th>
    </tr>
    <tr>
    <td style='color: rgb(0, 0, 0);padding-left:22px;'><p>$db3[adds]</p>
    <p>$db3[email]</p>
    <p>+91 $db3[phone]</p>
    </td>
    
    <td><a href='#'><i class='fa-sharp fa-solid fa-file-word fa-2xl'></i></a><br><br>
        <span> Customer order Invoice </span><a href='#'>Upload Here</a></td>
</tr>
</table>
<table style='background-color: rgb(224, 249, 249 ,0.321);width: 100%;height: 420px;margin-top: 12px;border-radius: 35px;'>
   <tr>
        <th style='text-decoration: underline;'>Product Image</th>
        <th style='text-decoration: underline;'>Products Name:</th>
        <th style='text-decoration: underline;'>Delivery Process:</th>
    </tr>
    <tr style='text-align:center;'>
        <td><img src='$db2[Ipath]' width='340px' height='320px'></td>
        <td>
        <p style='font-weight: bolder; font-size: large;'>Name of the product: $db2[Name]</p>
        <p style='font-weight: bolder; font-size: large;'> Mode of payment: $db3[mop]</p>
        <p style='font-weight: bolder; font-size: large;'> Total amount of product: ₹ $db3[amount]</p>
        </td>
        <td>
            <p style='font-weight: bolder; font-size: large;'>Order Confirmed <i class='fa-solid fa-check fa-lg' style='color: #63e69e;'></i></p><br>
            <p style='font-weight: bolder; font-size: large;'>Shipped <i class='fa-solid fa-spinner fa-spin-pulse fa-lg' style='color: #020202;'></i></p><br>
            <p style='font-weight: bolder; font-size: large;'>Out for delivery</p><br>
            <p style='font-weight: bolder; font-size: large;'>Delivered</p>
        </td>
    </tr>
</table>
</div>";

?>