<?php

include 'Connect.php';
session_start();
if (isset($_POST["submit"])) {
    $username = $_POST["username"];   //username value from the form
    $ps=$_POST["password"];
    $password = md5($_POST["password"]);
    $st="pending";
    $un = "SELECT `username`,`password`,`status` FROM `tbl_login` WHERE username='$username'  and   password='$ps' or password='$password'";
    $r1 = mysqli_query($con, $un);
    $row = mysqli_fetch_array($r1);
    $rr1 = $row["username"];
    $rr2 = $row["password"];
    $rr3=$row["status"];
    if ($rr1 != $username && $rr2 != $password) {
        echo"<script>alert('Username or password is wrong ');</script>)";
    }
    elseif ($rr3==$st) {
    ?>
  <script>
        alert("unable to login");
                    </script>
                    <?php
}
    else {


        $q = "select * from tbl_login where username='" . $_POST["username"] . "' and status='approved' and  password='$ps' or password='$password' ";
        $res = mysqli_query($con, $q) or die("error");
        while ($fetch = mysqli_fetch_array($res)) {
            if ($fetch['role'] == 1) {
                $_SESSION['loginid'] = $fetch['loginid'];
                $_SESSION['role']=$fetch['role'];
                header("location:adminarea.php");
            }
            if ($fetch['role'] == 2) {
                if ($fetch['status'] == 'approved') {
                    $_SESSION['loginid'] = $fetch['loginid'];
                    ?>
                    <script>
                    window.location.href = "employeearea.php";
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert("unable to login");
                    </script>  
                    <?php
                }
            } else {
                echo"please check your username and password";
            }

            if ($fetch['role'] == 3)
                {
                $_SESSION['loginid'] = $fetch['loginid'];
                header("location:ownerarea.php");
            }
           if ($fetch['role'] == 4) {
                $_SESSION['loginid'] = $fetch['loginid'];
                header("location:renterarea.php");
            }
            
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="login/css/util.css">
<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
 <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

   
    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
  
    <div id="preloader">
        <div class="south-load"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="h-100 d-md-flex justify-content-between align-items-center">
                <div class="email-address">
                    <a href="mailto:contact@southtemplate.com">oakdale123@gmail.com</a>
                </div>
                <div class="phone-number d-flex">
                    <div class="icon">
                        <img src="img/icons/phone-call.png" alt="">
                    </div>
                    <div class="number">
                        <a href="tel:+45 677 8993000 223">9689437589</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="southNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index.html">OAK DALE APARTMENT</a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="index.php">Home</a></li>
<!--                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="#">Listings</a>
                                            <ul class="dropdown">
                                                <li><a href="listings.html">Listings</a></li>
                                                <li><a href="single-listings.html">Single Listings</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Blog</a>
                                            <ul class="dropdown">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Single Blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="elements.html">Elements</a></li>
                                    </ul>
                                </li>-->
                                <li><a href="about-us.html">About Us</a></li>
<!--                                <li><a href="listings.html">Properties</a></li>-->

<!--                                <li><a href="blog.html">Blog</a></li>-->
                                      <li><a href="login.php">Signin</a></li>
                                      <li><a href="#">Signup</a>
                                    <ul class="dropdown">
                                      <li><a href="ownerregister.php">Owner</a></li>
                                        <li><a href="renterreg.php">Renter</a></li>
                                        
<!--                                        <li><a href="#">Listings</a>
                                            <ul class="dropdown">
                                                <li><a href="listings.html">Listings</a></li>
                                                <li><a href="single-listings.html">Single Listings</a></li>
                                            </ul>
                                        </li>-->
<!--                                        <li><a href="#">Blog</a>
                                            <ul class="dropdown">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Single Blog</a></li>
                                            </ul>
                                        </li>-->
<!--                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="elements.html">Elements</a></li>-->
                                    </ul>
                                </li>
<!--                                <li><a href="#">Mega Menu</a>
                                    <div class="megamenu">
                                        <ul class="single-mega cn-col-4">
                                            <li class="title">Headline 1</li>
                                            <li><a href="#">Mega Menu Item 1</a></li>
                                            <li><a href="#">Mega Menu Item 2</a></li>
                                            <li><a href="#">Mega Menu Item 3</a></li>
                                            <li><a href="#">Mega Menu Item 4</a></li>
                                            <li><a href="#">Mega Menu Item 5</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li class="title">Headline 2</li>
                                            <li><a href="#">Mega Menu Item 1</a></li>
                                            <li><a href="#">Mega Menu Item 2</a></li>
                                            <li><a href="#">Mega Menu Item 3</a></li>
                                            <li><a href="#">Mega Menu Item 4</a></li>
                                            <li><a href="#">Mega Menu Item 5</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li class="title">Headline 3</li>
                                            <li><a href="#">Mega Menu Item 1</a></li>
                                            <li><a href="#">Mega Menu Item 2</a></li>
                                            <li><a href="#">Mega Menu Item 3</a></li>
                                            <li><a href="#">Mega Menu Item 4</a></li>
                                            <li><a href="#">Mega Menu Item 5</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li class="title">Headline 4</li>
                                            <li><a href="#">Mega Menu Item 1</a></li>
                                            <li><a href="#">Mega Menu Item 2</a></li>
                                            <li><a href="#">Mega Menu Item 3</a></li>
                                            <li><a href="#">Mega Menu Item 4</a></li>
                                            <li><a href="#">Mega Menu Item 5</a></li>
                                        </ul>
                                    </div>
                                </li>-->
                                <li><a href="contact.html">Contact</a></li>
                            </ul>

                            <!-- Search Form -->
                            <div class="south-search-form">
                                <form action="#" method="post">
                                    <input type="search" name="search" id="search" placeholder="Search Anything ...">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>

                            <!-- Search Button -->
                            <a href="#" class="searchbtn"><i class="fa" aria-hidden="true"></i></a>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                            <form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
                                            
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
                                                        <button class="login100-form-btn" name="submit">
								Login
							</button>
						</div>
					</div>
                                

                                <a class="txt2" href="mails/forgotpassword.php">
							Forgot password
						</a>
        
                        
<!--					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>

                                            <a class="txt2" href="register.php">
							Sign Up
						</a>
					</div>-->
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/bootstrap/js/popper.js"></script>
<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/daterangepicker/moment.min.js"></script>
<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="login/js/main.js"></script>
<!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <script src="js/classy-nav.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>
</html>
<?php
include 'footer.php';
?>