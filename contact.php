<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<?php
// Load Composer's autoloader
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Initialize variables for feedback messages
$feedbackMsg = '';
$feedbackColor = '';
?>

<div class="page-wrapper">

    <section class="section light">

        <div class="container contact-grid">

            <!-- LEFT SIDE -->
            <div class="contact-left">
                <h3>Contact Us:</h3>

                <p>E-mail: <a href="mailto:parvezmosharofinfo@gmail.com">parvezmosharofinfo@gmail.com</a></p>

                <div class="links">
                    <a href="https://github.com/parvez-mosharof/" target="_blank" title="GitHub">
                        <i class="fab fa-github"></i> GitHub
                    </a>
                    <a href="https://www.linkedin.com/in/parvezmosharof123" target="_blank" title="LinkedIn">
                        <i class="fab fa-linkedin"></i> LinkedIn
                    </a>
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="contact-right">

                <h3>Send Your Message</h3>

                <form method="POST" action="contact.php">

                    <input type="text" name="name" placeholder="Your Name" required>

                    <input type="email" name="email" placeholder="Your Email" required>

                    <textarea name="message" rows="5" placeholder="Your Message" required></textarea>

                    <button type="submit" name="send">Send</button>

                </form>
                <?php
                if (isset($_POST['send'])) {
                    $name = htmlspecialchars($_POST['name']);
                    $email = htmlspecialchars($_POST['email']);
                    $message = htmlspecialchars($_POST['message']);

                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.gmail.com';
                        $mail->SMTPAuth   = true;

                        $mail->Username = getenv('SMTP_USER'); // Gmail
                        $mail->Password = getenv('SMTP_PASS'); // App password

                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port = 587;
                        //Recipients
                        $mail->setFrom('parvezmosharofinfo@gmail.com', 'Portfolio Contact Form');
                        $mail->addAddress('parvezmosharofinfo@gmail.com');

                        // Content
                        $mail->isHTML(false);
                        $mail->Subject = 'New message from portfolio';
                        $mail->Body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";

                        $mail->send();
                        $feedbackMsg = 'Message sent successfully.';
                        $feedbackColor = 'green';
                    } catch (Exception $e) {
                        $feedbackMsg = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        $feedbackColor = 'red';
                    }

                    if ($feedbackMsg) {
                        echo "<p style='color:{$feedbackColor}; margin-top:15px;'>{$feedbackMsg}</p>";
                    }
                }
                ?>

            </div>

        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>