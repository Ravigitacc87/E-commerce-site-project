<html>
 <head>
   <style>
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
        transition: ease-in-out 2s;
      }
      .img {
        border-radius: 12px;
        width: 100%;
        height: 350px;
        filter: grayscale(0%);
        transition: all 3s;
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
        transition: all 2s ease;
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
        transition: all 1s;
      }

      .card:hover .offprice {
        text-decoration: line-through;
        transition: all 1s;
      }

      .card:hover .offer {
        display: inline;
      }

      .card:hover .offers {
        display: inline;
      }
      .action button{
        font-weight: 900; 
        border-radius:15px;
        background-color:yellow;
      }

    </style>
   </head>
</html>
<?php
include "authguard.php";
include "Menu.html";
include_once "../Shared/connection.php";

    $result_sql=mysqli_query($conn,"select * from products");

   while($dbrow1=mysqli_fetch_assoc($result_sql))
   {
        echo "
        <div class='card'>
        <img class='img' src='$dbrow1[Ipath]'>
        <div class='Obj'>$dbrow1[Name]</div>
        <div class='price'>₹<p class='offer'>$dbrow1[Offprice] 
              </p><span class='offprice'>$dbrow1[Price]</span>
              <p class='offers'> $dbrow1[Offer]%OFF</p>
            </div>
        <div class='disp'>$dbrow1[detail]</div><br>
        <div class='action'>
        <a href='Addcart.php?Pid=$dbrow1[Pid]'>
        <button>Add to Cart</button>
        </a>
        </div>
        </div>
        ";
   }
?>