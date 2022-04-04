<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

  if ($_GET["checkoutId"] && $_GET["transactionId"]) {
  $recipients = array(
    'ed@goup.co.uk' => 'Edward Coram-James',
    'humphrey@looloos.co' => 'Humphrey',
    'rob@looloos.co' => 'Rob',
    'amber@goup.co.uk' => 'Amber',
    'amber@looloos.co' => 'Amber',
    'info@looloos.co' => 'Info',
    'david@goup.co.uk' => 'David',
    'cecilia@goup.co.uk' => 'Cecilia',
  );

  $emailTo = "tom@looloos.co";


  $subject = 'Deposit Payment - looloos';

  $fromEmail = "info@looloos.co";

  $headers = "From: info@looloos.co\r\n";
  $headers .= "Reply-To: no-reply@looloos.co\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  $message = '<html><body>';
  $message .= '<table rules="all" style="border-color: #666; border:1px;" cellpadding="10">';
  $message .= "<tr style='background: #eee;'><td><strong>Checkout ID:</strong> </td><td>" . strip_tags($_GET["checkoutId"]) . "</td></tr>";
  $message .= "<tr><td><strong>Transaction ID:</strong> </td><td>" . strip_tags($_GET["transactionId"]) . "</td></tr>";


  $message .= "</table>";
  $message .= "</body></html>";

  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'contactform@goup.co.uk';                     // SMTP username
    $mail->Password   = '123grasscontact123';                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($fromEmail);
    $mail->addAddress($emailTo);               // Name is optional
    $mail->addReplyTo($fromEmail);
    foreach($recipients as $email => $name)
    {
       $mail->AddCC($email, $name);
    }


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
        $data["status"] = "success";

    } catch (Exception $e) {
      $data["status"] = "error";
      $data["error"] = "Message could not be sent. Mailer Error: ". $mail->ErrorInfo;

    }

  }
?>
<!DOCTYPE html>
<html lang="en">
<?php // site meta data
$title = "looloos Thank You payment";
$description = "Thanks, your payment was successfully submitted.";
?>
<head>
    <?php include "../_head.php" ?>
</head>

<body>

    <?php $nav = 0; include "../_navbar.php"; ?>

    <!-- Content here -->

    <header class="compensate-neg-m-2" style="background-image: url('//looloos.co/img/bg/bg-01.png')">

        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">

                    <div class="title m thank-you t-center">

                        <img src="//looloos.co/img/illustration/header-thank-you.svg" width="220" class="animate slide-in-top">
                        <h1 class="h2 t-white animate slide-in-top">Your payment was successful!</h1>
                        <h2 class="h3 sm t-white animate slide-in-top">You can expect to hear from your toilet supplier very soon.</h2>
                        <p class="t-white lg animate slide-in-top">We’ve sent a confirmation email to you. Remember - you have 7 days to cancel your booking and we’ll refund you the full deposit amount, no questions asked.
<br/><br/>
Contact us using <a href="mailto:info@looloos.co" style="color: white;">info@looloos.co</a> anytime.</p>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <section class="no-pad-top">
        <div class="container">
            <div class="row neg-m-2 compensate-m-gutter">

              <div class="col-6 col-lg-4 m-gutter animate slide-in-left">
                  <a href="//looloos.co/commercial-portable-toilet-hire/events/" class="item-block transition-link">
                      <img src="//looloos.co/img/photo/01.jpg" alt="Events" width="700" height="350">
                      <div class="wrap">
                          <h4 class="t-primary">Events</h4>
                          <p class="xs t-gray desktop">Temporary toilet hire for outside events and venues with limited facilities.</p>
                      </div>
                  </a>
              </div>

              <div class="col-6 col-lg-4 m-gutter animate slide-in-left">
                  <a href="//looloos.co/private-portable-toilet-hire/parties/" class="item-block transition-link">
                      <img src="//looloos.co/img/photo/02.jpg" alt="Parties" width="700" height="350">
                      <div class="wrap">
                          <h4 class="t-primary">Parties</h4>
                          <p class="xs t-gray desktop">Temporary toilet hire for parties in the woods, at private campsites and more.</p>
                      </div>
                  </a>
              </div>

              <div class="col-6 col-lg-4 m-gutter animate slide-in-left">
                  <a href="//looloos.co/private-portable-toilet-hire/wedding-toilets/" class="item-block transition-link">
                      <img src="//looloos.co/img/photo/03.jpg" alt="Weddings" width="700" height="350">
                      <div class="wrap">
                          <h4 class="t-primary">Weddings</h4>
                          <p class="xs t-gray desktop">Book luxury portable toilets, accessible units and more for your wedding or reception.</p>
                      </div>
                  </a>
              </div>

              <div class="col-6 col-lg-4 m-gutter animate slide-in-left">
                  <a href="//looloos.co/commercial-portable-toilet-hire/construction-site-toilets/" class="item-block transition-link">
                      <img src="//looloos.co/img/photo/04.jpg" alt="Construction" width="700" height="350">
                      <div class="wrap">
                          <h4 class="t-primary">Construction</h4>
                          <p class="xs t-gray desktop">Quick, fully managed delivery and removal of portable toilets to your site.</p>
                      </div>
                  </a>
              </div>

              <div class="col-6 col-lg-4 m-gutter animate slide-in-left">
                  <a href="//looloos.co/commercial-portable-toilet-hire/campsite-toilets/" class="item-block transition-link">
                      <img src="//looloos.co/img/photo/05.jpg" alt="Campsites" width="700" height="350">
                      <div class="wrap">
                          <h4 class="t-primary">Campsites</h4>
                          <p class="xs t-gray desktop">Hire toilets for a campsite, anywhere in the UK, whenever you need them.</p>
                      </div>
                  </a>
              </div>

              <div class="col-6 col-lg-4 m-gutter animate slide-in-left">
                  <a href="//looloos.co/private-portable-toilet-hire/home-renovation/" class="item-block transition-link">
                      <img src="//looloos.co/img/photo/06.jpg" alt="Home Renovation" width="700" height="350">
                      <div class="wrap">
                          <h4 class="t-primary">Home Renovation</h4>
                          <p class="xs t-gray desktop">Make life during a renovation easier with a portable toilet at your home.</p>
                      </div>
                  </a>
              </div>

              <div class="col-6 col-lg-4 m-gutter animate slide-in-left">
                  <a href="//looloos.co/commercial-portable-toilet-hire/festival-toilets/" class="item-block transition-link">
                      <img src="//looloos.co/img/photo/07.jpg" alt="Events" width="700" height="350">
                      <div class="wrap">
                          <h4 class="t-primary">Festivals</h4>
                          <p class="xs t-gray desktop">Book clean, practical loos for festivals, with delivery before attendees arrive.</p>
                      </div>
                  </a>
              </div>

            </div>
        </div>
    </section>


    <!-- ------------ -->

    <?php include "../_footer.php"; ?>
    <?php include "../_js.php"; ?>

</body>

</html>
