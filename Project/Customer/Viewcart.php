<?php

include "authguard.php";
include "../Shared/connection.php";
include "Menu.html";

$total=0;
$count=0;
$status=mysqli_query($conn,"select * from cart join products on cart.Pid=products.Pid where  userid=$_SESSION[userid]");

$sql_result2=mysqli_query($conn,"select * from products");
$dbrow2=mysqli_fetch_assoc($sql_result2);

while($dbrow1=mysqli_fetch_assoc($status)){
    $total=$total+$dbrow1['Offprice'];
    $count++;
    
    echo "<div class='page'>
    <div class='card'>
    <img class='img' src='$dbrow1[Ipath]'>
    <div class='Obj'>$dbrow1[Name]</div>
    <div class='price'>₹<p class='offer'>$dbrow1[Offprice] 
          </p><span class='offprice'>$dbrow1[Price]</span>
          <p class='offers'> $dbrow1[Offer]%OFF</p>
        </div>
    <div class='disp'>$dbrow1[detail]</div><br>
    <div class='action'>
    <a href='Deletecart.php?cartid=$dbrow1[cartid]'>
    <button class='button1'>Remove</button>
    </a>
    </div></div></div>
    ";    
};
echo "<div class='bottom_navbar'>                
      <div class='txt45'> 
      Total items : $count<br>
      Total Amount :₹ $total </div>
      <div class='placeorder_btn1'><a href='placeorder.php?userid=$_SESSION[userid]&Pid=$dbrow2[Pid]'>
      <button class='placebtn'> Place order  </button>
      </a>
      </div>
      </div>";

?>

<html>
    <head>
    <style>
      .page{
            display:inline-table;
                }
        .card {
            border-radius: 26px;
            background: linear-gradient(90deg, #3f2b96 0%, #a8c0ff 100%);
            box-shadow: 24px 24px 48px #c1c1c1, -24px 24px 48px #ffffff;
            padding: 12px;
            margin: 12px;
            width: 450px;
            height: 350px;
            display: inline-table;
            border-radius: 15px;
          }
          .img {
            border-radius: 12px;
            width: 100%;
            height: 350px;
          }
          
          .Obj {
            color: rgb(255, 252, 252);
            width: fit-content;
            font-size: x-large;
          }
          .disp {
            font-family: monospace;
          }
          .price {
            width: fit-content;
            color: rgb(0, 0, 0);
            font-size: large;
            font-weight: bolder;
            text-decoration: none;
          }

          .price:hover {
            text-decoration: "block";
          }

          .offer {
            display: none;
          }

          .offers {
            display: none;
          }

          .offprice {
            color: grey;
          }

          .card .offprice {
            text-decoration: line-through;
          }

          .card .offer {
            display: inline;
          }

          .card .offers {
            display: inline;
          }
          
            .button1{
            font-weight: 900;
            border-radius:5px;
            background-color:red;
          }
            .button2{
                font-weight: 900;
                border-radius:5px;
                background-color:green;
            }
            .sum{
                text-align:center;
                display:table;
                font-weight: 900;
                background-color:blue;
                width: 225px;
                border-radius: 35px;
          }
          .bottom_navbar{
            background: linear-gradient(to right,#EED3D9);
            margin-top:50px;
            height: 90px;
            bottom:0;
            border-radius: 15px;
            backdrop-filter: blur(5px);
            display: flex;
            justify-content: space-between; 
            align-items: center; 
            padding: 0 20px; 
            border: rgba(99, 99, 99, 0.767) 1px solid;
            box-shadow: 0px 0px 20px 2px #dfe9f3;
            bottom:0;
            }
            .txt45{
                color: rgb(130, 55, 62);
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                margin-right: 5px;
                text-decoration: none;
                padding: 10px;
                transition: 0.25s all ease-in;
            }
            .placeorder_btn1 button{
                height:40px;
                width:140px;
                border:none;
                font-size:large;
                border-radius:5px;
                background-color: #8B93FF;
                color:white;
                transition: 0.2s all ease-in-out;
            }
            .placeorder_btn1 button:hover{
                background-color:#5755FE;
                transform: scale(1.09);
            }
    </style>
  </head>
</html>