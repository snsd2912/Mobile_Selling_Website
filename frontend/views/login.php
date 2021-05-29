<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'></script>
    <link rel="stylesheet" href="assets/sanglv11.css">
</head>
<body oncontextmenu='return false' class='snippet-body'>

    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto" > 
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                        <div class="row"> <img src="https://i.imgur.com/CXQmsmF.png" class="logo"> </div>
                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row mb-4 px-3">
                            <h6 class="mb-0 mr-4 mt-2">Sign in</h6>
                        </div>
                        <div class="row px-3 mb-4">
                            <!-- <div class="line"></div> <small class="or text-center">Or</small> -->
                            <div class="line"></div>
                        </div>
                        <!-- Login Form -->
                        <form method="post" action="index.php?controller=login&action=checkLogin">
                            <?php if(isset($_SESSION["error"])) { ?>
                                <div class="row px-3"> 
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm text-danger">Your email or password is incorrect</h6>
                                        <h6 class="mb-0 text-sm text-danger">&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                                        <h6 class="mb-0 text-sm text-danger">&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                                    </label>
                                </div>
                            <?php } ?>
                            <div class="row px-3"> 
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Email Address</h6>
                                </label> 
                                <input class="mb-4" type="email" name="email" placeholder="Enter a valid email address"> 
                            </div>
                            <div class="row px-3"> 
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Password</h6>
                                </label> 
                                <input type="password" name="password" placeholder="Enter password"> 
                            </div>
                            <div class="row px-3 mb-4">
                                <div class="custom-control custom-checkbox custom-control-inline"> 
                                    <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> 
                                    <label for="chk1" class="custom-control-label text-sm">Remember me</label> 
                                </div> 
                                <!-- <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a> -->
                            </div>
                            <div class="row mb-3 px-3"> 
                                <button type="submit" class="btn btn-blue text-center">Login</button> 
                            </div>
                            <div class="row mb-4 px-3"> 
                                <small class="font-weight-bold">Don't have an account? 
                                    <!-- <a id="" class="text-danger" href="#" data-toggle="modal" data-target="#registerModal">Register</a> -->
                                    <a id="registerbtn" class="text-danger" onclick="myFunction()">Register</a>
                                </small> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-blue py-4">
                <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 05-2021 sanglv11. All rights reserved.</small>
                    <!-- <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div> -->
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" id="registerModal">
        <!-- Register Form  -->
            <div class="modal-dialog modal-login" style="background-color: white; padding: 10px; border-radius: 10px;">
                <div class="modal-content" style="border:none">
                    <form id="form-add-product" method="post" action="index.php?controller=login&action=register">
                        <div class="modal-header" style="border-bottom: none !important;">
                            <h4 class="modal-title" style="float: left">Register</h4>
                            <span class="close" onclick="myClose()">&times;</span>
                        </div>
                        <div class="form-group">
                            <h6 class="mb-0 text-sm text-danger" id="message"></h6>
                        </div>
                        <div class="form-group">
                            <label style="float: left">Email</label>
                            <input type="email" name="email" class="form-control" required="required" autocomplete="off">
                        </div>
                        
                        <div class="form-group">
                            <label style="float: left">Fullname</label>
                            <input type="text" name="name" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label style="float: left">Address</label>
                            <input type="text" name="address" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label style="float: left">Phone Number</label>
                            <input type="text" name="phonenumber" class="form-control" required  pattern="0{1}[0-9]{9}" autocomplete="off">
                            <!-- pattern="0{1}[0-9]{9}" -->
                        </div>
                        <div class="form-group">
                            <label style="float: left">Username</label>
                            <input type="text" name="username" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <div class="clearfix">
                                <label style="float: left">Password</label>
                                <input type="password" name="password" class="form-control" required="required" autocomplete="off">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="submit" class="btn btn-primary bg-blue" value="Submit">
                        </div>
                    </form>
                </div>
            </div>                    
    </div>
<?php if(isset($_SESSION["message"])){
        echo "<script type='text/javascript'>var modal = document.getElementById('registerModal'); modal.style.display = 'block';</script>";
        if($_SESSION["message"]==1) { 
            echo "<script type='text/javascript'>document.getElementById('message').innerHTML = 'Register successfully';</script>";
        } else {
            echo "<script type='text/javascript'>document.getElementById('message').innerHTML = 'Your username or email have been taken';</script>";
        }
    } 
?>  
    <script>
        // Get the modal
        var modal = document.getElementById("registerModal");

        function myFunction() {
            modal.style.display = "block";
        } 

        function myClose() {
            modal.style.display = "none";
        } 

        $("#form-add-product").submit(function() {
            let form = $(this);
            let url = form.attr('action');

            $.ajax({
                type: "POST",
                url: res,
                data: form.serialize(),
                success: function (data){ 
                    
                }
            });
        });
    </script>
    
</body>
</html>