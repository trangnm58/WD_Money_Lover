<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Moneylover</title>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap.min.css?v=3.3.6">
    <link rel="stylesheet" type="text/css" href="css/notification.css?v=1.0.0">
    <link rel="shortcut icon" href="favicon.png">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Moneylover</a>
        </div>
    </nav>

    <!-- Login Form -->
    <div class="container">
        <div id="notification">
            <?php
                echo $notiContent;
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center">
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
</body>
</html>