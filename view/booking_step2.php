<?php
require_once "../model/Login.php";
require_once "../model/Person.php";
require_once "../controller/PersonController.php";
$username = "";
$name = "";
$email = "";
$phone = "";
$password = "";
$address = "";

// for login=============================================================>
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = new Login($username,  $password);
    $result = loginPerson($login);

    if ($result !== null) {
        $_SESSION['username'] = $result->user_name;
        $_SESSION['name'] = $result->name;
        $_SESSION['email'] = $result->email;
        $_SESSION['phone'] = $result->phone;
        $_SESSION['password'] = $result->password;
        $_SESSION['address'] = $result->address;
        include_once "./errors/success.php";
    }
    if ($result === null) {
        include_once "./errors/wrong.php";
    }
}

// for register==========================================================>
if (isset($_POST['insertPerson'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $person = new Person($username, $name, $email, $phone, $password, $address);
    $result = insertPerson($person);

    if ($result == 1) {
        include_once "./errors/success.php";
    }
    if ($result == -1) {
        include_once "./errors/databaseError.php";
    }
    if ($result == 0) {
        include_once "./errors/wrong.php";
    }
}

// for logout============================================================>
if (isset($_POST['logoutPerson'])) {
    session_destroy();
    include_once "./errors/success.php";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Event Organizer</title>

    <link rel="shortcut icon" href="images/Favicon.ico">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/datepicker.css" rel="stylesheet" />
    <link href="css/loader.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Domine:400,700%7COpen+Sans:300,300i,400,400i,600,600i,700,700i%7CRoboto:400,500" rel="stylesheet">

</head>

<body class="inner-page">
    <div class="page">
        <header id="header">
            <div class="quck-link">
                <div class="container">
                    <div class="mail"><a href="MailTo:eventorganizer@gmail.com"><span class="icon icon-envelope"></span>eventorganizer@gmail.com</a></div>
                    <div class="right-link">
                        <ul>
                            <li><a href="register.php"><span class="icon icon-multi-user"></span>Become a Vendor</a>
                            </li>
                            <li class="registration"><a href="javascript:;" data-toggle="modal" data-target="#registrationModal">Registration</a></li>
                            <li><a href="javascript:;" data-toggle="modal" data-target="#loginModal">Login</a></li>
                            <li><a href="javascript:;" data-toggle="modal" data-target="#logoutModal">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <nav id="nav-main">
                <div class="container">
                    <div class="navbar navbar-inverse">
                        <div class="navbar-header">
                            <a href="index.php" class="navbar-brand"><img src="images/logo.png" alt="" style="max-width: 80px"></a>
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon1-barMenu"></span>
                                <span class="icon1-barMenu"></span>
                                <span class="icon1-barMenu"></span>
                            </button>

                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="single-col active">
                                    <a href="index.php">Home <span class="icon icon-arrow-down"></span></a>
                                </li>
                                <li>
                                    <a href="">Services <span class="icon icon-arrow-down"></span></a>
                                    <ul>
                                        <li><a href="services.php">Caterers</a></li>
                                        <li><a href="services.php">Mehndi</a></li>
                                        <li><a href="services.php">Decor &amp; Florists</a></li>
                                        <li><a href="services.php">Cakes</a></li>
                                        <li><a href="services.php">Wedding Planner</a></li>
                                        <li><a href="services.php">Gifts and Flowers</a></li>
                                        <li><a href="services.php">Make-up and Hair</a></li>
                                        <li><a href="services.php">Entertainment</a></li>
                                        <li><a href="services.php">Photographers/ Videographers</a></li>
                                        <li><a href="services.php">DJ</a></li>
                                        <li><a href="services.php">Wedding Cards</a></li>
                                    </ul>
                                </li>
                                <li class="single-col">
                                    <a href="">Pages <span class="icon icon-arrow-down"></span></a>
                                    <ul>
                                        <li><a href="search-result.php">listing Page</a></li>
                                        <li><a href="search_detail.php">Details Page</a></li>
                                        <li><a href="blog.php">Blog</a></li>

                                        <li><a href="news-details.php">News Details</a></li>
                                        <li>
                                            <a href="booking_step1.php">Booking Step <span class="icon icon-arrow-right"></span></a>
                                            <ul>
                                                <li><a href="booking_step1.php">Booking Step1</a></li>
                                                <li><a href="booking_step2.php">Booking Step2</a></li>
                                                <li><a href="booking_step3.php">Booking Step3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="career.php">Career</a></li>

                                        <li><a href="privacy_policy.php">Privacy Policy</a></li>
                                        <li>
                                            <a href="account_profile.php">My Account <span class="icon icon-arrow-right"></span></a>
                                            <ul>
                                                <li><a href="account_profile.php">Profile</a></li>
                                                <li><a href="account_booking.php">Orders</a></li>
                                                <li><a href="account_password.php">Change Password</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="team.php">Team</a></li>
                                        <li><a href="wishlist.php">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li><a href="faq.php">FAQ’s </a></li>
                                <li><a href="aboutUs.php">About Us</a></li>
                                <li><a href="contact.php">Contact us</a></li>
                            </ul>
                            <div class="search-box">
                                <div class="search-icon"><span class="icon icon-search"></span></div>
                                <div class="search-view">
                                    <div class="input-box">
                                        <form>
                                            <input type="text" placeholder="Search here">
                                            <input type="submit" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div class="modal modal-vcenter fade" id="loginModal" role="dialog">
            <div class="modal-dialog login-popup" role="document">
                <div class="modal-content">
                    <div class="close-icon" aria-label="Close" data-dismiss="modal"><img src="images/close-icon.png" alt=""></div>
                    <div class="left-img"><img src="images/login-leftImg.png" alt=""></div>
                    <div class="right-info">
                        <h1>Login</h1>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="input-form">
                                <div class="input-box">
                                    <div class="icon icon-user"></div>
                                    <input type="text" placeholder="Username" name="username" required>
                                </div>
                                <div class="input-box">
                                    <div class="icon icon-lock"></div>
                                    <input type="text" placeholder="Password" name="password" required>
                                </div>
                                <div class="submit-slide">
                                    <input type="submit" class="btn" name="login">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-vcenter fade" id="logoutModal" role="dialog">
            <div class="modal-dialog login-popup" role="document">
                <div class="modal-content">
                    <div class="close-icon" aria-label="Close" data-dismiss="modal"><img src="images/close-icon.png" alt=""></div>
                    <div class="left-img"><img src="images/login-leftImg.png" alt=""></div>
                    <div class="right-info">
                        <h1>Are you sure ? </h1>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="input-form">
                                <div class="submit-slide">
                                    <input type="submit" class="btn" name="logoutPerson">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-vcenter fade" id="registrationModal" tabindex="-1" role="dialog">
            <div class="modal-dialog registration-popup" role="document">
                <div class="modal-content" style="margin-top: 99px;">
                    <div class="close-icon" aria-label="Close" data-dismiss="modal"><img src="images/close-icon.png" alt=""></div>
                    <h1>New Member Registration</h1>
                    <div class="registration-form">
                        <div class="info">
                            <h2>Why to sign up</h2>
                            <ul>
                                <li>Exclusive discounts for all bookings</li>
                                <li>Full access all discounted prices</li>
                                <li>Dedicated wed-ordination for your event</li>
                                <li>Custom event planner for your event</li>
                            </ul>
                        </div>
                        <form method="POST" action="">
                            <div class="form-filde">
                                <div class="input-box">
                                    <input type="text" placeholder="Username" name="username" required>
                                </div>
                                <div class="input-box">
                                    <input type="text" placeholder="Name" name="name" required>
                                </div>
                                <div class="input-box">
                                    <input type="email" placeholder="Email ID" name="email">
                                </div>
                                <div class="input-box">
                                    <input type="text" placeholder="Phone" name="phone" required>
                                </div>
                                <div class="input-box">
                                    <input type="text" placeholder="Password" name="password" required>
                                </div>
                                <div class="input-box">
                                    <input type="text" placeholder="Address" name="address">
                                </div>
                                <div class="submit-slide">
                                    <input type="submit" class="btn" name="insertPerson">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="step-nav">
            <div class="container">
                <div class="inner-nav">
                    <ul>
                        <li class="first fill"><a href="booking_step2.php#"><span class="number">1</span><span class="text">Cart Summary</span></a></li>
                        <li class="active"><a href="booking_step2.php#"><span class="number">2</span><span class="text">Payment Details</span></a></li>
                        <li class="last"><a href="booking_step2.php#"><span class="number">3</span><span class="text">Order Confirm</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="bookin-info">
                    <div class="payment-detail">
                        <div class="totalPayment">
                            <div class="total">Total payment to be made : <span> $ 5,00,000</span></div>
                            <div class="oderId">Transaction ID : <span>1196760272</span></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="payment-opction">
                                    <ul>
                                        <li class="active"><a href="javascript:;" id="saveCard">Saved Details<span class="icon icon-arrow-right"></span></a></li>
                                        <li><a href="javascript:;" id="debitCard">Debit Card<span class="icon icon-arrow-right"></span></a></li>
                                        <li><a href="javascript:;" id="creditCard">Credit Card<span class="icon icon-arrow-right"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="payment-type saveCard-info">
                                    <div class="saveCard">
                                        <div class="card-row">Your Saved card<a href="booking_step2.php#">Remove
                                                card</a></div>
                                        <div class="card-slide">
                                            <div class="radio-row">
                                                <label class="label_radio" for="radio-01">
                                                    <input type="radio" name="sample-radio" id="radio-01" value="1">
                                                    <span class="card-name">State Bank of India <img src="images/visaCard-img.png" alt=""></span>
                                                    <span class="card-number">2025 XXXX XXXX 1234</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="cvv-input">
                                            <label>Enter CVV</label>
                                            <input type="password">
                                        </div>
                                        <div class="submit-slide">
                                            <input type="submit" value="Pay Now" class="btn">
                                            <a href="booking_step2.php#" class="cancle">Cancel</a>
                                        </div>
                                        <div class="note"><span class="icon icon-lock"></span>Your payment details are
                                            secured via 128 Bit encryption by Version</div>
                                    </div>
                                </div>
                                <div class="payment-type debitCard-info">
                                    <div class="debitCard">
                                        <div class="input-box">
                                            <label>Enter Debit Card Number</label>
                                            <input type="text">
                                            <div class="card-logo">
                                                <img src="images/visaCard-img.png" alt="">
                                                <img src="images/card-logo2.png" alt="">
                                                <img src="images/card-logo3.png" alt="">
                                                <img src="images/card-logo4.png" alt="">
                                            </div>
                                        </div>
                                        <div class="date-info">
                                            <div class="input-slide">
                                                <label>Expiry Date</label>
                                                <div class="month-select">
                                                    <select name="month_select" id="month_select" tabindex="1">
                                                        <option>MM</option>
                                                        <option>Jan</option>
                                                        <option>Feb</option>
                                                        <option>Mar</option>
                                                        <option>Apr</option>
                                                    </select>
                                                </div>
                                                <div class="month-select">
                                                    <select name="month_select" id="year_select" tabindex="1">
                                                        <option>YY</option>
                                                        <option>2006</option>
                                                        <option>2007</option>
                                                        <option>2008</option>
                                                        <option>2009</option>
                                                        <option>2010</option>
                                                        <option>2011</option>
                                                        <option>2012</option>
                                                        <option>2013</option>
                                                        <option>2014</option>
                                                        <option>2015</option>
                                                        <option>2016</option>
                                                        <option>2017</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="cvv-input">
                                                <label>CVV</label>
                                                <input type="password">
                                            </div>
                                        </div>
                                        <div class="save-detail">
                                            <label class="label_radio" for="radio-02"><input type="radio" name="sample-radio2" id="radio-02" value="1">Save this card for
                                                faster checkout</label>
                                        </div>
                                        <div class="submit-slide">
                                            <input type="submit" value="Pay Now" class="btn">
                                            <a href="booking_step2.php#" class="cancle">Cancel</a>
                                        </div>
                                        <div class="note"><span class="icon icon-lock"></span>Your payment details are
                                            secured via 128 Bit encryption by Version</div>
                                    </div>
                                </div>
                                <div class="payment-type creditCard-info">
                                    <div class="debitCard">
                                        <div class="input-box">
                                            <label>Enter Debit Card Number</label>
                                            <input type="text">
                                            <div class="card-logo">
                                                <img src="images/visaCard-img.png" alt="">
                                                <img src="images/card-logo2.png" alt="">
                                                <img src="images/card-logo5.png" alt="">
                                                <img src="images/card-logo6.png" alt="">
                                            </div>
                                        </div>
                                        <div class="date-info">
                                            <div class="input-slide">
                                                <label>Expiry Date</label>
                                                <div class="month-select">
                                                    <select name="month_select" id="month_select2" tabindex="1">
                                                        <option>MM</option>
                                                        <option>Jan</option>
                                                        <option>Feb</option>
                                                        <option>Mar</option>
                                                        <option>Apr</option>
                                                    </select>
                                                </div>
                                                <div class="month-select">
                                                    <select name="month_select" id="year_select2" tabindex="1">
                                                        <option>YY</option>
                                                        <option>2006</option>
                                                        <option>2007</option>
                                                        <option>2008</option>
                                                        <option>2009</option>
                                                        <option>2010</option>
                                                        <option>2011</option>
                                                        <option>2012</option>
                                                        <option>2013</option>
                                                        <option>2014</option>
                                                        <option>2015</option>
                                                        <option>2016</option>
                                                        <option>2017</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="cvv-input">
                                                <label>CVV</label>
                                                <input type="password">
                                            </div>
                                        </div>
                                        <div class="save-detail">
                                            <label class="label_radio" for="radio-03"><input type="radio" name="sample-radio3" id="radio-03" value="1">Save this card for
                                                faster checkout</label>
                                        </div>
                                        <div class="submit-slide">
                                            <input type="submit" value="Pay Now" class="btn">
                                            <a href="booking_step2.php#" class="cancle">Cancel</a>
                                        </div>
                                        <div class="note"><span class="icon icon-lock"></span>Your payment details are
                                            secured via 128 Bit encryption by Version</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-sm6 col-md-4 ">
                            <div class="footer-link">
                                <h5>Company</h5>
                                <ul>
                                    <li><a href="aboutUs.php">About Us</a></li>
                                    <li><a href="privacy_policy.php">Privacy Policy</a></li>
                                    <li><a href="career.php">Careers</a></li>
                                    <li><a href="blog.php">Blogs</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-md-4">
                            <div class="footer-contact">
                                <h5>Contact us</h5>
                                <div class="contact-slide">
                                    <div class="icon icon-location-1"></div>
                                    <p>Khilkhet, Nikunjo-2, Dhaka, Bangladesh </p>
                                </div>
                                <div class="contact-slide">
                                    <div class="icon icon-phone"></div>
                                    <p>01948510951</p>
                                </div>

                                <div class="contact-slide">
                                    <div class="icon icon-message"></div>
                                    <a href="MailTo:eventorganizer@gmail.com">eventorganizer@gmail.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-8 col-md-4">
                            <div class="contact-form">
                                <h5>Connect with us</h5>
                                <p>Connect with us so that u can get update news and offer. </p>

                                <div class="sosal-midiya">
                                    <ul>
                                        <li><a href="#"><span class="icon icon-facebook"></span></a></li>
                                        <li><a href="#"><span class="icon icon-twitter"></span></a></li>
                                        <li><a href="#"><span class="icon icon-linkedin"></span></a></li>
                                        <li><a href="#"><span class="icon icon-skype"></span></a></li>
                                        <li><a href="#"><span class="icon icon-google-plus"></span></a></li>
                                        <li><a href="#"><span class="icon icon-play"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <p>Copyright &copy; <span></span> - EventOrganizer | All Rights Reserved</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/owl.carousel.js"></script>
    <script type="text/javascript" src="js/jquery.selectbox-0.2.js"></script>
    <script type="text/javascript" src="js/jquery.form-validator.min.js"></script>
    <script type="text/javascript" src="js/placeholder.js"></script>
    <script type="text/javascript" src="js/coustem.js"></script>

</body>

</html>