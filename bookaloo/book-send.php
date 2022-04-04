<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

  if ($_POST) {
  $recipients = array(
    'ed@goup.co.uk' => 'Edward Coram-James',
    'humphrey@bookaloo.co' => 'Humphrey',
    'rob@bookaloo.co' => 'Rob',
    'amber@goup.co.uk' => 'Amber',
    'assistant@cci.co' => 'Assistant'
  );

  $emailTo = "tom@bookaloo.co";

  $subject = 'Quote - Bookaloo Now';

  $fromEmail = strip_tags($_POST['fEmail']);

  $headers = "From: " . strip_tags($_POST['fEmail']) . "\r\n";
  $headers .= "Reply-To: ". strip_tags($_POST['fEmail']) . "\r\n";
  $headers .= "CC: susan@example.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  $message = '<html><body>';
  $message .= '<table rules="all" style="border-color: #666; border:1px;" cellpadding="10">';
  $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['fName']) . "</td></tr>";
  $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['fEmail']) . "</td></tr>";
  $message .= "<tr><td><strong>Company:</strong> </td><td>" . strip_tags($_POST['fCompany']) . "</td></tr>";
  $message .= "<tr><td><strong>Phone:</strong> </td><td>" . strip_tags($_POST['fPhone']) . "</td></tr>";
  $message .= "<tr><td><strong>Postcode:</strong> </td><td>" . strip_tags($_POST['fPostcode']) . "</td></tr>";
  $message .= "<tr><td><strong>Event:</strong> </td><td>" . strip_tags($_POST['fEvent']) . "</td></tr>";

  $type_of_loo = '';
  if ($_POST['looLuxury'] === 'true') $type_of_loo .= 'Luxury, ';
  if ($_POST['looPlastic'] === 'true') $type_of_loo .= 'Plastic, ';
  if ($_POST['looDisabled'] === 'true') $type_of_loo .= 'Disabled, ';
  if ($_POST['looEco'] === 'true') $type_of_loo .= 'Eco, ';
  $type_of_loo = substr($type_of_loo, 0, -2);

  $message .= "<tr><td><strong>Type of loo:</strong> </td><td>" . $type_of_loo . "</td></tr>";
  $message .= "<tr><td><strong>Number of people:</strong> </td><td>" . strip_tags($_POST['fPeopleNumber']) . "</td></tr>";
  $message .= "<tr><td><strong>Date:</strong> </td><td>" . strip_tags($_POST['fDate']) . "</td></tr>";
  $message .= "<tr><td><strong>Approx delivery time:</strong> </td><td>" . strip_tags($_POST['fDeliveryTime']) . "</td></tr>";
  $message .= "<tr><td><strong>How long for:</strong> </td><td>" . strip_tags($_POST['fHowLong']) . "</td></tr>";

  $message .= "<tr><td><strong>Water access:</strong> </td><td>" . strip_tags($_POST['fWaterAccess']) . "</td></tr>";
  $message .= "<tr><td><strong>Mains drainage:</strong> </td><td>" . strip_tags($_POST['fDrainage']) . "</td></tr>";
  $message .= "<tr><td><strong>Mains power:</strong> </td><td>" . strip_tags($_POST['fPower']) . "</td></tr>";
  $message .= "<tr><td><strong>Terrain:</strong> </td><td>" . strip_tags($_POST['fTerrain']) . "</td></tr>";


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
        echo 'Success';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  // if (mail($to, $subject, $message, $headers)) {
  //   echo 'Success';
  // } else {
  //   echo 'Error';
  // }
}

?>
