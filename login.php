<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup-Login Form</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>
    <?php include './assets/components/_alert.php' ?>

    <div class="container">
        <div class="content">
            <div class="blueBG">
                <div class="box signIn">
                    <h2>Already Have an Account?</h2>
                    <button class="signIn-btn">Sign In</button>
                </div>
                <div class="box signUp">
                    <h2>Don't Have an Account?</h2>
                    <button class="signUp-btn">Sign up</button>
                </div>
            </div>
            <div class="form-box">
                <div class="form signIn-form">
                    <form action="./assets/components/_loginHandler.php" method="POST">
                        <h3>Sign In</h3>
                        <input type="text" name="email" placeholder="Email" autocomplete="off" required />
                        <input type="password" name="password" placeholder="Password" autocomplete="off" required />
                        <input type="submit" value="Login" />
                    </form>
                </div>
                <div class="form signUp-form">
                    <form action="./assets/components/_singupHandler.php" method="POST">
                        <h3>Sign Up</h3>
                        <input type="text" name="name" placeholder="Name" autocomplete="off" required />
                        <input type="email" name="email" placeholder="Email Address" autocomplete="off" required />
                        <input type="password" name="password" placeholder="Password" autocomplete="off" required />
                        <input type="password" name="cpassword" placeholder="Confirm Password" autocomplete="off"
                            required />
                        <input type="submit" value="Sign Up" />
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="./assets/js/app.js"></script>
</body>

</html>