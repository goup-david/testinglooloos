<!DOCTYPE html>
<html lang="en">
<?php // site meta data
$title = "Terms & Conditions - looloos";
$description = "A list of terms and conditions for looloos";
?>
<head>
    <?php include "../_head.php" ?>
</head>
<style>
.title-h3{

}
ol { counter-reset: item; }
ol li{ display: block; }
ol li:before {
  text-indent: 0px;
  content: counters(item, ".") " "!important;
  counter-increment: item!important;
}
ol.terms-list li p{
  position: relative;
  font-size: 15px;
  margin-bottom: 20px;
  margin-top: 20px;
  line-height: 170%;
  padding-left: 7px;
  font-family: acumin-pro, sans-serif;
  font-weight: 300;
  height: 100%;
  color: #393d44;

}
ol.terms-list>li>ol{
   counter-reset: letter!important;
}
ol.terms-list>li>ol>li::before {
  text-indent: 0px;
  content: counter(letter, lower-alpha) ". "!important; /* increment the letters in general */
  counter-increment: letter!important;
  position: absolute;

}
ol.terms-list>li>ol>li{
  margin-bottom: 5px;
}
ol.terms-list>li>ol>li>p{
  display: inline-block!important;
  position: relative;
  font-size: 15px;
  margin-bottom: 15px;
  margin-top: 0;
  line-height: 170%;
  padding-left: 20px;
  font-family: acumin-pro, sans-serif;
  font-weight: 300;
  height: 100%;
  color: #393d44;
}
.hidenumber>li:before {
  text-indent: 4000px;
  display: block;
  overflow: hidden;
}
</style>
<body>

    <?php $nav = 0; include "../_navbar.php"; ?>

    <!-- Content here -->

    <header style="background-image: url('//looloos.co/img/bg/bg-01.png')">

        <div class="container">
            <div class="row">

                <div class="col-md-5 col-xl-4">
                    <h1 class="t-white animate slide-in-top">Terms and Conditions</h1>
                </div>

                <div class="col-md-7 col-xl-7 offset-xl-1 animate slide-in-left">
                    <p class="xs t-white">We like to be as transparent as possible with all Our customers so We would therefore like to draw your attention to clause 6 where we set out Looloos’s and our Partners’ liability to you and in particular where it may be limited.</p>
                    <p class="xs t-white no-m">Our Data Promise last updated: 05 December 2019.</p>
                </div>

            </div>
        </div>
    </header>

    <section>
      <ol class="hidenumber">
        <li>
        <div class="container m-md-fixed">

            <div class="row compensate-m">
                <div class="col-md-5 col-xl-4 animate slide-in-left">
                    <div class="title m-md">
                        <h2 class="h3 t-primary">1. These Terms</h2>
                    </div>
                </div>
                <div class="col-md-7 col-xl-7 offset-xl-1 animate slide-in-left">
                    <ol class="terms-list">
                        <li class="h4 t-primary"><span >What These Terms Cover.</span>
                        <p>These are our terms and conditions on which we (and our Partners) supply our Services to you as a Private Customer. </p></li>
                        <li class="h4 t-primary"><span class="h4 t-primary">Why You Should Read These Terms.</span>
                           <p>Please read these Terms carefully before you submit your booking to Looloos. These Terms explain to you who Looloos are, the Services we provide you and the Services provided by our Partners.</p>

                        </li>
                        <li class="h4 t-primary"><span >Definitions used in these Terms.</span>
                        <p><strong>Looloos/our/us/we:</strong> refers to Bookaloo Limited.</p>
                        <p><strong>Looloos Quote:</strong> the quote given to you by Looloos in accordance with clause 2.5(a) together with any additional charges as set out in clause 2.5(d).</p>
                        <p><strong>Looloos Site:</strong> our website, which can be found at www.Looloos.co </p>
                        <p><strong>Booking:</strong> acceptance of your Booking Request by Looloos.</p>
                        <p><strong>Booking Request:</strong> the process of the customer filling in the Booking Request Form setting out his portable toilet requirements.</p>
                        <p><strong>Booking Request Form:</strong> the online form on the Looloos Site which you will complete and submit to Looloos which provides Looloos with the information we require to provide you with the Looloos Quote.</p>
                        <p><strong>Comprehensive Requirements List:</strong> a full and complete list of all [requirements to be provided by our Partners].</p>
                        <p><strong>Contract:</strong> once we have accepted your Booking Request, provided you with a Looloos Quote and you have confirmed that you wish to proceed with a Price Option, a Contract is created.</p>
                        <p><strong>Customer Care Team:</strong> our dedicated Customer Care team.</p>
                        <p>[<strong>Edit:</strong> An edit shall mean any amendment or, change or exclusion of the chosen service to any aspect of the delivery of the Services to be provided to include but not be limited to dates, timeslots, contact details, addresses, floor or level or special instructions.]</p>
                        <p><strong>Job Number:</strong> upon confirming your Booking Request, Looloos will assign you a Job Number allocated to your Booking.</p>
                        <p><strong>Partner/Partners:</strong> Looloos’s Partners as described in these Terms.</p>
                        <p><strong>Price:</strong> acceptance of a specific Price Option together with any agreed amendments.</p>
                        <p><strong>Price Options:</strong> the Price Options provided to you in accordance with clause 2.5(a).</p>
                        <p><strong>Services:</strong> the services provided in accordance with these Terms by us and our Partners.</p>
                        <p><strong>Terms:</strong> these terms and condition on which we (and our Partners) supply our Services to you.</p>
                        <p><strong>Urgent Booking:</strong> a Booking made with less than 48 hours’ notice.</p>
                        <p><strong>Wait Time:</strong>  2 hours</p>
                        <p>A reference to <strong>writing</strong> or <strong>written</strong> includes email, live chat and post.</p>
                      </li>

                    </ol>
                </div>
            </div>

        </div>
      </li>
      <li>
        <div class="container">

            <div class="row compensate-m">
                <div class="col-md-5 col-xl-4 animate slide-in-left">
                    <div class="title m-md">
                        <h2 class="h3 t-primary">2. Information about and how to contact Looloos</h2>
                    </div>
                </div>
                <div class="col-md-7 col-xl-7 offset-xl-1 animate slide-in-left">

                  <ol class="terms-list">
                      <li class="h4 t-primary"><span >Who we are</span>
                      <p>We are Bookaloo Limited, a company registered in England and Wales. Our company registration number is 11694479 and our registered office is at Eccleston Yards, 25 Eccleston Place, London SW1W 9NF. Our registered VAT number is 334076514.</p></li>
                      <li class="h4 t-primary"><span >How to contact us.</span>
                      <p>You can contact our Customer Care Team by:
                        <ol type="a">
                          <li><p>email: [<a href="mailto:info@looloos.co">info@looloos.co</a>];</p></li>
                          <li><p>post: [c/o ‘Customer Care Team’, Bookaloo Ltd, Eccleston Yards, Eccleston Place, London, SW1W 9NF]</li>
                          <li><p>visiting the Looloos Site.</p></li>
                        </ol>
                        </p></li>
                      <li class="h4 t-primary"><span >How Looloos will contact you.</span>
                      <p>If we have to contact you, we will do so by telephone, in writing to the email or postal address provided in your Booking Request Form or by text message to the mobile number provided in your Booking Request Form.</p></li>
                      <li class="h4 t-primary"><span >Disclosed Agent</span>
                      <ol type="a">
                        <li><p>When you enter into the Contract with Looloos in accordance with these Terms, it will be on the basis that Looloos are acting as a disclosed agent for our Partners. Just to explain some the of the legal jargon, a “disclosed agent” means that we are not the principal and that by entering into the Contract with us, you do so on the basis that you are aware that we are acting as agent for one of our Partners who will be carrying out the Services for you. Looloos are entitled and authorised by our Partners to (i) enter into this Contract with you on their behalf and to arrange the Services as an agent and (ii) enter into the Partner Hire Contract with you on their behalf pursuant to which they will supply you the portable toilet services. <strong>This Contract governs your relationship with Looloos and also with our Partners.</strong>
</p></li>
                        <li><p>We will introduce you to our Partners to try and enable you get the best Price and Services possible. By entering into these Terms you are acknowledging that you will enter into and be bound by the Terms and the Partner Hire Terms.</p></li>
                        <li><p>By accepting that Looloos is acting as agent for our Partners and by entering into the Contract with Looloos this will also create a contract between you and Looloos’s Partner (Partner Hire Contract). The Partner Hire Terms can be found here [insert link].You acknowledge and accept that the Partner Hire Contract will be between you and the Partner and that Looloos is not a party to the Partner Hire Contract other than as expressly provided in these Terms. You also accept that Looloos are simply accepting the Booking on your behalf and providing those services to you which they are expressly bound to provide under these Terms. Looloos will ensure that our Partners are also bound by the Terms that relate to them in this Contract.</p></li>
                        <li><p>You also acknowledge and accept that Looloos does not provide portable toilet services to any third parties and that We are simply acting as agent (and intermediary) between you and our Partner.</p></li>
                        <li><p>Once you have accepted these Terms and Conditions we shall then put you in touch with the Partner who will be providing you with the Services (and give the Partner your contact details) so you can contact them directly about your requirements.</p></li>


                      </ol>
                      </li>
                      <li class="h4 t-primary"><span >The Looloos Quote.</span>
                      <ol type="a">
                        <li><p>Looloos will supply you with Price Options which shall reflect the information provided by you when completing the Booking Request Form. The Price Options will vary depending upon a number of factors to include when the toilets are requested and the desired completion date.
</p></li>
                        <li><p>Looloos will accept material amendments to the Booking at our discretion. However, you may incur additional charges in relation to such changes. If on arrival at the address provided by you, the Partner cannot gain access to the premises, [the site is not as you described to us] and you are uncontactable by telephone (using the number provided by you on the Booking Request Form), the Partner shall be entitled at its discretion to cease provision of the Services and/or cancel the Services if you cannot be reached and access gained within the Wait Time. In this case, you shall not be entitled to receive a refund and any sums due to Looloos for Services that you have not yet paid for shall become immediately due and payable.
</p></li>
                        <li><p>For any amendments made less than 48 hours prior to the date that Services are required where we are able to accommodate these changes, you will incur additional charges.
</p></li>
                        <li><p>Additional charges may apply if the Services required and subsequently booked differ upon the arrival of the Partner.
</p></li>
                        <li><p>If the Services required are materially different to those in the Booking Request Form, the Partners shall have the right to terminate the Contract and you shall not be entitled to a Refund.
</p></li>
                        <li><p>Any additional charges incurred by you under these Terms, if not already paid for by you, shall be due and payable 5 days from the date that the Services were provided.
</p></li>
                        <li><p>If you have any questions please contact our Customer Care team.
</p></li>
                      </ol>
                      </li>
                      <li class="h4 t-primary"><span >If Looloos does not accept your Booking Request.
</span>
                      <p>If Looloos is unable to find a Partner who will undertake the Services, or such Partner decides not to accept your Booking Request, you will be notified as soon as possible in writing or by telephone. Looloos will use its reasonable endeavours to try and find another Partner to undertake the Services on your behalf. Accepting your Booking Request is at Looloos’s and / or its Partner’s discretion.
</p></li>

                      <li class="h4 t-primary"><span >Your Job Number and Deposit.
</span>
                      <p>Upon confirming your Booking Request, Looloos will assign and notify you of the Job Number allocated to your Booking. Please reference this number when contacting Looloos.
</p>
  <p>You will then be asked to pay a Deposit. Once the Deposit has been paid you will then have seven days to cancel your Booking. If you cancel the Booking within this time period this Contract will be cancelled and your Deposit will be returned. If you cancel after this time then the Deposit will be retained in accordance with the Partner Hire Terms.
</p></li>
                    </ol>
                </div>
            </div>

        </div>

      </li>
      <li>
        <div class="container">

            <div class="row compensate-m">
                <div class="col-md-5 col-xl-4 animate slide-in-left">
                    <div class="title m-md">
                        <h2 class="h3 t-primary">3. Services and our Contract with you</h2>
                    </div>
                </div>
                <div class="col-md-7 col-xl-7 offset-xl-1 animate slide-in-left">

                  <ol class="terms-list">
                    <li class="h4 t-primary"><span >Your Booking.</span>
                    <p>As set out above, Looloos will supply you with Price Options dependent on your requirements notified in the Booking Request Form. The information you provide on the Booking Request Form is used to produce the Price Options, any alteration to the information supplied on the Booking Request Form may subsequently alter the Price. Accepting a particular Price Option that best suits your needs and paying the Deposit creates a contract between you and Looloos and Our Partner in accordance with the Partner Hire Terms and these Terms.
</p></li>

                    <li class="h4 t-primary"><span >Services</span>
                      <ol type="a">
                        <li><p>The Partner will arrive at the address provided by you and on the date agreed in your Booking or any subsequent date and time notified by you to us in writing and which we or the Partner have agreed. Please note that any proposed change to the date and time that the Services are to be provided may result in a change to the Price, which will be notified to you in advance of the Services being undertaken.
</p></li>
                        <li><p>The Partner will provide the Services in accordance with these Terms and the Partner Hire Terms. If there is a conflict between these Terms and the Partner Hire Terms then the terms of the Partner Hire Terms shall prevail.
</p></li>

                      </ol>

                    </li>

                    <li class="h4 t-primary"><span >The Service Provider</span>
                    <p>The Services will be provided by one of the Partners. The Partners are approved by our dedicated Partner management team and are assessed by the Looloos team for suitability and eligibility
</p></li>

                    <li class="h4 t-primary"><span >Payment</span>
                    <p>All payments due to the Partner pursuant to the provision of the Services shall be paid to Looloos within 30 days of the date of the date of the Job unless otherwise agreed in writing between us. In the event the Job is less than 30 days away from the Booking then full payment will need to be paid on the date of Booking.
</p></li>
                  </ol>
                </div>
              </div>
           </div>
       </li>
       <li>
         <div class="container">

             <div class="row compensate-m">
                 <div class="col-md-5 col-xl-4 animate slide-in-left">
                     <div class="title m-md">
                         <h2 class="h3 t-primary">4. Customer Obligations</h2>
                     </div>
                 </div>
                 <div class="col-md-7 col-xl-7 offset-xl-1 animate slide-in-left">

                   <ol class="terms-list">
                     <li class="h4 t-primary"><p>By entering into the Contract you must comply with the following obligations. If you fail to comply with these obligations, neither Looloos nor the Partner is liable to you for any losses incurred.
                       <br/>You agree that you will:
</p>
                      <ol type="a">
                        <li><p>provide the Partner, its employees and agents unfettered access to the site
  </p></li>
                        <li><p>prepare site to be cleared from impediments and debris for delivery in accordance with the reasonable instructions of the Partner
  </p></li>
                        <li><p>provide a safe and secure working area in accordance with the reasonable instructions of the Partner
  </p></li>
                        <li><p>not interfere with any of the equipment supplied by the Partner
  </p></li>
                        <li><p>comply with all lawful and reasonable instructions of either Looloos or the Partner
  </p></li>
                        <li><p>immediately inform us and the Partner of any information or circumstances which may reasonably affect the delivery of the Services]
  </p></li>
                      </ol>
                    </li>
                   </ol>
                 </div>
               </div>
            </div>
        </li>
       <li>
         <div class="container">

             <div class="row compensate-m">
                 <div class="col-md-5 col-xl-4 animate slide-in-left">
                     <div class="title m-md">
                         <h2 class="h3 t-primary">5. Cancellation & Postponement</h2>
                     </div>
                 </div>
                 <div class="col-md-7 col-xl-7 offset-xl-1 animate slide-in-left">

                   <ol class="terms-list">
                     <li class="h4 t-primary"><span >Postponement & cancellation by the customer.</span>
                     <p>If you wish to postpone or cancel the Contract please notify us, in writing as soon as possible. If you cancel by telephone we will write to you confirming cancellation. All postponement and cancellation charges are charged as follows: </p>
                     <ol type="a">
                       <li><p>Up to 3 months before delivery 35% of the total amount</p></li>
                       <li><p>Up to 1 month before delivery 60% of the total amount</p></li>
                       <li><p>Between 1 month and delivery 80% of the total amount</p></li>
                     </ol>
                     <p>Any cross-hire charges incurred will be passed on, in total, to the Hirer in the event of a cancellation</p>
                   </li>
                     <li class="h4 t-primary"><span >Cancellation by Looloos and its Partners.</span>
                       <ol type="a">
                         <li><p>If you breach any term of this Contract then either Looloos and its Partner are entitled to terminate the Contract and/or the Partner Hire Terms.</p></li>
                         <li><p>If the Partner is unable to perform the Services agreed upon Booking (or if We are unable to find an appropriate Partner to undertake the Services), whether through its own fault or as a result of something outside of Our control then Looloos will notify you as soon as possible in writing or by telephone.</p></li>
                         <li><p>If you make a Booking, Looloos shall use its reasonable endeavours to find an available Partner as soon as possible. If Looloos is unable to do so, we are not in breach of the Contract but you will be entitled to a full refund of any monies paid to us.</p></li>
                       </ol>
                      </li>
                     <li class="h4 t-primary"><span>Refunds:</span>
                       <ol type="a">
                         <li><p>If Looloos or its Partner cancel the Contract in accordance with clause 5.2(a) you will not be entitled to a refund. If Looloos or its Partner cancel the Contract in accordance with clause 5.2(b) then you are entitled to a refund in accordance with the Partner Hire Terms from the Partner only. Looloos shall not be liable to refund you any monies.</p></li>
                       </ol></li>

                 </ol>
   </div>
 </div>
</div>
</li>
<li>
  <div class="container">

      <div class="row compensate-m">
          <div class="col-md-5 col-xl-4 animate slide-in-left">
              <div class="title m-md">
                  <h2 class="h3 t-primary">6. Liability for loss or damage</h2>
              </div>
          </div>
          <div class="col-md-7 col-xl-7 offset-xl-1 animate slide-in-left">

            <ol class="terms-list">
              <li class="h4 t-primary">
              <p>Subject to clause 6.5 Looloos shall have no liability to you for any loss or damage to any of your property or any other loss suffered by you arising out of the Contract.
</p></li>
              <li class="h4 t-primary"><p>Subject to clause 6.6 the Partner is liable for damage to your property subject to you producing satisfactory evidence that the damage was caused by the Partner and not by you or a third party. Their liability to you is limited as follows:</p>
              <ol type="a">
                <li><p>If the Partner damages property as a result of their negligence or breach of contract, they are only liable for repairing the damaged area. This liability is in accordance with the limitations of clause 6.3.</p></li>
                <li><p>The Partner is not liable for any damage caused to any property if you ignore Looloos or the Partner’s advice in relation to the Services.</p></li>
                <li><p>You must advise us by email or telephone no later than seven days after completion of the Services if any damage is caused your property. Looloos nor the Partners are liable outside of this time unless permitted by law.</p></li>
              </ol>
            </li>
              <li class="h4 t-primary"><p>Neither Looloos nor its Partners are liable for:
</p>
                <ol type="a">
                  <li><p>Damage caused as a result of your actions and/or your breach of these Terms;</p></li>
                  <li><p>Loss incurred if any of your property was already damaged or had an inherent defect;</p></li>
                  <li><p>Loss or damage not caused by Us or Our Partners, or their employees, subcontractors or agents; or</p></li>
                  <li><p>Loss which is not reasonably foreseeable.</p></li>
                </ol>
               </li>
              <li class="h4 t-primary"><p>Events outside of our control.</br>
Neither Looloos nor its Partners are liable for any damage or loss if any of the below occur:</p>
                <ol type="a">
                  <li><p>Acts of God, including but not limited to flood, drought, earthquake or other natural disaster;</p></li>
                  <li><p>Epidemic or pandemic;</p></li>
                  <li><p>Acts of war, threat or preparation for war, riot, nuclear or chemical containment, change in the law or action taken by a government or public authority, collapse of buildings, fire, explosion or accident and any labour or trade dispute, strikes industrial action or lockouts;</p></li>
                  <li><p>Delay in transit;</p></li>
                  <li><p>Any events which can reasonably be considered outside of our control.</p></li>
                </ol></li>
                <li class="h4 t-primary"><p>Neither we nor our Partners will exclude our liability for death or personal injury caused by our or the Partner’s negligence, fraudulent misrepresentation or liability which under the laws of England and Wales may not be limited or excluded.
              </p>
              </li>
          </ol>
        </div>
      </div>
    </div>
</li>
<li>
  <div class="container">

      <div class="row compensate-m">
          <div class="col-md-5 col-xl-4 animate slide-in-left">
              <div class="title m-md">
                  <h2 class="h3 t-primary">7. Complaints</h2>
              </div>
          </div>
          <div class="col-md-7 col-xl-7 offset-xl-1 animate slide-in-left">

            <ol class="terms-list">
               <li class="h4 t-primary"><span>Complaints about our Services.</span>
              <ol type="a">
                <li><p>If you have any complaints about our Services, please contact our Customer Care team who will endeavour to review your complaint and make any necessary actions within 7 days of the complaint being received.</p></li>
                <li><p>You can visit the citizens advice website on <a href="https://www.adviceguide.org.uk" target="_blank" rel="noreferrer nofollow external">www.adviceguide.org.uk</a> or call them on 0345 04 05 06 for a summary of your key legal rights.</p></li>
              </ol>
            </li>

          </ol>
        </div>
      </div>
    </div>
</li>
<li>
  <div class="container">

      <div class="row compensate-m">
          <div class="col-md-5 col-xl-4 animate slide-in-left">
              <div class="title m-md">
                  <h2 class="h3 t-primary">8. How we may use your Personal Information</h2>
              </div>
          </div>
          <div class="col-md-7 col-xl-7 offset-xl-1 animate slide-in-left">

            <ol class="terms-list">
               <li class="h4 t-primary"><span>Your Personal Information</span>
             <p>You accept that We will use the personal information you provide to us:</p>
              <ol type="a">
                <li><p>to introduce Partners to supply the Services to you and to provide the Services expressly stated as being obligations of Looloos in these Terms;</p></li>
                <li><p>to process your payment for the Services;</p></li>
                <li><p>if you agreed upon booking our Services, to give you information about similar services that We provide.</p></li>
              </ol>
              <p>We do use your personal information in other ways so please read our <a href="/privacy-policy" target="_blank">privacy policy</a> which sets out fully how we use your data.</p>
            </li>

          </ol>
        </div>
      </div>
    </div>
</li>
<li>
  <div class="container">

      <div class="row compensate-m">
          <div class="col-md-5 col-xl-4 animate slide-in-left">
              <div class="title m-md">
                  <h2 class="h3 t-primary">9. Other important terms</h2>
              </div>
          </div>
          <div class="col-md-7 col-xl-7 offset-xl-1 animate slide-in-left">

            <ol class="terms-list">
              <li class="h4 t-primary"><span>Transferring this agreement to someone else.</span>
                <p>We may transfer our rights and obligations under these Terms to another organisation. Looloos will ensure that the transfer will not affect your rights under the Contract.</p>
            </li>
            <li class="h4 t-primary"><span>Transferring your rights.</span>
              <p>You may only transfer your rights or obligations under these Terms to another person if Looloos agree to this in advance in writing.</p>
          </li>
          <li class="h4 t-primary"><span >Rights under the Contract.</span>
            <p>The Contract is between you, Looloos and Our Partner. No other person has rights to enforce any of its terms unless expressly provided for in these Terms.</p>
        </li>
        <li class="h4 t-primary"><span >The Law and the Contract.</span>
          <p>Each clause of these Terms operates separately. If any court or relevant authority decides that any of them are unlawful, the remaining clauses remain in full effect.</p>
      </li>
      <li class="h4 t-primary"><span >Enforcing the Contract.</span>
        <p>If we do not enforce these Terms immediately, or if you break the Contract and we delay taking steps against you that will not prevent us taking steps against you at a later date.</p>
    </li>
    <li class="h4 t-primary"><span >Applicable Laws to the Contract.</span>
      <p>These Terms are governed by English law and you can only bring legal proceedings in the English courts.</p>
  </li>
          </ol>
        </div>
      </div>
    </div>
</li>
    </ol>
    </section>

    <!-- ------------ -->

    <?php include "../_footer.php"; ?>
    <?php include "../_js.php"; ?>

</body>

</html>
