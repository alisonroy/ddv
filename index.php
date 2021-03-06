<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assests/vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="assests/css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <title>Login</title>
    <link rel="shortcut icon" href="assests/images/logo.png" type="image/x-icon">

</head>

<body>



    <div class="login-container container-fluid " onclick="onclick">
        <div class="top"></div>
        <div class="bottom"></div>
        <div class="center">
            <!-- <h2>Login to Save Nemo </h2>
            <input type="email" placeholder="Email" />
            <input type="password" placeholder="Password" />
            <h2>&nbsp;</h2> -->
            <div class="registration-form">
                <header>
                    <h1>Log in to Find Nemo</h1>
                </header>
                <form>
                    <div class="input-section email-section">
                        <input class="email" type="email" placeholder="ENTER YOUR E-MAIL HERE" autocomplete="off"
                            id="username" />
                        <div class="animated-button"><span class="icon-paper-plane"><i
                                    class="fa fa-envelope-o"></i></span><span class="next-button email"><i
                                    class="fa fa-arrow-up"></i></span></div>
                    </div>
                    <div class="input-section password-section folded">
                        <input class="password" type="password" placeholder="ENTER YOUR PASSWORD HERE" id="password" />
                        <div class="animated-button"><span class="icon-lock"><i class="fa fa-lock"></i></span><span
                                class="next-button password"><i class="fa fa-arrow-up"></i></span></div>
                    </div>
                    <div class="failed-user d-none" id="failed">
                    </div>
                </form>
            </div>
        </div>
    </div>





    <!-- Dependency Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assests/vendor/js/bootstrap.bundle.min.js"></script>


    <script src="assests/js/login.js"></script>
</body>

</html>
