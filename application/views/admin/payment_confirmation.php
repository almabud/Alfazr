<!DOCTYPE html>
<html lang="en">
    <head>
   <style>
       .header_img{
         height:200px;
       }
       .content{
        background-color: white;
       }
       #mail_body{
        width: 100% !important;
        padding:10px;
        margin-bottom: 15px;
        background: #fafafa;
       }
       #mail_header h1{
        margin-bottom: -5px;
       }
       #logo{
        text-align: center;
        width: 100%;
       }
         p{
             font-size: 16px;
         }
      
       </style>
   </head>

    <body>
        <div class="content">
            <div id="logo"> 
                    <img class="header_img" src="cid:<?php echo $cid; ?>" alt="Image"/>
            </div>  
            <div id="mail_body">
                    <div id="mail_header">
                        <h1>Payment confirmation.</h1>
                    </div>
                    <hr>
                    <div id="mail_body">
                            <p>
                              <?php echo $msg; ?>
                            </p>
                    </div>
            </div>

      </div>

    </body>
</html>