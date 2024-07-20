<?php

include "authguard.php";
include "../Shared/connection.php";
include "Menu.html";


if(isset($_POST['s1'])){
  
  $status=mysqli_query($conn,"select * from cart");
  $row=mysqli_fetch_assoc($status);
  $Pid=$row['Pid'];
  

$sql_result=mysqli_query($conn,"INSERT INTO `placeorder`(userid,Pid) VALUES ($_SESSION[userid],$Pid)");
$sql_result1=mysqli_query($conn,"select * from cart join products on products.Pid=cart.Pid where userid=$_SESSION[userid]");
$sql_result2=mysqli_query($conn,"select * from products");
$dbrow1=mysqli_fetch_assoc($sql_result2);

$sum=0;
$count=0;

while($dbrow1=mysqli_fetch_assoc($sql_result1)){
     $sum=$sum+$dbrow1['Offprice'];
     $count++;      
    };

$adds=$_POST['adds'];
$mop=$_POST['mop'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$mysql=mysqli_query($conn,"INSERT INTO orders (`Orderid`,`name`,`email`,`phone`, `adds`, `mop`,`amount`,`count`)
 VALUES(NULL,'$name','$email','$phone', '$adds', '$mop','$sum','$count')");

if($mysql){
  echo"  <h1 class='ml11'>
  <span class='text-wrapper'>
  <span class='line line1'></span>
  <span class='letters'>Order Placed Successfully </span>
  </span>
  </h1>";
  header("refresh:3;url=Trackorder.php");
}else{
  echo mysqli_error($conn);
}
}
$sql_result1=mysqli_query($conn,"select * from cart join products on products.Pid=cart.Pid where userid=$_SESSION[userid]");

$sum=0;
$count=0;

while($dbrow1=mysqli_fetch_assoc($sql_result1)){
     $sum=$sum+$dbrow1['Offprice'];
     $count++;      
    };
echo"

<form action='Placeorder.php' method='post'>
<div class='body'>
<div class='container'>
<div class='brand-logo'></div>
    <div class='brand-title'>Your Profile</div>
      <div class='inputs'>
      <label>Name</label>
      <input type='text' placeholder='Enter your name' name='name' required><br>
      <label>Email</label>
      <input type='email' placeholder='Enter your Email address' name='email' required><br>
      <label>Phone No.</label>
      <input type='number' placeholder='Enter your mobile number' name='phone' required><br>
      <label>Delivery Address</label>
      <textarea name='adds' placeholder='Enter your complete Delivery address' required></textarea><br>
      <label >Payment Mode</label>
      <select name='mop' required>
          <option value=''>Select</option>
          <option value='UPI'>UPI</option>
          <option value='Cash on delivery'>COD</option>
      </select>
      </div>
      </div>
</div>
<div class='bottom_navbar'>
<div class='txt45' name=amount> 
Total items : $count <br>
Sum Amount :₹$sum </div>
<div class='txt'>You made a right choice! </div>
<button class='confirmorder_btn' name='s1'>Confirm Order</button>
</form>
</div>";

?>
<!DOCTYPE html>
    <head>
   
    <title>Place Order</title>
    <style>
                    .ml11 {
                        color:white;
                        display:flex;
                        justify-content:space-around;
                        align-item:center;
                        margin-top:350px;
                        margin-bottom:450px;
                font-weight: 700;
                font-size: 3.5em;
            }

            .ml11 .text-wrapper {
                position: relative;
                display: inline-block;
                padding-top: 0.1em;
                padding-right: 0.05em;
                padding-bottom: 0.15em;
            }

            .ml11 .line {
                opacity: 0;
                position: absolute;
                left: 0;
                height: 100%;
                width: 3px;
                background-color: #fff;
                transform-origin: 0 50%;
            }

            .ml11 .line1 { 
                top: 0; 
                left: 0;
            }

            .ml11 .letter {
                display: inline-block;
                line-height: 1em;
            }
         @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap');
      
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap');
   
   body{
       margin:0;
   }
  .body {
    margin:20px 0px 40px 40px ;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    place-items: center;
    font-family: poppins;
  }
  .container {
  position: relative;
  width: 470px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  }
  
  .brand-logo {
  height: 100px;
  width: 100px;
  background: url("../Shared/1.png");
  margin: auto;
  border-radius: 15%;
  box-sizing: border-box;
  box-shadow: 7px 7px 10px #cbced1, -7px -7px 10px white;
  }
  
  .brand-title {
  margin-top: 10px;
  font-weight: 900;
  font-size: 1.8rem;
  color: #1DA1F2;
  letter-spacing: 1px;
  }
  
  .inputs {
  text-align: left;
  margin-top: 30px;
  }
  .option {
  text-align: left;
  margin-top: 30px;
  }
  label,
  input,option,select,textarea,
  .button {
  display: block;
  width: 100%;
  padding: 0;
  border: none;
  outline: none;
  box-sizing: border-box;
  }
  
  label {
  margin-bottom: 4px;
  }
  
  label:nth-of-type(2) {
  margin-top: 12px;
  }
  
  input::placeholder {
  color: gray;
  }
  
  input,option,select,textarea {
  background: #ecf0f3;
  padding: 10px;
  padding-left: 20px;
  height: 50px;
  width:390px;
  font-size: 14px;
  border-radius: 50px;
  box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
  }
  
  .button {
  color: white;
  margin-top: 20px;
  background: #1DA1F2;
  height: 40px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
  transition: 0.5s;
  }
  
  .button:hover {
  box-shadow: none;
  color: #cbced1;
  }
  
  .bottom_navbar{
           background: linear-gradient(to right,#EED3D9);
           margin-top:50px;
           height: 90px;
           border-radius: 15px;
           backdrop-filter: blur(15px);
           display: flex;
           justify-content: space-between; 
           align-items: center; 
           padding: 0 20px; 
           border: rgba(99, 99, 99, 0.767) 1px solid;
           box-shadow: 0px 0px 20px 2px #dfe9f3;
           bottom:0;
           }
       .txt45{
           color: rgb(30, 95, 152);
           font-family: Verdana, Geneva, Tahoma;
           font-size:25px;
           }
           .txt{
           color: rgb(130, 55, 62);
           font-family: Verdana, Geneva, Tahoma, sans-serif;
           font-size: 35px;
           }
       .confirmorder_btn{
           height:40px;
               width:140px;
               border:none;
               font-size:large;
               border-radius:5px;
               background-color: #8B93FF;
               color:white;
               transition: 0.2s all ease-in-out;
       }
       .confirmorder_btn:hover{
           background-color:#5755FE;
           transform: scale(1.09);
       }
       .txt::after{
           content:"🎉";
       }
       
    </style>
    </head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
</body>
<script>
    var textWrapper = document.querySelector('.ml11 .letters');
  textWrapper.innerHTML = textWrapper.textContent.replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>");

  anime.timeline({loop: true})
    .add({
      targets: '.ml11 .line',
      scaleY: [0,1],
      opacity: [0.5,1],
      easing: "easeOutExpo",
      duration: 700
    })
    .add({
      targets: '.ml11 .line',
      translateX: [0, document.querySelector('.ml11 .letters').getBoundingClientRect().width + 10],
      easing: "easeOutExpo",
      duration: 700,
      delay: 100
    }).add({
      targets: '.ml11 .letter',
      opacity: [0,1],
      easing: "easeOutExpo",
      duration: 600,
      offset: '-=775',
      delay: (el, i) => 34 * (i+1)
    }).add({
      targets: '.ml11',
      opacity: 0,
      duration: 1000,
      easing: "easeOutExpo",
      delay: 1000
    });
  </script>
</html>