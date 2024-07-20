<?php

    include "authguard.php";
    include "../Shared/connection.php";
    include "Menu.html";

    $id=$_GET["Pid"];
    $result = trim($id, "'");


    $result_sql=mysqli_query($conn,"delete from products where Pid=$result");

    if($result_sql){
        echo" <h1 class='ml11'>
        <span class='text-wrapper'>
          <span class='line line1'></span>
          <span class='letters'>Product Deleted Successfully!</span>
        </span>
      </h1>";
        header("refresh:6;url=View.php");
    }
    else{
        echo mysqli_error($conn);
    }

?>
<html>
    <head>
        <style>
              .ml11 {
                color:white;
                display:flex;
                justify-content:space-around;
                align-items: center;
                margin-top:350px;
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