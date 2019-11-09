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
    <link href="css/jquery.selectbox.css" rel="stylesheet" /><!-- select Box css -->
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
        <section class="content">
            <div class="container">
                <div class="venues-view">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="left-side">
                                <a href="wishlist.php#" class="back-link"><i class="icon icon-back"></i><span>Back to Search Results </span></a>
                                <div class="map-link">
                                    <a href="wishlist.php#">
                                        <img src="images/map-imgSmall.png" alt="">
                                        <span>View Venues on map</span>
                                    </a>
                                </div>
                                <div class="left-link">
                                    <h2>Quick Links</h2>
                                    <ul>
                                        <li><a href="wishlist.php#"><span class="icon icon-arrow-right"></span>Lorem Ipsum is simply dummy</a></li>
                                        <li><a href="wishlist.php#"><span class="icon icon-arrow-right"></span>when an unknown printer took a </a></li>
                                        <li><a href="wishlist.php#"><span class="icon icon-arrow-right"></span>It was popularised in the 1960s</a></li>
                                        <li><a href="wishlist.php#"><span class="icon icon-arrow-right"></span>but also the leap into electronic typesetting.</a></li>
                                        <li><a href="wishlist.php#"><span class="icon icon-arrow-right"></span>It was popularised in the 1960s</a></li>
                                        <li><a href="wishlist.php#"><span class="icon icon-arrow-right"></span>but also the leap into electronic typesetting.</a></li>
                                        <li><a href="wishlist.php#"><span class="icon icon-arrow-right"></span>It was popularised in the 1960s</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-12">
                            <div class="right-side">
                                <div class="toolbar">

                                    <div class="finde-count">7 Venues found. </div>
                                    <div class="right-tool">
                                        <div class="select-box">
                                            <select name="country_id" id="setUp_select" tabindex="1">
                                                <option>Near by</option>
                                                <option>Near by</option>
                                                <option>Near by</option>
                                                <option>Near by</option>
                                                <option>Near by</option>
                                            </select>
                                        </div>
                                        <a href="wishlist.php#" class="shortlist-btn"><span class="icon icon-heart-filled"></span>7 Shortlist</a>
                                        <div class="link">
                                            <ul>
                                                <li><a href="wishlist.php#">Map</a></li>
                                                <li class="active"><a href="wishlist.php#">List</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="venues-slide first">
                                    <div class="img"><img src="images/property-img/venues-img.jpg" alt=""></div>
                                    <div class="text">
                                        <h3>Hyatt Place HInjewadi Mumbai</h3>
                                        <div class="address">Behind Shalby Hospital, Garden Road, Prahlad Nagar Mumbai-380015</div>
                                        <div class="reviews">3.5 <div class="star">
                                                <div class="fill" style="width:70%;"></div>
                                            </div>reviews</div>
                                        <div class="outher-info">
                                            <div class="info-slide first">
                                                <label>Seating Capacity</label>
                                                <span>20 - 160</span>
                                            </div>
                                            <div class="info-slide">
                                                <label>Price Range</label>
                                                <span>$ 1000 <small>(Onwards)</small></span>
                                            </div>
                                            <div class="info-slide">
                                                <label>Hotel Star Rating</label>
                                                <div class="star">
                                                    <div class="fill" style="width:61%;"></div>
                                                </div>
                                            </div>
                                            <div class="info-slide">
                                                <label>Min. Booking Amount</label>
                                                <span>$ 5000 <small>(Onwards)</small></span>
                                            </div>
                                            <div class="venues-link">
                                                <a href="wishlist.php#">4 Venues</a>
                                            </div>
                                        </div>
                                        <div class="outher-link">
                                            <ul>
                                                <li><a href="wishlist.php#"><span class="icon icon-calander-check"></span>Check Availibility</a></li>
                                                <li><a href="javascript:;" data-toggle="modal" data-target="#contactModal1"><span class="icon icon-phone"></span>Contact Vendor</a></li>
                                                <li><a href="wishlist.php#"><span class="icon icon-heart"></span>Add to Wishlist</a></li>
                                                <li><a href="wishlist.php#"><span class="icon icon-location-1"></span>See on Map</a></li>
                                            </ul>
                                        </div>
                                        <div class="button">
                                            <a href="wishlist.php#" class="btn">Book Now</a>
                                            <a href="javascript:;" class="btn gray">View Details <span class="icon icon-arrow-down"></span></a>
                                        </div>
                                    </div>
                                    <div class="amenities-view">
                                        <h2>All Amenities :</h2>
                                        <div class="amenities-box">
                                            <div class="icon icon-tea"></div>
                                            <span>Coffee Shop</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-wifi"></div>
                                            <span>Wifi</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-parking"></div>
                                            <span>Parking</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-airport-shuttle"></div>
                                            <span>Airport Shuttle</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-bar"></div>
                                            <span>Bar</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-currency-xchg"></div>
                                            <span>Currency Exchange</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-bag"></div>
                                            <span>Business Centre</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-road-guide"></div>
                                            <span>Guide Service</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-yoga"></div>
                                            <span>Yoga Centre</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-ayurved"></div>
                                            <span>Ayurveda Centre</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-payment"></div>
                                            <span>Payment Mode</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-ac"></div>
                                            <span>A/C</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-handicape"></div>
                                            <span>Handicap Facilities</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-doctor"></div>
                                            <span>Doctor on Call</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-meeting"></div>
                                            <span>Conference Hall</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-apple"></div>
                                            <span>Health Club</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-gym"></div>
                                            <span>Gym</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-flower"></div>
                                            <span>Florist on Request</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-swimming"></div>
                                            <span>Swimming Pool</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-spoon"></div>
                                            <span>Restaurant</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-massage-center"></div>
                                            <span>Massage Centre</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-steam-bath"></div>
                                            <span>Steam Sauna</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-shirt"></div>
                                            <span>Laundry Service</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-spa"></div>
                                            <span>Spa</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-beauty-saloon"></div>
                                            <span>Beauty Salon</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-sun-bed"></div>
                                            <span>Sun Beds</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-room-service"></div>
                                            <span>Room Service</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-taxi"></div>
                                            <span>Taxi Service</span>
                                        </div>
                                    </div>
                                    <div class="modal fade modal-vcenter" id="contactModal1" tabindex="-1" role="dialog">
                                        <div class="modal-dialog contactvendor-popup" role="document">
                                            <div class="modal-content">
                                                <div class="close-icon" aria-label="Close" data-dismiss="modal"><img src="images/close-icon.png" alt=""></div>
                                                <h1>Mariom Banquet</h1>
                                                <div class="note">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="input-slide">
                                                            <input type="text" placeholder="First Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="input-slide">
                                                            <input type="text" placeholder="Last Name ">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="input-slide">
                                                            <input type="text" placeholder="Email ID">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="input-slide">
                                                            <input type="text" placeholder="Phone Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="input-slide">
                                                            <textarea placeholder="Message"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="submit-slide">
                                                            <input type="submit" value="Send" class="btn">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="venues-slide">
                                    <div class="img"><img src="images/property-img/venues-img2.jpg" alt=""></div>
                                    <div class="text">
                                        <h3>Mariom Banquet</h3>
                                        <div class="address">M-4, RIICO Industrial Area, Shahjahanpur, District-Alwar, Mumbai - 301706, India</div>
                                        <div class="reviews">3.5 <div class="star">
                                                <div class="fill" style="width:70%;"></div>
                                            </div>reviews</div>
                                        <div class="outher-info">
                                            <div class="info-slide first">
                                                <label>Seating Capacity</label>
                                                <span>20 - 160</span>
                                            </div>
                                            <div class="info-slide">
                                                <label>Price Range</label>
                                                <span>$ 1000 <small>(Onwards)</small></span>
                                            </div>
                                            <div class="info-slide">
                                                <label>Hotel Star Rating</label>
                                                <div class="star">
                                                    <div class="fill" style="width:61%;"></div>
                                                </div>
                                            </div>
                                            <div class="info-slide">
                                                <label>Min. Booking Amount</label>
                                                <span>$ 5000 <small>(Onwards)</small></span>
                                            </div>
                                            <div class="venues-link">
                                                <a href="wishlist.php#">4 Venues</a>
                                            </div>
                                        </div>
                                        <div class="outher-link">
                                            <ul>
                                                <li><a href="wishlist.php#"><span class="icon icon-calander-check"></span>Check Availibility</a></li>
                                                <li><a href="javascript:;" data-toggle="modal" data-target="#contactModal2"><span class="icon icon-phone"></span>Contact Vendor</a></li>
                                                <li><a href="wishlist.php#"><span class="icon icon-heart-filled"></span>Add to Wishlist</a></li>
                                                <li><a href="wishlist.php#"><span class="icon icon-location-1"></span>See on Map</a></li>
                                            </ul>
                                        </div>
                                        <div class="button">
                                            <a href="wishlist.php#" class="btn">Book Now</a>
                                            <a href="javascript:;" class="btn gray">View Details <span class="icon icon-arrow-down"></span></a>
                                        </div>
                                    </div>
                                    <div class="amenities-view">
                                        <h2>All Amenities :</h2>
                                        <div class="amenities-box">
                                            <div class="icon icon-tea"></div>
                                            <span>Coffee Shop</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-wifi"></div>
                                            <span>Wifi</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-parking"></div>
                                            <span>Parking</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-airport-shuttle"></div>
                                            <span>Airport Shuttle</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-bar"></div>
                                            <span>Bar</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-currency-xchg"></div>
                                            <span>Currency Exchange</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-bag"></div>
                                            <span>Business Centre</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-road-guide"></div>
                                            <span>Guide Service</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-yoga"></div>
                                            <span>Yoga Centre</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-ayurved"></div>
                                            <span>Ayurveda Centre</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-payment"></div>
                                            <span>Payment Mode</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-ac"></div>
                                            <span>A/C</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-handicape"></div>
                                            <span>Handicap Facilities</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-doctor"></div>
                                            <span>Doctor on Call</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-meeting"></div>
                                            <span>Conference Hall</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-apple"></div>
                                            <span>Health Club</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-gym"></div>
                                            <span>Gym</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-flower"></div>
                                            <span>Florist on Request</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-swimming"></div>
                                            <span>Swimming Pool</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-spoon"></div>
                                            <span>Restaurant</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-massage-center"></div>
                                            <span>Massage Centre</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-steam-bath"></div>
                                            <span>Steam Sauna</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-shirt"></div>
                                            <span>Laundry Service</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-spa"></div>
                                            <span>Spa</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-beauty-saloon"></div>
                                            <span>Beauty Salon</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-sun-bed"></div>
                                            <span>Sun Beds</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-room-service"></div>
                                            <span>Room Service</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-taxi"></div>
                                            <span>Taxi Service</span>
                                        </div>
                                    </div>
                                    <div class="modal fade modal-vcenter" id="contactModal2" tabindex="-1" role="dialog">
                                        <div class="modal-dialog contactvendor-popup" role="document">
                                            <div class="modal-content">
                                                <div class="close-icon" aria-label="Close" data-dismiss="modal"><img src="images/close-icon.png" alt=""></div>
                                                <h1>Mariom Banquet</h1>
                                                <div class="note">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="input-slide">
                                                            <input type="text" placeholder="First Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="input-slide">
                                                            <input type="text" placeholder="Last Name ">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="input-slide">
                                                            <input type="text" placeholder="Email ID">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="input-slide">
                                                            <input type="text" placeholder="Phone Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="input-slide">
                                                            <textarea placeholder="Message"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="submit-slide">
                                                            <input type="submit" value="Send" class="btn">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="venues-slide">
                                    <div class="img"><img src="images/property-img/venues-img3.jpg" alt=""></div>
                                    <div class="text">
                                        <h3>Ramada Navi Mumbai</h3>
                                        <div class="address">156, MIDC, Milenium Business Park, Mahape, Mumbai-400710, Maharashtra, India</div>
                                        <div class="reviews">3.5 <div class="star">
                                                <div class="fill" style="width:70%;"></div>
                                            </div>reviews</div>
                                        <div class="outher-info">
                                            <div class="info-slide first">
                                                <label>Seating Capacity</label>
                                                <span>20 - 160</span>
                                            </div>
                                            <div class="info-slide">
                                                <label>Price Range</label>
                                                <span>$ 1000 <small>(Onwards)</small></span>
                                            </div>
                                            <div class="info-slide">
                                                <label>Hotel Star Rating</label>
                                                <div class="star">
                                                    <div class="fill" style="width:61%;"></div>
                                                </div>
                                            </div>
                                            <div class="info-slide">
                                                <label>Min. Booking Amount</label>
                                                <span>$ 5000 <small>(Onwards)</small></span>
                                            </div>
                                            <div class="venues-link">
                                                <a href="wishlist.php#">4 Venues</a>
                                            </div>
                                        </div>
                                        <div class="outher-link">
                                            <ul>
                                                <li><a href="wishlist.php#"><span class="icon icon-calander-check"></span>Check Availibility</a></li>
                                                <li><a href="javascript:;" data-toggle="modal" data-target="#contactModal3"><span class="icon icon-phone"></span>Contact Vendor</a></li>
                                                <li><a href="wishlist.php#"><span class="icon icon-heart"></span>Add to Wishlist</a></li>
                                                <li><a href="wishlist.php#"><span class="icon icon-location-1"></span>See on Map</a></li>
                                            </ul>
                                        </div>
                                        <div class="button">
                                            <a href="wishlist.php#" class="btn">Book Now</a>
                                            <a href="javascript:;" class="btn gray">View Details <span class="icon icon-arrow-down"></span></a>
                                        </div>
                                    </div>
                                    <div class="amenities-view">
                                        <h2>All Amenities :</h2>
                                        <div class="amenities-box">
                                            <div class="icon icon-tea"></div>
                                            <span>Coffee Shop</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-wifi"></div>
                                            <span>Wifi</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-parking"></div>
                                            <span>Parking</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-airport-shuttle"></div>
                                            <span>Airport Shuttle</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-bar"></div>
                                            <span>Bar</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-currency-xchg"></div>
                                            <span>Currency Exchange</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-bag"></div>
                                            <span>Business Centre</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-road-guide"></div>
                                            <span>Guide Service</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-yoga"></div>
                                            <span>Yoga Centre</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-ayurved"></div>
                                            <span>Ayurveda Centre</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-payment"></div>
                                            <span>Payment Mode</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-ac"></div>
                                            <span>A/C</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-handicape"></div>
                                            <span>Handicap Facilities</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-doctor"></div>
                                            <span>Doctor on Call</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-meeting"></div>
                                            <span>Conference Hall</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-apple"></div>
                                            <span>Health Club</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-gym"></div>
                                            <span>Gym</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-flower"></div>
                                            <span>Florist on Request</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-swimming"></div>
                                            <span>Swimming Pool</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-spoon"></div>
                                            <span>Restaurant</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-massage-center"></div>
                                            <span>Massage Centre</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-steam-bath"></div>
                                            <span>Steam Sauna</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-shirt"></div>
                                            <span>Laundry Service</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-spa"></div>
                                            <span>Spa</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-beauty-saloon"></div>
                                            <span>Beauty Salon</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-sun-bed"></div>
                                            <span>Sun Beds</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-room-service"></div>
                                            <span>Room Service</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-taxi"></div>
                                            <span>Taxi Service</span>
                                        </div>
                                    </div>
                                    <div class="modal fade modal-vcenter" id="contactModal3" tabindex="-1" role="dialog">
                                        <div class="modal-dialog contactvendor-popup" role="document">
                                            <div class="modal-content">
                                                <div class="close-icon" aria-label="Close" data-dismiss="modal"><img src="images/close-icon.png" alt=""></div>
                                                <h1>Mariom Banquet</h1>
                                                <div class="note">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="input-slide">
                                                            <input type="text" placeholder="First Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="input-slide">
                                                            <input type="text" placeholder="Last Name ">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="input-slide">
                                                            <input type="text" placeholder="Email ID">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="input-slide">
                                                            <input type="text" placeholder="Phone Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="input-slide">
                                                            <textarea placeholder="Message"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="submit-slide">
                                                            <input type="submit" value="Send" class="btn">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="venues-slide last">
                                    <div class="img"><img src="images/property-img/venues-img4.jpg" alt=""></div>
                                    <div class="text">
                                        <h3>Trident, Gurgaon</h3>
                                        <div class="address">443 Udyog Vihar, V, Gurgaon, New Delhi And NCR-122016, Haryana, India</div>
                                        <div class="reviews">3.5 <div class="star">
                                                <div class="fill" style="width:70%;"></div>
                                            </div>reviews</div>
                                        <div class="outher-info">
                                            <div class="info-slide first">
                                                <label>Seating Capacity</label>
                                                <span>20 - 160</span>
                                            </div>
                                            <div class="info-slide">
                                                <label>Price Range</label>
                                                <span>$ 1000 <small>(Onwards)</small></span>
                                            </div>
                                            <div class="info-slide">
                                                <label>Hotel Star Rating</label>
                                                <div class="star">
                                                    <div class="fill" style="width:61%;"></div>
                                                </div>
                                            </div>
                                            <div class="info-slide">
                                                <label>Min. Booking Amount</label>
                                                <span>$ 5000 <small>(Onwards)</small></span>
                                            </div>
                                            <div class="venues-link">
                                                <a href="wishlist.php#">4 Venues</a>
                                            </div>
                                        </div>
                                        <div class="outher-link">
                                            <ul>
                                                <li><a href="wishlist.php#"><span class="icon icon-calander-check"></span>Check Availibility</a></li>
                                                <li><a href="javascript:;" data-toggle="modal" data-target="#contactModal4"><span class="icon icon-phone"></span>Contact Vendor</a></li>
                                                <li><a href="wishlist.php#"><span class="icon icon-heart"></span>Add to Wishlist</a></li>
                                                <li><a href="wishlist.php#"><span class="icon icon-location-1"></span>See on Map</a></li>
                                            </ul>
                                        </div>
                                        <div class="button">
                                            <a href="wishlist.php#" class="btn">Book Now</a>
                                            <a href="javascript:;" class="btn gray">View Details <span class="icon icon-arrow-down"></span></a>
                                        </div>
                                    </div>
                                    <div class="amenities-view">
                                        <h2>All Amenities :</h2>
                                        <div class="amenities-box">
                                            <div class="icon icon-tea"></div>
                                            <span>Coffee Shop</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-wifi"></div>
                                            <span>Wifi</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-parking"></div>
                                            <span>Parking</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-airport-shuttle"></div>
                                            <span>Airport Shuttle</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-bar"></div>
                                            <span>Bar</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-currency-xchg"></div>
                                            <span>Currency Exchange</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-bag"></div>
                                            <span>Business Centre</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-road-guide"></div>
                                            <span>Guide Service</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-yoga"></div>
                                            <span>Yoga Centre</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-ayurved"></div>
                                            <span>Ayurveda Centre</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-payment"></div>
                                            <span>Payment Mode</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-ac"></div>
                                            <span>A/C</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-handicape"></div>
                                            <span>Handicap Facilities</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-doctor"></div>
                                            <span>Doctor on Call</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-meeting"></div>
                                            <span>Conference Hall</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-apple"></div>
                                            <span>Health Club</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-gym"></div>
                                            <span>Gym</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-flower"></div>
                                            <span>Florist on Request</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-swimming"></div>
                                            <span>Swimming Pool</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-spoon"></div>
                                            <span>Restaurant</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-massage-center"></div>
                                            <span>Massage Centre</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-steam-bath"></div>
                                            <span>Steam Sauna</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-shirt"></div>
                                            <span>Laundry Service</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-spa"></div>
                                            <span>Spa</span>
                                        </div>
                                        <div class="amenities-box disabled">
                                            <div class="icon icon-beauty-saloon"></div>
                                            <span>Beauty Salon</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-sun-bed"></div>
                                            <span>Sun Beds</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-room-service"></div>
                                            <span>Room Service</span>
                                        </div>
                                        <div class="amenities-box">
                                            <div class="icon icon-taxi"></div>
                                            <span>Taxi Service</span>
                                        </div>
                                    </div>
                                    <div class="modal fade modal-vcenter" id="contactModal4" tabindex="-1" role="dialog">
                                        <div class="modal-dialog contactvendor-popup" role="document">
                                            <div class="modal-content">
                                                <div class="close-icon" aria-label="Close" data-dismiss="modal"><img src="images/close-icon.png" alt=""></div>
                                                <h1>Mariom Banquet</h1>
                                                <div class="note">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="input-slide">
                                                            <input type="text" placeholder="First Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="input-slide">
                                                            <input type="text" placeholder="Last Name ">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="input-slide">
                                                            <input type="text" placeholder="Email ID">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="input-slide">
                                                            <input type="text" placeholder="Phone Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="input-slide">
                                                            <textarea placeholder="Message"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="submit-slide">
                                                            <input type="submit" value="Send" class="btn">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination">
                                    <ul>
                                        <li class="prev disabled"><a href="wishlist.php#">Prev</a></li>
                                        <li class="active"><a href="wishlist.php#">1</a></li>
                                        <li><a href="wishlist.php#">2</a></li>
                                        <li><a href="wishlist.php#">3</a></li>
                                        <li><a href="wishlist.php#">4</a></li>
                                        <li><a href="wishlist.php#">5</a></li>
                                        <li class="next"><a href="wishlist.php#">Next</a></li>
                                    </ul>
                                </div>
                            </div>
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
    <script type="text/javascript" src="js/placeholder.js"></script>
    <script type="text/javascript" src="js/coustem.js"></script>

</body>

</html>