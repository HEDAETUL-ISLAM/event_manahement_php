<?php error_reporting(E_ALL ^ E_NOTICE) ?>

<?php
session_start();
@require_once "../../model/Login.php";
@require_once "../../model/Person.php";
@require_once "../../model/PendingBook.php";
@include_once "../../controller/PersonController.php";
@include_once "../../controller/bookingController.php";
@include_once "../../controller/packageController/packageController.php";
$username = "";
$name = "";
$email = "";
$phone = "";
$password = "";
$address = "";

// for logout============================================================>
if (isset($_POST['logoutPerson'])) {
    session_destroy();
    @include_once "../errors/success.php";
    header('Location: home.php');
}

//for status============================================================
if (isset($_GET["actionYes"])) {
    if ($_GET["actionYes"] == "status") {
        $id = $_GET["id"];
        $result = updateSinglePackageStatusYes($id);
        echo '<script>alert("Change Status")</script>';
        echo '<script>window.location="singlePackageStatus.php"</script>';
    }
}
//for status============================================================
if (isset($_GET["actionNo"])) {
    if ($_GET["actionNo"] == "status") {
        $id = $_GET["id"];
        $result = updateSinglePackageStatusNo($id);
        echo '<script>alert("Change Status")</script>';
        echo '<script>window.location="singlePackageStatus.php"</script>';
    }
}

//for check person=========================================================
if (!empty($_SESSION['username'])) {
    if ($_SESSION['status'] != 0) {
        session_destroy();
        header("Location: ./home.php");
    }
}
if ($_SESSION['name'] == "") {
    header("Location: ./home.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Admin Panel</title>

    <link rel="../shortcut icon" href="../images/Favicon.ico">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/owl.carousel.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/datepicker.css" rel="stylesheet" />
    <link href="../css/loader.css" rel="stylesheet">
    <link href="../css/docs.css" rel="stylesheet">
    <link href="../css/jquery.selectbox.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Domine:400,700%7COpen+Sans:300,300i,400,400i,600,600i,700,700i%7CRoboto:400,500" rel="stylesheet">

    <script>
        function searchByName() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("nameInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function searchByPackageName() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("packageNameInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function searchByStatus() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("statusInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</head>

<body class="inner-page">
    <div class="page">
        <header id="header">
            <div class="quck-link">
                <div class="container">
                    <div class="mail"><a href="MailTo:eventorganizer@gmail.com"><span class="icon icon-envelope"></span>eventorganizer@gmail.com</a></div>
                    <div class="right-link">
                        <ul>
                            <li class="sub-links">
                                <a><span class="icon icon-envelope"></span>Hi </a>
                            </li>
                            <li class="sub-links">
                                <a href="javascript:;"><?php echo $_SESSION['name'] ?><span class="icon icon-arrow-down"></span></a>
                                <ul class="sub-nav" style="right:-40px">
                                    <?php
                                    if ($_SESSION['name'] != "") {
                                        echo '<li>';
                                        echo '    <a href="javascript:;" data-toggle="modal" data-target="#logoutModal">Logout</a>';
                                        echo '</li>';
                                    }
                                    if ($_SESSION['name'] == "") {
                                        echo '<li>';
                                        echo '    <a href="../index.php">Login</a>';
                                        echo '</li>';
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <nav id="nav-main">
                <div class="container">
                    <div class="navbar navbar-inverse">
                        <div class="navbar-header">
                            <a href="../index.php" class="navbar-brand"><img src="../images/logo.png" alt="" style="max-width: 80px"></a>
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon1-barMenu"></span>
                                <span class="icon1-barMenu"></span>
                                <span class="icon1-barMenu"></span>
                            </button>

                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="single-col ">
                                    <a href="dashboard.php">Dashboard </a>
                                </li>
                                <li class="single-col ">
                                    <a href="vendor.php">Vendor </a>
                                </li>
                                <li class="single-col ">
                                    <a href="customer.php">Customer </a>
                                </li>
                                <li class="single-col active">
                                    <a href="">Action <span class="icon icon-arrow-down"></span></a>
                                    <ul>
                                        <li>
                                            <a href="pendingBook.php">Pending Book </a>
                                        </li>
                                        <li>
                                            <a href="orderHistory.php">Order History </a>
                                        </li>
                                        <li>
                                            <a href="singlePackageStatus.php">Single Package Status </a>
                                        </li>
                                        <li>
                                            <a href="bundlePackageStatus.php">Bundle Package Status </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="single-col ">
                                    <a href="adminAccount.php">My Account </span></a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- logout -->
        <div class="modal modal-vcenter fade" id="logoutModal" role="dialog">
            <div class="modal-dialog login-popup" role="document">
                <div class="modal-content">
                    <div class="close-icon" aria-label="Close" data-dismiss="modal"><img src="../images/close-icon.png" alt=""></div>
                    <div class="left-img"><img src="../images/login-leftImg.png" alt=""></div>
                    <div class="right-info">
                        <h1>Are you sure ? </h1>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="input-form">
                                <div class="submit-slide">
                                    <input type="submit" class="btn" value="Yes" name="logoutPerson">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="searchFilter-main">
            <section class="searchFormTop">
                <div class="container">
                    <div class="searchCenter">
                        <div class="refineCenter">
                            <span class="icon icon-filter"></span>
                            <span>Refine Customer</span>
                        </div>
                        <div class="searchFilter" style="width: 100%;">
                            <div class="input-box" style="width: 33.3%;">
                                <div class="icon icon-grid-view"></div>
                                <input type="text" id="nameInput" onkeyup="searchByName()" placeholder="Search for vendor name" title="Type a name">
                            </div>
                            <div class="input-box searchlocation" style="width: 33.3%;">
                                <div class="icon icon-grid-view"></div>
                                <input type="text" id="packageNameInput" onkeyup="searchByPackageName()" placeholder="Search for package Name" title="Type a package">
                            </div>
                            <div class="input-box date" style="width: 33.3%;">
                                <div class="icon icon-calander-month"></div>
                                <input type="text" id="statusInput" onkeyup="searchByStatus()" placeholder="Search for status" title="Type a status">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container">
                    <div class="venues-view">
                        <div class="row">

                            <!-- <div class="right-side" id="changeOrder">

                                </div> -->
                            <div class="content">
                                <div class="container">
                                    <div class="bookin-info">
                                        <table class="bookin-table" id="myTable">
                                            <tr>
                                                <td class=" Theading">Package Name</td>
                                                <td class=" Theading">vendor Name</td>
                                                <td class="Theading">Available Status</td>
                                                <td class="Theading ">Action</td>
                                            </tr>
                                            <?php
                                            $result = getAllSinglePackage();
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo '    <td >';
                                                    echo         "<p>" .  $row["package_name"] . "</p>";
                                                    echo '    </td>';
                                                    echo '    <td >';
                                                    echo         "<p>" .  $row["vendor_username"] . "</p>";
                                                    echo '    </td>';
                                                    echo '    <td>';
                                                    echo         "<p>" . $row["available_status"] . "</p>";
                                                    echo '    </td>';
                                            ?>
                                                    <td class="Theading ">
                                                        <?php
                                                        if ($row["available_status"] == "Yes") {
                                                        ?>
                                                            <a href="singlePackageStatus.php?actionYes=status&id=<?php echo $row["id"]; ?>">
                                                                <span class="text-danger"><img src="../../view/images/close-icon.png" alt="" style="max-width: 80px" title="Make it Unavailable"> </span>
                                                            </a>
                                                        <?php
                                                        }
                                                        if ($row["available_status"] == "No") {
                                                        ?><a href="singlePackageStatus.php?actionNo=status&id=<?php echo $row["id"]; ?>">
                                                                <span class="text-danger"><img src="../../view/images/tick.png" alt="" style="max-width: 80px" title="Make it Available"> </span>
                                                            </a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                            <?php
                                                    echo '</tr> ';
                                                }
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>




        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-sm6 col-md-4 ">
                            <div class="footer-link">
                                <h5>Company</h5>
                                <ul>
                                    <li><a href="../aboutUs.php">About Us</a></li>
                                    <li><a href="../privacy_policy.php">Privacy Policy</a></li>
                                    <li><a href="../career.php">Careers</a></li>
                                    <li><a href="../blog.php">Blogs</a></li>
                                    <li><a href="../contact.php">Contact Us</a></li>
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
    <script type="text/javascript" src="../js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/jquery.form-validator.min.js"></script>
    <script type="text/javascript" src="../js/jquery.selectbox-0.2.js"></script>
    <script type="text/javascript" src="../js/coustem.js"></script>
    <script type="text/javascript" src="../js/placeholder.js"></script>
</body>

</html>