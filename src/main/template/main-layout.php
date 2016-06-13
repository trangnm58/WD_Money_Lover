<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Moneylover</title>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap.min.css?v=3.3.6">
    <link rel="stylesheet" type="text/css" href="lib/font-awesome.min.css?v=4.6.1">
    <link rel="stylesheet" type="text/css" href="css/main-layout.css?v=1.0.0">
    <?php
        echo '<link rel="stylesheet" type="text/css" href="css/'.$cssFileName.'">';
    ?>
    <link rel="shortcut icon" href="favicon.png">
</head>

<body>
    <noscript>&lt;div id="noscript-warning"&gt;This site works best with Javascript enabled, as you can plainly see.&lt;/div&gt;</noscript>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->         <div class="navbar-header page-scroll">
                <button class="navbar-toggle navbar-toggle-left" onclick="toggleSideMenu()">
                    <span class="sr-only">Toggle side menu</span>
                    <i class="fa fa-bars" aria-hidden="true" title="Toggle side menu"></i>
                </button>
                <!-- TODO
                Wallet here -->
                <div class="navbar-brand">Moneylover</div>
                <!-- end -->
                <button class="navbar-noti" onclick="toggleSideNoti()">
                    <span class="sr-only">Toggle side noti</span>
                    <i class="fa fa-bell" aria-hidden="true" title="Toggle side noti"></i>
                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </nav>

    <div class="container" style="padding-top: 50px">
        <div id="side-menu">
            <a id="profile" href="/profile">
				<img src="img/icon.png" alt="avatar"/>
				<span><?php 
				session_start();
				if (isset($_SESSION["username"])) {
					echo $_SESSION['username'];
				} ?></span>
			</a>
            <div class="list-group" onclick="closeSideMenu()">
                <a class="list-group-item" href="/wallet">
                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    Wallets
                </a>
                <a class="list-group-item" href="/home">
                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    Transactions
                </a>
                <a class="list-group-item" href="#">
                    <i class="fa fa-american-sign-language-interpreting" aria-hidden="true"></i>
                    Debts
                </a>
                <a class="list-group-item" href="#">
                    <i class="fa fa-line-chart" aria-hidden="true"></i>
                    Trends
                </a>
                <a class="list-group-item" href="/category">
                    <i class="fa fa-cubes" aria-hidden="true"></i>
                    Categories
                </a>
                <a class="list-group-item" href="#">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    Budgets
                </a>
                <a class="list-group-item" href="#">
                    <i class="fa fa-archive" aria-hidden="true"></i>
                    Savings
                </a>
                <a class="list-group-item" href="#">
                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                    Events
                </a>
                <a class="list-group-item" href="#">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                    Bills
                </a>
                <a class="list-group-item" href="#">
                    <i class="fa fa-undo" aria-hidden="true"></i>
                    Recurring Transactions
                </a>
                <a class="list-group-item" href="#">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                    Help & Support
                </a>
                <a class="list-group-item" href="/api/logout">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Log Out
                </a>
            </div>
        </div>

        <div id="content" onclick="closeAllMenu()">
            <?php
                include_once $content;
            ?>
        </div>
        <div id="side-noti">
            <ul class="list-group list-unstyled" onclick="closeSideMenu()">
				<li class="list-group-item">
					Notifications
				</li>
				<!-- noti list here -->
				<li><a class="list-group-item" href="#">
					<div class="noti-icon"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>
					<p class="details">Keep in touch with us for updates, tips and occasional free stuff. Tap to see now!</p>
					<div class="time">2016-06-10 10PM</div>
					<?php echo var_dump($notis); ?>
				</a></li>
            </ul>
        </div>
    </div>
</body>

<script type="text/javascript" src="lib/jquery-2.2.3.min.js"></script>
<script src="lib/bootstrap.min.js?v=3.3.6"></script>

<script type="text/javascript" src="js/main-layout.js?v=1.0.0"></script>
<?php
    echo '<script type="text/javascript" src="js/'.$scriptFileName.'"></script>';
?>

</html>