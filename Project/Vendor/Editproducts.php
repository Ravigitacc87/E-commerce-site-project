<?php

    include "authguard.php";
    include "../Shared/connection.php";
    include "Menu.html";

    $id=$_GET['Pid'];
    $result = trim($id, "'");

    $sql="SELECT * FROM products WHERE Pid = $result";

    $status=mysqli_query($conn,$sql);

    $dbrow= mysqli_fetch_assoc($status);
    if(isset($_POST['s1'])){

      $sqli="UPDATE `products` SET `Name`='$dbrow[Name]',`Price`='$dbrow[Price]',
      `Offprice`='$dbrow[Offprice]',`Offer`='$dbrow[Offer]',`detail`='$dbrow[detail]',`Ipath`='$dbrow[Ipath]' WHERE `Pid` = $result";

      $update=mysqli_query($conn,$sqli);
    if($update){
      header("location:View.php");
    }else{
      echo mysqli_error($conn);
    }}
    if(isset($_POST['s2'])){
      $sql="UPDATE `products` SET `Name`='',`Price`='',
      `Offprice`='',`Offer`='',`detail`='',`Ipath`='' WHERE `Pid` = $result";
      $cancle=mysqli_query($conn,$sql);
      if($cancle){
      header("refresh:0;url=View.php");
    }else{
      echo mysqli_error($conn);
    }
  }
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
                <div class="brand-title">Edit Products</div>
                <div class="inputs">
                    <label>Name of Product</label>
                    <input type="text" placeholder="Name of the Product" value='<?php echo $dbrow['Name']?>' name="Name"/><br>
                    
                    <label>Price of Product</label>
                    <input type="number" placeholder="Price of Product" require value='<?php echo $dbrow['Price']?>' name="Price" /><br>
                    
                    <label>Offer on Product</label>
                    <input type="number" placeholder="Offer on Product" value='<?php echo $dbrow['Offer']?>' name="Offer" /><br>
                    
                    <label>Off-Price of Product</label>
                    <input type="number" placeholder="Off-Price of Product" value='<?php echo $dbrow['Offprice']?>' name="Offprice"  /><br>
                    
                    <label>Discription of Product</label>
                    <input type="text" placeholder="Discription of the Product" value='<?php echo $dbrow['detail']?>' name="Detail"/><br>
                    
                    <label>Image of Product</label>
                    <input type="file" placeholder="Product Image" value='<?php echo $dbrow['Ipath']?>' name="Ipath" accept=".jpg,.png,.jpeg"/><br>


                    <button class="button" name="s1">Edit Products</button>
                    <button class="button" name="s2">Cancle</button>

                </div>
        </div>
    </form>
    </div>
</body>
</html>

