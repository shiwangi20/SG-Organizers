<?php include_once("session.php") ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/jquery-1.9.1.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <title>Customer Dashboard</title>
    <style>
       .cuscards{
            transform:ease all 2s;
        }
        .cuscards:hover{
            transform:scale(1.05);
            transform:ease all 2s;
        }

    </style>
</head>

<body style="background-color:azure;">
   
       <?php include_once("header.php") ?>
        

       <div class="row " style="background-color:black">

            <div class="col-md-12 " style="margin-top:10px;margin-bottom:10px;color:orange">
                <center>
                    <h2>CUSTOMER DASHBOARD</h2>
                </center>
               
            </div>

        </div>
        
        <div class="container" style="border:5px orange solid">
        <div class="row bg-danger"  >
        <div class="col-md-12">
            <br><br>
        </div>
        </div>
        
        <div class="row bg-danger" >
           
            <div class="col-md-4 ">

                <a href="findVendors.php" style="text-decoration:none;color:white">

                    <div class="card "  style="background-color:inherit;border-width: 0px">
                        <img class="card-img-top cuscards" src="pics/s2.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">FIND VENDORS</h5>
                            <p class="card-text">Hi! We welcome you. Here you can find all the information related to events and best vendors providing those services in your city.</p>
                        </div>

                    </div>

                </a>

            </div>

            <div class="col-md-4" >
                <a href="cprofilenew.php" style="text-decoration:none;color:white">

                    <div class="card" style="background-color:inherit;border-width: 0px">
                        <img class="card-img-top cuscards" src="pics/body-bg.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">PROFILE</h5>
                            <p class="card-text">Hi! We welcome you. Here You can update your profile for better results in future.</p>
                        </div>

                    </div>

                </a>

            </div>

            <div class="col-md-4">

                <a href="wishlist.php" style="text-decoration:none;color:white">

                    <div class="card" style="background-color:inherit;border-width: 0px">
                        <img class="card-img-top cuscards" src="pics/s3.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">WISHLIST</h5>
                            <p class="card-text">Hi! We welcome you. Here you can find your favourite vendors and contact them for their services.</p>
                        </div>

                    </div>

                </a>

            </div>
        </div>
        </div>
       <?php include_once("footer.php") ?>
</body>

</html>
