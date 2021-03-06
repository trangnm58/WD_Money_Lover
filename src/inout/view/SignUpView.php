<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up - Moneylover</title>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap.min.css?v=3.3.6">
    <link rel="stylesheet" type="text/css" href="lib/font-awesome.min.css?v=4.6.1">
    <link rel="stylesheet" type="text/css" href="css/sign-up.css?v=1.0.0">
    <link rel="shortcut icon" href="favicon.png">
</head>

<body id="page-top" class="index">
    <noscript>&lt;div id="noscript-warning"&gt;This site works best with Javascript enabled, as you can plainly see.&lt;/div&gt;</noscript>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand" href="/">Moneylover</a>
            <a class="navbar-item" href="/login">Log In</a>
        </div>
    </nav>

    <!-- Login Form -->
    <div class="container">
        <div class="sign-up">
            <h1>Create new Account</h1>

            <form id="sign-up-form" class="form" method="post" onsubmit="return register()" action="/api/sign-up">
                <p class="field">
                    <span class="error-log"><?php if (isset($error["username"])) echo $error["username"];?></span>
                    <input type="text" name="username" value="" placeholder="Username" required autofocus onfocusout="checkUsername(this)" onfocus="clearErrorMessage(this)"/>
                    <i class="fa fa-user"></i>
                </p>
                <p class="field">
                    <span class="error-log"><?php if (isset($error["email"])) echo $error["email"];?></span>
                    <input type="text" name="email" value="" placeholder="Email" required onfocusout="checkEmail(this)" onfocus="clearErrorMessage(this)"/>
                    <i class="fa fa-envelope"></i>
                </p>
                <p class="field">
                    <span class="error-log"><?php if (isset($error["password"])) echo $error["password"];?></span>
                    <input type="password" name="password" placeholder="Password" required onfocusout="checkPassword(this)" onfocus="clearErrorMessage(this)"/>
                    <i class="fa fa-lock"></i>
                </p>
                <p class="field">
                    <span class="error-log"><?php if (isset($error["re-password"])) echo $error["re-password"];?></span>
                    <input type="password" name="re-password" placeholder="Retype password" required onkeyup="checkRePassword(this)" onfocusout="checkRePassword(this)" onfocus="clearErrorMessage(this)"/>
                    <i class="fa fa-retweet"></i>
                </p>

                <span>By clicking <b><em>Register</em></b>, you agree to our <a href="">Terms of Use</a> and <a href="">Privacy Policy</a></span>

                <p class="submit">
                    <input type="submit" name="sent" value="Register">
                </p>
            </form>
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

<script type="text/javascript" src="lib/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/sign-up.js?v=1.0.0"></script>

</html>