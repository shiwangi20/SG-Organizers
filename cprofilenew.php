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
    <script type="text/javascript">
        function showpreview(file) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#prev').attr('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }

        $(document).ready(function() {
            
                $cid = $("#cid").val();
                $.getJSON("json-cfetch.php?cid=" + $cid, function(jsonArray) {
                    //alert(jsonArray);
                    if (jsonArray.length != 0) {
                        $("#cid").val(jsonArray[0].cid);
                        $('#prev').attr('src', jsonArray[0].picpath);
                        $('#hdn').val(jsonArray[0].picpath);
                        //alert($("#hdn").val());
                        $('#cfname').val(jsonArray[0].fname);
                        $('#clname').val(jsonArray[0].lname);
                        $('#cmobile').val(jsonArray[0].mobile);
                        $('#cemail').val(jsonArray[0].email);
                        $('#cpro').val(jsonArray[0].profession);
                        $('#cpwd').val(jsonArray[0].pwd);
                        $('#ccity').val(jsonArray[0].city);
                        $('#cstate').val(jsonArray[0].state);
                        $('#czip').val(jsonArray[0].zip);
                        $('#save').prop('disabled',true);
                        $('#update').prop('disabled',false);
                    } 
                });


        });

    </script>

</head>

<body  >
    
        <?php include_once("header.php") ?>
       <div class="row">

        <div class="col-md-12 " style="background-color:black">

            <center>

                <div style="color:orange;font-size:50px;">
                    PROFILE
                </div>


            </center>

        </div>

    </div>
        
<div class="container">
        <div class="row ">
            <div class="col-md-1 "></div>
            <div class="col-md-10 bg-danger text-white"  style="border:5px orange solid">
                <br><br>
                
                
                <form class="needs-validation" action="cprofilenew-submit.php" method="post" enctype="multipart/form-data" id="frm">
                   
                     <input type="hidden" id="hdn" name="hdn">
                     
                    <center>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltipProfilePic">Pic</label>
                            <div class="input-group" style="width:100px;height:100px">
                                <img alt="image" id="prev" class="img-thumbnail">
                            </div>
                        </div>
                    </center>
                    
                    <div class="form-row">
                       
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipUsername">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                </div>
                                <input type="text" class="form-control" id="cid" name="cid" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required value="<?php echo $_SESSION['uid']; ?>" readonly>
                                <div class="invalid-tooltip">
                                    Please choose a unique and valid username.
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipPic">Profile Pic</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="cpic" name="cpic" onchange="showpreview(this)" >
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>
                        </div>
                        
                       
                    </div>
                    
                    <div class="form-row">
                       
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltip01">First name</label>
                            <input type="text" class="form-control" id="cfname" name="cfname" placeholder="First name" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltip02">Last name</label>
                            <input type="text" class="form-control" id="clname" name="clname" placeholder="Last name" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                    </div>
                    
                    <div class="form-row">
                       
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipMobile">Mobile</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cmobile" name="cmobile" placeholder="Mobile" aria-describedby="validationTooltipUsernamePrepend" required pattern=[7-9]{1}[0-9]{9}$>
                                <div class="invalid-tooltip">
                                    Please choose a valid mobile number.
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipProfession">Profession</label>
                            <div class="form-group">
                                <select class="custom-select" id="cpro" name="cpro" required>
                                  <option value="">Select Your Profession</option>
                                  <option value="Job">JOB</option>
                                  <option value="Business">BUSINESS</option>
                                </select>
                                <div class="invalid-feedback">Example invalid custom select feedback</div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-row">
                       
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="cemail" name="cemail" placeholder="Email" required>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" id="cpwd" name="cpwd" placeholder="Password" required>
                        </div>
                        
                    </div>

                    <div class="form-row">
                       
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip03">City</label>
                            <input type="text" class="form-control" id="ccity" name="ccity" placeholder="City" required>
                            <div class="invalid-tooltip">
                                Please provide a valid city.
                            </div>
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip04">State</label>
                            <input type="text" class="form-control" id="cstate" name="cstate" placeholder="State" required>
                            <div class="invalid-tooltip">
                                Please provide a valid state.
                            </div>
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip05">Zip</label>
                            <input type="text" class="form-control" id="czip" name="czip" placeholder="Zip" required>
                            <div class="invalid-tooltip">
                                Please provide a valid zip.
                            </div>
                        </div>
                        
                    </div>

                    <button class="btn btn-white" type="submit" name="btn" id="save" value="save">Save</button>
                    <button class="btn btn-white" type="submit" name="btn"id="update" value="update" disabled>Update</button>
                    <div class="form-row" style="margin-top:20px"></div>
                    
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
        </div>
        <?php include_once("footer.php") ?>
    
</body>
