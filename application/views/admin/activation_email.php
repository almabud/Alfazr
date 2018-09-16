<!DOCTYPE html>
<html lang="en">
    <head>
   <style>
       .header_img{
         height:200px;
       }
       .content{
        background-color: #fafafa;
        padding:10px;
       }
       #mail_body{
        width: 100% !important;
       }
       #mail_header h1{
        margin-bottom: -5px;
       }
       #logo{
        text-align: center;
        width: 100%;
       }
       .btn {
        background-color: #6a1b9a;
        border: none;
        color: white !important;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 18px;
        font-weight: bolder;
        margin: 4px 2px;
        border-radius: 5px;
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
                        <h1>Confirm Your Email</h1>
                    </div>
                    <hr>
                    <div id="mail_body">
                            <p>
                            Your account has been created succesfully.
                            For activating your account click on button below.
                            </p>
                        <a class="btn" href="<?php echo $url;?>"> Confirm Email</a>
                    </div>
            </div>

      </div>

    </body>
</html>