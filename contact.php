<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>


<div class="page-wrapper">

    <section class="section light">

        <div class="container contact-grid">

            <!-- LEFT SIDE -->
            <div class="contact-left">
                <h3>Contact Us:</h3>

                <p>E-mail: <a href="mailto:parvezmosharofinfo@gmail.com">parvezmosharofinfo@gmail.com </a></p>

                <div class="links">
                    <a href="https://github.com/parvez-mosharof/" target="_blank"title="GitHub">
                        <i class="fab fa-github"></i> GitHub
                    </a>
                    <a href="https://www.linkedin.com/in/parvezmosharof123" target="_blank"title="LinkedIn">
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

                    $to = "parvezmosharofinfo@gmail.com";
                    $subject = "New message from portfolio";

                    $body  = "Name: $name\n";
                    $body .= "Email: $email\n\n";
                    $body .= "Message:\n$message";

                    $headers = "From: $email";

                    if (mail($to, $subject, $body, $headers)) {
                        echo "<p style='color:green;'>Message sent successfully.</p>";
                    } else {
                        echo "<p style='color:red;'>Message failed to send.</p>";
                    }
                }
                ?>

            </div>

        </div>
    </section>
</div>
<?php include 'includes/footer.php'; ?>