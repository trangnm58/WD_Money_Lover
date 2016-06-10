<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Moneylover</title>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap.min.css?v=3.3.6">
    <link rel="stylesheet" type="text/css" href="lib/font-awesome.min.css?v=4.6.1">
    <link rel="stylesheet" type="text/css" href="css/welcome.css?v=1.0.0">
    <link rel="shortcut icon" href="favicon.png">
</head>

<body id="page-top" class="index">
    <noscript>&lt;div id="noscript-warning"&gt;This site works best with Javascript enabled, as you can plainly see.&lt;/div&gt;</noscript>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars" aria-hidden="true" title="Toggle navigation"></i>
                </button>
                <a class="navbar-brand" href="#page-top">Moneylover</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="login-moneylover">
                    <a href="" id="forgot-password">Forgot Your Password?</a>
                    <form action="/login" id="login-form" method="post" novalidate="novalidate">
                        <div class="left-inner-addon ">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input type="text" name="username" placeholder="Username" class="username" autofocus>
                        </div>
                        <div class="left-inner-addon ">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input type="password" name="password" placeholder="Password" class="password">
                        </div>

                        <input id="login-button" class="btn btn-primary" name="loginButton" tabindex="100" type="submit" value="Login">
                    </form>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#features">Features</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#download">Download</a>
                    </li>
                    <li class="page-scroll">
                        <a href="/sign-up">Sign Up</a>
                    </li>
                    <li class="page-scroll" id="login-item">
                        <a href="/login">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <img class="img-responsive" src="img/icon.png" alt="">
            <div class="intro-text">
                <span class="name">Moneylover</span>
                <hr class="star-light">
                <span class="skills">Personal finance with no stress - Live the life you want</span>
            </div>
        </div>
    </header>

    <!-- Features Grid Section -->
    <section id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Features</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 features-item">
                    <a href="#featuresModal1" class="features-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/budget.png" class="img-responsive" alt="">
                    </a>
                    <p>Budget Planner</p>
                </div>
                <div class="col-sm-4 features-item">
                    <a href="#featuresModal2" class="features-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/safe.png" class="img-responsive" alt="">
                    </a>
                    <p>Cloud Synchronize</p>
                </div>
                <div class="col-sm-4 features-item">
                    <a href="#featuresModal3" class="features-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/sale.png" class="img-responsive" alt="">
                    </a>
                    <p>Expense Tracker</p>
                </div>
                <div class="col-sm-4 features-item">
                    <a href="#featuresModal4" class="features-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/billreminder.png" class="img-responsive" alt="">
                    </a>
                    <p>Bill Reminder</p>
                </div>
                <div class="col-sm-4 features-item">
                    <a href="#featuresModal5" class="features-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/report.png" class="img-responsive" alt="">
                    </a>
                    <p>In-depth Report</p>
                </div>
                <div class="col-sm-4 features-item">
                    <a href="#featuresModal6" class="features-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/multi.png" class="img-responsive" alt="">
                    </a>
                    <p>Multiple Accounts & Currencies</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About Us</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Works really good, has a clean and nice interface, great features, and good usability. It really helps you manage your daily budget and kind of motivates you to cut down unnecessary expenses and reach your saving goals.</p>
                </div>
                <div class="col-lg-4">
                    <p>This app has cured months of stress worrying of stress about my financial situation as a university student.
                        <br/>Moneylover - Personal finance with no stress - Live the life you want.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Download</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 features-item">
                    <a href="#" class="download-android">
                        <i class="fa fa-android"></i>
                        <h3>Android</h3>
                        <p>GET IT ON
                            <br/>PLAY STORE</p>
                    </a>
                </div>
                <div class="col-sm-4 features-item">
                    <a href="#" class="download-apple">
                        <i class="fa fa-apple"></i>
                        <h3>iOS</h3>
                        <p>GET IT ON
                            <br/>APP STORE</p>
                    </a>
                </div>
                <div class="col-sm-4 features-item">
                    <a href="#" class="download-windows">
                        <i class="fa fa-windows"></i>
                        <h3>Windows Phone & PC</h3>
                        <p>GET IT ON
                            <br/>Windows 10</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>144 Xuan Thuy str
                            <br>Cau Giay dst, HN 10000</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About Moneylover</h3>
                        <p>Personal finance with no stress - Live the life you want.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Money Lover 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-lg hidden-md" style="display: none;">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Features Modals -->
    <div class="features-modal modal fade" id="featuresModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Budget Planner</h2>
                            <hr class="star-primary">
                            <img src="img/budget.png" class="img-responsive img-centered" alt="">
                            <p>Plan where you want your money to go. Budgeting helps you cut back on extras and non-essentials to save more money up. Get notified when budget reaches limit.</p>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="features-modal modal fade" id="featuresModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Cloud Synchronize</h2>
                            <hr class="star-primary">
                            <img src="img/safe.png" class="img-responsive img-centered" alt="">
                            <p>Access to your data from any device you have, manage personal finance anywhere you go. It works seamlessly across devices and platforms, from mobile, tablet to PC.</p>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="features-modal modal fade" id="featuresModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Expense Tracker</h2>
                            <hr class="star-primary">
                            <img src="img/sale.png" class="img-responsive img-centered" alt="">
                            <p>Pick up a category and input amount, it's that easy to record transactions and payments. Money management is simple and effortless with Money Lover.</p>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="features-modal modal fade" id="featuresModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Bill Reminder</h2>
                            <hr class="star-primary">
                            <img src="img/billreminder.png" class="img-responsive img-centered" alt="">
                            <p>Stay on top of your bills. Do schedule for upcoming payment or recurring transaction, you will never miss any important bills because Money Lover will notify on the due date.</p>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="features-modal modal fade" id="featuresModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>In-depth Report</h2>
                            <hr class="star-primary">
                            <img src="img/report.png" class="img-responsive img-centered" alt="">
                            <p>Understand where your money comes and goes. Money Lover provides visualized bar and pie charts which show you accurate picture of your financial standard.</p>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="features-modal modal fade" id="featuresModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Multiple Accounts & Currencies</h2>
                            <hr class="star-primary">
                            <img src="img/multi.png" class="img-responsive img-centered" alt="">
                            <p>Manage miltiple wallets with different currencies. Cash, Saving account or Credit card etc, it's easy to keep track of all accounts in one application.</p>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript" src="lib/jquery-2.2.3.min.js"></script>
<script src="lib/bootstrap.min.js?v=3.3.6"></script>

<!-- Plugin JavaScript  -->
<script src="lib/jquery.easing.min.js?v=1.3.2"></script>
<script src="js/classie.js?v=1.0.0"></script>
<script src="js/cbpAnimatedHeader.js?v=1.0.0"></script>

<script type="text/javascript" src="js/welcome.js?v=1.0.0"></script>

</html>
