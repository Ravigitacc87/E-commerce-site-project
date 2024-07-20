<?php
include_once "authguard.php";
include "Menu.html";
echo"<br>";
?>


<!DOCTYPE html>
<head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap');
   
    
   .body {
     margin:20px 0px 40px 0px ;
     display: flex;
     align-items: center;
     text-align: center;
     justify-content: center;
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
   background: url("box.png");
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
  </style>
</head>

<body>
<div class="body">
  <form action="Upload.php" enctype="multipart/form-data" method="post">
    <div class="container">
      <div class="brand-logo"></div>
      <div class="brand-title">Add Products</div>
      <div class="inputs">
        <label>Name of Product</label>
        <input type="text" placeholder="Name of the Product" required name="Name"/><br>
        
        <label>Price of Product</label>
        <input type="number" placeholder="Price of Product" required name="Price" /><br>
        
        <label>Offer on Product</label>
        <input type="number" placeholder="Offer on Product" required name="Offer" /><br>
        
        <label>Off-Price of Product</label>
        <input type="number" placeholder="Off-Price of Product" required name="Offprice" /><br>
        
        <label>Discription of Product</label>
        <input type="text" placeholder="Discription of the Product" required name="Detail"/><br>
        
        <label>Image of Product</label>
        <input type="file" placeholder="Product Image" name="Ipath"required accept=".jpg,.png,.jpeg"/><br>

        <button class="button">Add Products</button>

      </div>
    </div>
  </form>
</div>
</body>

</html>