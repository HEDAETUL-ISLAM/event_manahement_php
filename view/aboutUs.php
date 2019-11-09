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

<body>
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

        <section class="page-header">
            <div class="container">
                <h1>about us</h1>
            </div>
        </section>
        <section class="content">
            <div class="container">
                <div class="home-event">
                    <div class="heading">
                        <div class="icon"><em class="icon icon-heading-icon"></em></div>
                        <div class="text">
                            <h2>Welcome to our website</h2>
                        </div>
                        <div class="info-text">All the information you will need is listed below, just click on the page
                            you want to view and that's it.</div>
                        <div class="stickLine"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                    architecto beatae vitae dicta sunt explicabo. </p>
                                <p>Nullam elementum nisi eget mi mollis laoreet. Morbi non dignissim tellus, vitae
                                    blandit urna Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi non
                                    dignissim.Nullam elementum nisi eget mi mollis laoreet. Morbi non dignissim tellus,
                                    vitae blandit urna Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi non
                                    dignissim.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="aboutUs">
            <div class="ourText">
                <h2>Lorem Ipsum <span>dummy</span> text</h2>
                <p>A them above good above i creeping all don’t living together let kind. Void beginning set said days
                    beginning moveth night fifth fill. Created likeness made saying third she’d don’t saw, she’d
                    creeping subdue firmament stars a was for seed cattle without winged. Itself isn’t from god lesser
                    their fourth image first greater it fifth moving after to upon from our gathering fowl. Were isn’t
                    air fruit let midst first, fill shall evening make from very. Sea it greater day image which, night
                    rule him made waters saying form. Living of replenish without fruitful above Signs the image him
                    land gathering all.</p>
                <a href="aboutUs.php#">Read More</a>
            </div>
            <div class="ourImg">
                <img src="images/about-us/aboutUs.jpg" alt="about us" />
            </div>
        </section>
        <section class="visionGoals">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Our Vision</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam elementum nisi eget mi mollis
                            laoreet. Morbi non dignissim tellus, vitae blandit urna Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit morbi non dignissim. Nullam elementum nisi eget mi mollis
                            laoreet. Morbi non dignissim tellus, vitae blandit urna Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit morbi non dignissim.</p>
                        <p>Nullam elementum nisi eget mi mollis laoreet. Morbi non dignissim tellus, vitae blandit urna
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi non dignissim.</p>
                    </div>
                    <div class="col-sm-6">
                        <h2>Core Goal</h2>
                        <ul class="customList">
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Nullam elementum nisi eget mi mollis laoreet. </li>
                            <li>Morbi non dignissim tellus, vitae blandit urna Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit morbi non dignissim. </li>
                        </ul>
                        <ul class="customList">
                            <li>Nullam elementum nisi eget mi mollis laoreet. </li>
                            <li>Morbi non dignissim tellus, vitae blandit urna Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit morbi non dignissim.</li>
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <h2>Objective</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p>Nullam elementum nisi eget mi mollis laoreet. Morbi non dignissim tellus, vitae blandit urna
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi non dignissim.Nullam elementum
                            nisi eget mi mollis laoreet. Morbi non dignissim tellus, vitae blandit urna Lorem ipsum
                            dolor sit amet, consectetur adipiscing elit morbi non dignissim.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="upCommingEvents">
            <div class="container">
                <div class="sub-title">
                    <div class="icon"><em class="icon icon-heading-icon"></em></div>
                    <h2>Our Upcoming Events</h2>
                    <div class="img"><img alt="" src="images/heading-blackBgimg.png" /></div>
                </div>
                <div class="eventSchedule">
                    <div class="schedule">
                        <span class="schedulecircle">03</span>
                        <span>Days</span>
                    </div>
                    <div class="schedule">
                        <span class="schedulecircle">05</span>
                        <span>Hours</span>
                    </div>
                    <div class="schedule">
                        <span class="schedulecircle">42</span>
                        <span>Minutes</span>
                    </div>
                    <div class="schedule">
                        <span class="schedulecircle">18</span>
                        <span>Seconds</span>
                    </div>
                </div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it type specimen book.</p>
            </div>
        </section>
        <section class="otherInfo">
            <div class="container">
                <div class="heading">
                    <div class="icon"><em class="icon icon-heading-icon"></em></div>
                    <div class="text">
                        <h2>Lorem Ipsum is simply dummy text</h2>
                    </div>
                    <div class="info-text">All the information you will need is listed below, just click on the page you
                        want to view and that's it.</div>
                    <div class="stickLine"></div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="customList">
                            <li>Weding Planner</li>
                            <li>Sangeet - Sandhya</li>
                            <li>Special Entry For Groom & Bride</li>
                            <li>Theam Decoration</li>
                            <li>Birthday Party</li>
                            <li>Corporate Meet</li>
                            <li>Exhibitions</li>
                            <li>Theam Decoration</li>
                            <li>Birthday Party</li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <ul class="customList">
                            <li>Brand Promotion</li>
                            <li>Road Show</li>
                            <li>Live Performance</li>
                            <li>Celebrity Management</li>
                            <li>Professional Sound & Light, Trus</li>
                            <li>DJ, Orchestra , Garba</li>
                            <li>Led Screen</li>
                            <li>Road Show</li>
                            <li>Live Performance</li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <div class="otherImages">
                            <img src="images/about-us/img1.jpg" alt="image 1" />
                            <img src="images/about-us/img2.jpg" alt="image 2" />
                            <img src="images/about-us/img3.jpg" alt="image 3" />
                            <img src="images/about-us/img4.jpg" alt="image 4" />
                            <img src="images/about-us/img5.jpg" alt="image 5" />
                            <img src="images/about-us/img6.jpg" alt="image 6" />
                            <img src="images/about-us/img7.jpg" alt="image 7" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="js/placeholder.js"></script>
    <script type="text/javascript" src="js/coustem.js"></script>

</body>

</html>