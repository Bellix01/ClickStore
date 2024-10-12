<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require './vendor/autoload.php';
$result = [];

if (isset($_POST['contact'])) {
    // print_r($_POST);


    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);



    $mail = new PHPMailer();


    //Server settings
    $mail->SMTPDebug =  0;                      //Enable verbose debug output
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';                                         //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
    $mail->Username   = '248edbe552b7ae';                     //SMTP username
    $mail->Password   = '1f46804c758aa5';                               //SMTP password
    // $mail->SMTPSecure = '';            //Enable implicit TLS encryption
    $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $address_recieved = array(
        'belhadjam60@gmail.com'

    );

    foreach ($address_recieved as $key => $value) {
        $mail->addAddress($value); //recieved email
    };


    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->Subject = "Contact Us : ($subject)";
    $mail->Body    = "
    <div > <strong>Name:</strong> $name </div>
    <br>
     <div> <strong>Email:</strong> $email </div>
    <br>
     <div> <strong>Phone:</strong> $subject </div>
    <br>
     <div> <strong>Message:</strong> $message </div>
    
    ";

    if ($mail->send()) {
        $result['done'] = 'Requset Send Successfully...';
    } else {
        $result['err'] = 'Requset Faild Please Try Again"...';
    }
}
include_once "header.php";
include_once "navbar.php";
?>
<section class="footer-08 py-md-5 py-2" style="background: #FFF;">
    <div class="container">

        <div class="row">
            <div class="col-md-6 m-auto mb-5 py-md-5 py-4 aside-stretch-right pl-lg-5">
                <h2 style="text-align: center;" class="footer-heading footer-heading-white">Contact us</h2>
                <!--Alert Success-->
                <div class="alert alert-success alert-dismissible" role="alert" style="  <?php if (isset($result['done'])) {
                                                                                                echo "display: block";
                                                                                            } else {
                                                                                                echo "display: none";
                                                                                            } ?>">
                    <span id="success">
                        <?php if (isset($result['done'])) echo $result['done'] ?>
                    </span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" class="contact-form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="3" name="message" class="form-control" placeholder="Your Message">
                            </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class=" py-3 btn btn-light w-100" name="contact">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include_once "./footer.php"
?>

</body>

</html>