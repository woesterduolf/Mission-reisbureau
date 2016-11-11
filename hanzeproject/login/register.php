<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Register form</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <div class="container">
            <section id="content">
                <form method="POST" action="register_check.php">
                    <h1>Register Form</h1>
                    <div>
                        <input name="email" type="text" placeholder="    Email" required="" id="username" />
                    </div>
                    <div>
                        <input name="password" type="password" placeholder="    Password" required="" id="password" />
                    </div>

                    <div>
                        <input name="firstname" type="text" placeholder="    First name" required="" id="username" />
                    </div>
                    <div>
                        <input name="lastname" type="text" placeholder="    Last name" required="" id="username" />
                    </div>
                    <div>
                        <input name="adress" type="text" placeholder="    Adress" required="" id="username" />
                    </div>
                    <div>
                        <input name="zipcode" type="text" placeholder="    Zipcode" required="" id="username" />
                    </div>
                    <div>
                        <input name="city" type="text" placeholder="    City" required="" id="username" />
                    </div>
                    <div>
                        <input name="country" type="text" placeholder="    Country" required="" id="username" />
                    </div>
                    <div>
                        <input name="phone" type="text" placeholder="    Phone number" required="" id="username" />
                    </div>
                    <div>
                        <label> <input type="checkbox" name="newsletter">Subscribe to newsletter</label>

                    </div>
                    <div>
                        <input name="register" type="submit" value="Registreren" />
                        <a href="index.html">Login</a>
                    </div>
                </form><!-- form -->

            </section><!-- content -->
        </div><!-- container -->
        <script src="js/index.js"></script>
    </body>
</html>
