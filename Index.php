<!doctype html>
<html lang="en">
    <head>
    <title>FUNCTION-ORGANISER</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/jquery-1.9.1.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>

    <script type="text/javascript">
    
        $(document).ready(function() {

            $(document).ajaxStart(function() {
                $("#waitt").show();
            });

            $(document).ajaxStop(function() {
                $("#waitt").hide();
            });
             var f1=false,f2=false,f3=false,f4=false;
            $("#smobile").keyup(function() {
                var r = /^[7-9]{1}[0-9]{9}$/;
                var bool = r.test($("#smobile").val());

                if (bool == true) {
                    $("#smobile").css("border-color", "green");
                    f1=true;
                } else {
                    $("#smobile").css("border-color", "red");
                    f1=false;
                }
            });

            $("#spwd").blur(function() {
                if ($("#spwd").val() == "") {
                    $("#spwd").css("border-color", "red");
                    f2=false;
                } else {
                    $("#spwd").css("border-color", "green");
                    f2=true;
                }
            });


            $("#scpwd").keyup(function() {
                if ($("#scpwd").val() == "" || $("#scpwd").val() != $("#spwd").val()) {
                    $("#scpwd").css("border-color", "red");
                    f3=false;
                } else {
                    $("#scpwd").css("border-color", "green");
                    f3=true;
                }
            });

            $("#suid").blur(function() {
                $suid = $("#suid").val();
                if ($("#suid").val() == "") {

                    $("#suid").css("border-color", "red");
                    f4=false;
                } else {
                    $.get("ajax-check-suid.php?suid=" + $suid, function(data, status) {
                        $("#sres").html(data);
                        if (data == " Available")
                            {
                            $("#suid").css("border-color", "green");
                                f4=true;
                            }
                        else
                            {
                            $("#suid").css("border-color", "red");
                                f4=false;
                            }
                    });
                }
            });
            $("#forgot").click(function() {
                $luid = $("#luid").val();
                $.get("ajax-recover-details.php?luid=" + $luid, function(response) {
                    if (response == " Invalid id")
                        alert(response);
                    else {
                        //$("#lpwd").val(response);
                     /*   $msg="password: "+response;
                     $.get("sms-send.php?mobile="+mobile+"&msg="+$msg,function(response1){
                         alert("message sent");
                     });*/
                        alert("message sent");
                    }
                });
            });
            $("#signUp").click(function() {
                if(f1==false || f2==false || f3==false || f4==false)
                    alert("Fill correct details please...");
                else{
                $qs = $("#sfrm").serialize();
                $.get("ajax-signup-process.php?" + $qs, function(response) {
                    //$("#sresult").html(response);
                    alert(response);
                });
                }
            });
            $("#login").click(function() {
                $qs2 = $("#lfrm").serialize();
                $.get("ajax-login-process.php?" + $qs2, function(response) {
                    if(response==" Invalid id or Password")
                        {
                            alert(response);
                        }
                    
                     else{
                         if(response=="customer")
                             location.href="Customer-Dash.php";
                         else
                             location.href="vendorProfile.php";
                     }
                });
            });

        });
    </script>


    <style>
        #waitt {
            display: none;
        }
    </style>

</head>

<body style="background-image: url(pics/body-bg.jpg);background-attachment: fixed; background-size: 100% 100%;">
  
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  
   
        <div class="row">

            <div class="col-md-12" style="background-color:black">

                <center>
                    <br>

                    <div style="color:orange;font-size:50px;">
                        S G ORGANISERS
                    </div>

                    <br>
                </center>

            </div>

        </div>


        <div class="row">

            <div class="col-md-12 bg-danger" style="height:500px">

                <nav class="navbar navbar-expand-lg navbar-dark bg-danger">

                    <a class="navbar-brand" href="#">
    <img src="pics/Capture.PNG" width="60" height="60" class="d-inline-block align-top" alt="">
    S G ORGANISERS
  </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav mr-auto">

                            <li class="nav-item active">
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#signup-modal">Signup <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item active">
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#login-modal">Login<span class="sr-only">(current)</span></a>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About Us</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#db">Developed By</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#ug">Under Guidance</a>
                                </div>
                            </li>
                            
                             <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reach Us</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#lc">Location</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#fb">Facebook Page</a>
                                </div>
                            </li>

                        </ul>

                    </div>

                </nav>
                
                <div class="row justify-content-center height align-items-center" style="margin-top: 100px">
                        <div class="col-lg-8">
                            <div class="banner-content text-center">
                                <span class="text-white top text-uppercase">Re-imagining the way</span>
                                <h1 class="text-white text-uppercase">You Dream It, We Make It</h1>
                            </div>
                        </div>
                    </div>

            </div>
       </div>
       
       <div class="row bg-warning" >
          
           <div class="col-md-12">
               
               <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="pics/body.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="pics/image5.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="pics/image6.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  </div>             
              
           </div>
       
       
       <div class="container">    
            <div class="row " style="margin-top:20px;margin-bottom:20px;" >
                <div class="col-md-3">
                    <div class="card " >
                        <img class="card-img-top" src="pics/s1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">SURPRISES</h5>
                            <p class="card-text">Give the most beautiful present to your loved one so they never forget those special moments spent with you.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="card " >
                        <img class="card-img-top" src="pics/images%202.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">FAMILY TIME</h5>
                            <p class="card-text"> Spend your best time with your family  and relatives  who are imporatnt part of your life. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="card " >
                        <img class="card-img-top" src="pics/s2.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">FRIENDS</h5>
                            <p class="card-text">Make life long unforgetable memories with your crazy super special friends.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="card " >
                        <img class="card-img-top" src="pics/vendor3.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">LIFE MOMENTS</h5>
                            <p class="card-text">Make your memories more memorable and  beautiful for you and your near and dear ones.</p>
                        </div>
                    </div>
                </div>
            </div>
       
           
            <div class="row bg-warning" style="height:50px">
                <div class="col-md-12">
                   <center>
                    <h2>About Developers</h2>
                    </center>
                </div>
            </div>
            <div class="row bg-danger" style="color:white">
                <div class="col-md-6" id="db">
                  <center>
                   <h1>DEVELOPED BY</h1>
                    <img src="pics/FB_IMG_1481780853444.jpg" style="border:1px solid white;border-radius:50%;">
                    
                    <p><b>Shiwangi Garg (Angular-JS Web Developer)
                       Persuing B.E. from PEC, Chandigarh.Coding Enthusiast, interested in exploring new technologies.  </b></p>
                       </center>
                </div>
                <div class="col-md-6" style="background-color:black" id="ug">
                  <center>
                   <h1>UNDER THE GUIDANCE</h1>
                   <img src="pics/sir.PNG" style="border:1px solid white;border-radius:50%">
                   <p><b>Rajesh K. Bansal (SCJP-Sun Certified Java Programmer)
17 Years experience in Training & Development. Founder of realJavaOnline.com, loves coding in Java(J2SE, J2EE), C++,PHP, Python, AngularJS, Android.  
</b></p> </center>
                </div>
            </div>
          

     <div class="row bg-warning" style="height:50px;margin-top:20px">
                <div class="col-md-12">
                   <center>
                    <h2>Reach Us</h2>
                    </center>
                </div>
            </div>
            
            
       <div class="row" style="margin-bottom:20px;" >
          
           <div class="col-md-6 bg-danger" id="lc">
              <center>
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3447.8807337916123!2d74.95013941443247!3d30.211951281821598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391732a4f07278a9%3A0x4a0d6293513f98ce!2sBanglore+Computer+Education+(C+C%2B%2B+Android+J2EE+PHP+Python+AngularJs+Spring+Java+Training+Institute)!5e0!3m2!1sen!2sin!4v1531242173136"   frameborder="0" style="border:0;height:100%;width:100%" allowfullscreen></iframe>
               </center>
           </div>
           
           
           <div class="col-md-6 " style="background-color:black" id="fb" >
              <center>
               <div class="fb-page" data-href="https://www.facebook.com/SG-Organisers-2137544223237522/?modal=admin_todo_tour" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/SG-Organisers-2137544223237522/?modal=admin_todo_tour" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SG-Organisers-2137544223237522/?modal=admin_todo_tour">SG Organisers</a></blockquote></div>
               </center>
           </div>
       </div>
        
</div>

        <div class="modal fade" tabindex="-1" role="dialog" id="signup-modal">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header bg-danger">
                        <h5 class="modal-title text-white">Sign Up</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="pics/loading9.gif" id="waitt">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>

                    <div class="modal-body">

                        <form id="sfrm">

                            <div class="form-group">
                                <label for="formGroupExampleInput">User id</label><span id="sres">*</span>
                                <input type="text" class="form-control" id="suid" name="suid" placeholder="User id" required>
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Password</label>
                                <input type="password" class="form-control" id="spwd" name="spwd" placeholder="Password" required>
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Confirm-Password</label>
                                <input type="password" class="form-control" id="scpwd" placeholder="re-enter-Password" required>
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Mobile</label>
                                <input type="text" class="form-control" id="smobile" name="smobile" placeholder="mobile" required>
                            </div>

                            <div class="form-group">
                                <center>
                                    <input type="radio" id="vendor" name="user" value="vendor">Vendor
                                    <input type="radio" id="customer" name="user" value="customer" checked>Customer
                                </center>
                            </div>

                            <center><span class="text-primary" id="sresult"></span></center>

                            <div class="modal-footer bg-danger">
                                <button type="button" class="btn bg-white " name="signUp" id="signUp">SignUp</button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>


        <div class="modal fade" tabindex="-1" role="dialog" id="login-modal">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header bg-danger">
                        <h5 class="modal-title text-white">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>

                    <div class="modal-body">

                        <form id="lfrm">

                            <div class="form-group">
                                <label for="formGroupExampleInput">User id</label><span id="lres">*</span>
                                <input type="text" class="form-control" id="luid" name="luid" placeholder="User id" required>
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Password</label>
                                <input type="password" class="form-control" id="lpwd" name="lpwd" placeholder="Password" required>
                            </div>

                            <center><span class="text-primary" id="lresult"></span></center>

                            <div class="modal-footer bg-danger">
                                <button type="button" class="btn bg-white " name="forgot" id="forgot">Forgot Password</button>
                                <button type="button" class="btn bg-white " name="login" id="login">Login</button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    
    <?php include_once("footer.php") ?>
</body>
</html>