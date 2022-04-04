<?php
require 'squareup/vendor/autoload.php';
//Replace your access token and location ID
$accessToken = 'EAAAECT0AUzynob7AJNxAXDEqBlkXwOE4DX5nrrwGywPTpQUKCKZwP_E-qK4UT0S';
$locationId = 'DWDYAY520NJX3';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

  if ($_POST) {
  $recipients = array(
    'ed@goup.co.uk' => 'Edward Coram-James',
    'rob@looloos.co' => 'Rob',
    'amber@goup.co.uk' => 'Amber',
    'amber@looloos.co' => 'Amber',
    'info@looloos.co' => 'Info',
    'cecilia@goup.co.uk' => 'Cecilia',
  );

  $emailTo = "tom@looloos.co";


  $subject = 'Quote with Deposit - Book Now';

  $fromEmail = strip_tags($_POST['fEmail']);
  $customerEmail = strip_tags($_POST['fEmail']);

  $headers = "From: " . strip_tags($_POST['fEmail']) . "\r\n";
  $headers .= "Reply-To: ". strip_tags($_POST['fEmail']) . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  $message = '<html><body>';
  $message .= '<table rules="all" style="border-color: #666; border:1px;" cellpadding="10">';
  $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['fName']) . "</td></tr>";
  $message .= "<tr style='background: #eee;'><td><strong>20% deposit fee :</strong> </td><td>" . strip_tags($_POST['depositAmount']) . "</td></tr>";
  $message .= "<tr style='background: #eee;'><td><strong>Total amount:</strong> </td><td>" . strip_tags($_POST['totalAmount']) . "</td></tr>";
  $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['fEmail']) . "</td></tr>";
  $message .= "<tr><td><strong>Company:</strong> </td><td>" . strip_tags($_POST['fCompany']) . "</td></tr>";
  $message .= "<tr><td><strong>Phone:</strong> </td><td>" . strip_tags($_POST['fPhone']) . "</td></tr>";
  $message .= "<tr><td><strong>Postcode:</strong> </td><td>" . strip_tags($_POST['fPostcode']) . "</td></tr>";
  $message .= "<tr><td><strong>Event:</strong> </td><td>" . strip_tags($_POST['fEvent']) . "</td></tr>";



  $message .= "<tr><td><strong>Type of loo:</strong> </td><td>" . strip_tags($_POST['fToilet']) . "</td></tr>";
  $message .= "<tr><td><strong>Approximate number of men:</strong> </td><td>" . strip_tags($_POST['fMenNumber']) . "</td></tr>";
  $message .= "<tr><td><strong>Approximate number of women:</strong> </td><td>" . strip_tags($_POST['fWomenNumber']) . "</td></tr>";
  $message .= "<tr><td><strong>Date:</strong> </td><td>" . strip_tags($_POST['fDate']) . "</td></tr>";
  $message .= "<tr><td><strong>How long for:</strong> </td><td>" . strip_tags($_POST['fHowLongDays']) . "</td></tr>";

  $fDisabledUnits = "No";
  if (isset($_POST['fDisabledUnits']) && strip_tags($_POST['fDisabledUnits']) === "Yes" ) $fDisabledUnits = "Yes";
  $message .= "<tr><td><strong>Disabled Units:</strong> </td><td> ". $fDisabledUnits ." </td></tr>";


  $message .= "<tr><td><strong>Water access:</strong> </td><td>" . strip_tags($_POST['fWaterAccess']) . "</td></tr>";
  $message .= "<tr><td><strong>Mains drainage:</strong> </td><td>" . strip_tags($_POST['fDrainage']) . "</td></tr>";
  $message .= "<tr><td><strong>Mains power:</strong> </td><td>" . strip_tags($_POST['fPower']) . "</td></tr>";
  $message .= "<tr><td><strong>Terrain:</strong> </td><td>" . strip_tags($_POST['fTerrain']) . "</td></tr>";



  $message .= "</table>";
  $message .= "</body></html>";


        // echo 'Success';
        //Generate Payment link
          $depositAmount = strip_tags($_POST['depositAmount']) * 100;

          // Create and configure a new API client object
          $defaultApiConfig = new \SquareConnect\Configuration();
          $defaultApiConfig->setAccessToken($accessToken);
          $defaultApiConfig->setHost("https://connect.squareup.com");
          $defaultApiClient = new \SquareConnect\ApiClient($defaultApiConfig);
          $checkoutClient = new SquareConnect\Api\CheckoutApi($defaultApiClient);


          //Create a Money object to represent the price of the line item.
          $price = new \SquareConnect\Model\Money;
          $price->setAmount($depositAmount);
          $price->setCurrency('GBP');

          //Create the line item and set details
          $book = new \SquareConnect\Model\CreateOrderRequestLineItem;
          $book->setName('20% deposit fee');
          $book->setQuantity('1');
          $book->setBasePriceMoney($price);

          //Puts our line item object in an array called lineItems.
          $lineItems = array();
          array_push($lineItems, $book);

          // Create an Order object using line items from above
          $order = new \SquareConnect\Model\CreateOrderRequest();

          $order->setIdempotencyKey(uniqid()); //uniqid() generates a random string.

          //sets the lineItems array in the order object
          $order->setLineItems($lineItems);


          ///Create Checkout request object.
          $checkout = new \SquareConnect\Model\CreateCheckoutRequest();

          $checkout->setIdempotencyKey(uniqid()); //uniqid() generates a random string.
          $checkout->setOrder($order); //this is the order we created in the previous step.
          $checkout->setPrePopulateBuyerEmail($customerEmail);
          $checkout->setRedirectUrl('https://looloos.co/thank-you-payment/'); //Replace with the URL where you want to redirect your customers after transaction.


          try {
              $result = $checkoutClient->createCheckout(
                $locationId,
                $checkout
              );
              //Save the checkout ID for verifying transactions
              $checkoutId = $result->getCheckout()->getId();
              //Get the checkout URL that opens the checkout page.
              $checkoutUrl = $result->getCheckout()->getCheckoutPageUrl();

              $message = '<html><body>';
              $message .= '<table rules="all" style="border-color: #666; border:1px;" cellpadding="10">';
              $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['fName']) . "</td></tr>";
              $message .= "<tr style='background: #eee;'><td><strong>20% deposit fee :</strong> </td><td>" . strip_tags($_POST['depositAmount']) . "</td></tr>";
              $message .= "<tr style='background: #eee;'><td><strong>Checkout ID :</strong> </td><td>" . $checkoutId . "</td></tr>";
              $message .= "<tr style='background: #eee;'><td><strong>Total amount:</strong> </td><td>" . strip_tags($_POST['totalAmount']) . "</td></tr>";
              $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['fEmail']) . "</td></tr>";
              $message .= "<tr><td><strong>Company:</strong> </td><td>" . strip_tags($_POST['fCompany']) . "</td></tr>";
              $message .= "<tr><td><strong>Phone:</strong> </td><td>" . strip_tags($_POST['fPhone']) . "</td></tr>";
              $message .= "<tr><td><strong>Postcode:</strong> </td><td>" . strip_tags($_POST['fPostcode']) . "</td></tr>";
              $message .= "<tr><td><strong>Event:</strong> </td><td>" . strip_tags($_POST['fEvent']) . "</td></tr>";



              $message .= "<tr><td><strong>Type of loo:</strong> </td><td>" . strip_tags($_POST['fToilet']) . "</td></tr>";
              $message .= "<tr><td><strong>Approximate number of men:</strong> </td><td>" . strip_tags($_POST['fMenNumber']) . "</td></tr>";
              $message .= "<tr><td><strong>Approximate number of women:</strong> </td><td>" . strip_tags($_POST['fWomenNumber']) . "</td></tr>";
              $message .= "<tr><td><strong>Date:</strong> </td><td>" . strip_tags($_POST['fDate']) . "</td></tr>";
              $message .= "<tr><td><strong>How long for:</strong> </td><td>" . strip_tags($_POST['fHowLongDays']) . "</td></tr>";

              $fDisabledUnits = "No";
              if (strip_tags($_POST['fDisabledUnits']) === "Yes" ) $fDisabledUnits = "Yes";
              $message .= "<tr><td><strong>Disabled Units:</strong> </td><td> ". $fDisabledUnits ." </td></tr>";


              $message .= "<tr><td><strong>Water access:</strong> </td><td>" . strip_tags($_POST['fWaterAccess']) . "</td></tr>";
              $message .= "<tr><td><strong>Mains drainage:</strong> </td><td>" . strip_tags($_POST['fDrainage']) . "</td></tr>";
              $message .= "<tr><td><strong>Mains power:</strong> </td><td>" . strip_tags($_POST['fPower']) . "</td></tr>";
              $message .= "<tr><td><strong>Terrain:</strong> </td><td>" . strip_tags($_POST['fTerrain']) . "</td></tr>";



              $message .= "</table>";
              $message .= "</body></html>";

                $mail = new PHPMailer(true);
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
              $data["redirectPaymentUrl"] = $checkoutUrl;
              header('Content-type: application/json');
              echo json_encode($data);
              // print_r('Complete your transaction: ' . $checkoutUrl);
          } catch (Exception $e) {
              $data["status"] = "error";
              $data["error"] = 'Exception when calling CheckoutApi->createCheckout: '.$e->getMessage();
              header('Content-type: application/json');
              echo json_encode($data);
          }

        //End Payment link



  // if (mail($to, $subject, $message, $headers)) {
  //   echo 'Success';
  // } else {
  //   echo 'Error';
  // }
}

?>
