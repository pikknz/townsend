<?php

session_start();
require("src/Townsend/security/CsrfGuard.php");
$_SESSION["token"] = Townsend\Security\CsrfGuard::generateToken();
 //echo $_SESSION["token"] . " " .Townsend\Security\CsrfGuard::getGuardName();
?>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="submitContactForm.js"></script>
        <link rel="stylesheet" href="submitContactForm.css">
    </head>
    <body>
        <form method="POST" id="submitContactForm">
            <H1>Contact Form</H1>
            <div class="row">
                <div class="col-25">
                    <label for="name">
                        Name:
                    </label>
                </div>
                <div class="col-75">
                    <input type="text" id="name" name="name" value="" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="phone">
                        Phone:
                    </label>
                </div>
                <div class="col-75">
                    <input type="text" id="phone" name="phone" value="" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="phone">
                        Email:
                    </label>
                </div>
                <div class="col-75">
                    <input type="text" id="email" name="email" value="" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="newsletter">
                        Opt into Newsletter?:
                    </label>
                </div>
                <div class="col-75">
                    <input type="checkbox" id="newsletter" name="newsletter" value="1">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="phone">
                        Message:
                    </label>
                </div>
                <div class="col-75">
                    <textarea id="message" name="message" rows="5" cols="40" required></textarea>
                </div>
            </div>
            <input type="hidden" name="CSRFGuard_name" value="<?php echo Townsend\Security\CsrfGuard::getGuardName(); ?>">
            <div class="row">
                <input type="submit" id="submitForm" value="Submit">
            </div>
        </form>
    <div id="information"></div>
    </body>
    <footer>
        © 2020 Noel Garside
    </footer>
</html>