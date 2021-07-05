<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Subscription Form</title>
</head>
<body>
    <input type="checkbox" id="toggle">
    <label for="toggle" class="show-btn">Show Modal</label>
    <div class="wrapper">
        <label for="toggle" class="cancel-btn"><i class="fa fa-close"></i></label>
        <div class="icon"><i class="fa fa-envelope"></i></i></div>
        <div class="content">
            <header>Become a Subscriber</header>
            <p>Subscribe to our blog and get the lates updates to your inbox.</p>
        </div>
        <form action="index.php" method="POST">
            <?php
            $userEmail = "";//first we leave this field blank
            if(isset($_POST['subscribe'])){ //if subscribe button clicked
                $userEmail = $_POST['email'];//getting user email
                if(filter_var( $userEmail, FILTER_VALIDATION_EMAIL)){//validatin user entered email
                    $subject = "Thanks for Subscribing Us";
                    $message = "Thanks for Subscribing to our blog, You always receiving our lates updates from us and we won't share your contact details";
                    $sender = "sahanakalanka818@gmail.com";
                    if(mail($userEmail,$subject, $message, $sender)){//php function to send mail
                        ?>
                        <!-- show success message if mail sent successfully -->
                        <div class="alert success">Thanks for Subscribing us.</div>
                        <?php
                        $userEmail = "";//we'll again leave this blank once mail send
                    }else{
                        ?>
                        <!-- show an error message somehow mail can't be send -->
                        <div class="alert error">Failed while sending your email!</div>
                        <?php
                    
                    }
            }else{
                ?>
                <!-- show an error message if user email is not valid -->
                <div class="alert error"><?php echo $userEmail?> is not a valid Email</div>
                <?php
            }

            }
            ?>
            <div class="field">
                <input type="text" name="email" placeholder="Email Address" required>
            </div>
            <div class="field btn">
                <input type="submit" name="subscribe" value="Subscribe">
            </div>
        </form>
        <div class="text">We do not share your information.</div>
    </div>
</body>
</html>