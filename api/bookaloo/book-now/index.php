<?php
    $postcode = "";
    if (isset($_GET['postcode'])) $postcode = $_GET['postcode'];
?>
<?php // site meta data
$title = "Bookaloo Now";
$description = "In order for us to generate your instant quote and to connect you with the right supplier for your requirements, please fill in our form.";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../_head.php" ?>
</head>

<body class="bg-brand">

    <?php $nav = 0; include "../_navbar.php"; ?>

    <!-- Content here -->

    <div class="bg-brand-wrap">

        <section class="header">
            <div class="container">

                <div class="row">

                    <div class="col-md-4">
                        <div class="sidebar">

                            <div class="title m-md-fixed animate slide-in-left">
                                <h1 class="sm t-white">Bookaloo Now</h1>
                                <p class="t-white sm">In order for us to generate your instant quote and to connect you with the right supplier for your requirements, please fill in our form.</p>
                            </div>

                            <ul class="steps-nav animate slide-in-left">
                                <li class="step-1 active">
                                    <button type="button" data="1"><span>Step 1</span></button>
                                </li>
                                <li class="step-2">
                                    <button type="button" data="2"><span>Step 2</span></button>
                                </li>
                                <li class="step-3">
                                    <button type="button" data="3"><span>Step 3</span></button>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="box-form animate slide-in-left">
                            <form class="book" method="post" action="//bookaloo.co/book-send.php" novalidate>

                                <div class="step step-1 active">

                                    <div class="form-step">

                                        <h4 class="t-primary m-md required">1. Confirm your event postcode:</h4>

                                        <div class="form-group">
                                            <input type="text" class="form-control lg" placeholder="e.g EC4R 3TE" name="form-postcode" id="form-1-1" value="<?php echo $postcode ?>">
                                        </div>

                                    </div>

                                    <div class="form-step">

                                        <h4 class="t-primary m-gutter">2. Type of event:</h4>

                                        <div class="row compensate-m-gutter">

                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-icon-control">
                                                        <input type="radio" value="Event" name="form-event" id="form-1-2-1" />
                                                        <label for="form-1-2-1">
                                                            <img src="//bookaloo.co/img/icon/form-01.svg" />
                                                            <span class="secondary">Event</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-icon-control">
                                                        <input type="radio" value="Party" name="form-event" id="form-1-2-2" />
                                                        <label for="form-1-2-2">
                                                            <img src="//bookaloo.co/img/icon/form-02.svg" />
                                                            <span class="secondary">Party</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-icon-control">
                                                        <input type="radio" value="Wedding" name="form-event" id="form-1-2-3" />
                                                        <label for="form-1-2-3">
                                                            <img src="//bookaloo.co/img/icon/form-03.svg" />
                                                            <span class="secondary">Wedding</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-icon-control">
                                                        <input type="radio" value="Construction" name="form-event" id="form-1-2-4" />
                                                        <label for="form-1-2-4">
                                                            <img src="//bookaloo.co/img/icon/form-04.svg" />
                                                            <span class="secondary">Construction</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-icon-control">
                                                        <input type="radio" value="Camping" name="form-event" id="form-1-2-5" />
                                                        <label for="form-1-2-5">
                                                            <img src="//bookaloo.co/img/icon/form-05.svg" />
                                                            <span class="secondary">Camping</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-icon-control">
                                                        <input type="radio" value="Home Renovation" name="form-event" id="form-1-2-6" />
                                                        <label for="form-1-2-6">
                                                            <img src="//bookaloo.co/img/icon/form-06.svg" />
                                                            <span class="secondary">Home Renovation</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-icon-control">
                                                        <input type="radio" value="Festival" name="form-event" id="form-1-2-7" />
                                                        <label for="form-1-2-7">
                                                            <img src="//bookaloo.co/img/icon/form-07.svg" />
                                                            <span class="secondary">Festival</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-step">
                                        <h4 class="t-primary m-gutter required">3. Type of loo: <span>(You may select more than 1 type)</span></h4>

                                        <div class="row compensate-m-gutter">

                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="form-group m-gutter">
                                                    <div class="check-control">
                                                        <input type="checkbox" value="Luxury" name="form-type-1" id="form-1-3-1" />
                                                        <label for="form-1-3-1">
                                                            <span>Luxury</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="form-group m-gutter">
                                                    <div class="check-control">
                                                        <input type="checkbox" value="Plastic" name="form-type-2" id="form-1-3-2" />
                                                        <label for="form-1-3-2">
                                                            <span>Plastic</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="form-group m-gutter">
                                                    <div class="check-control">
                                                        <input type="checkbox" value="Disabled" name="form-type-3" id="form-1-3-3" />
                                                        <label for="form-1-3-3">
                                                            <span>Disabled</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="form-group m-gutter">
                                                    <div class="check-control">
                                                        <input type="checkbox" value="Eco" name="form-type-4" id="form-1-3-4" />
                                                        <label for="form-1-3-4">
                                                            <span>Eco</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-step">
                                        <h4 class="t-primary m-gutter required">4. Approximate number of people requiring toilets:</h4>

                                        <div class="row compensate-m-gutter">
                                            <div class="col-lg-9">

                                                <div class="form-group m-gutter">
                                                    <select class="form-control" name="form-people-number" id="form-1-4" required>
                                                        <option value="" disabled selected hidden>Please select</option>
                                                        <option>Less than 10</option>
                                                        <option>10 - 50</option>
                                                        <option>51 - 200</option>
                                                        <option>201 - 500</option>
                                                        <option>501 - 1,000</option>
                                                        <option>More than 1,000</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-step">
                                        <h4 class="t-primary m-gutter required">5. The first day you require toilets:</h4>

                                        <div class="row gutter-sm compensate-m-gutter">
                                            <div class="col-lg-8">

                                                <h6 class="t-primary m-gutter required">i. Please select a date</h6>

                                                <div class="datepicker m-gutter"></div>

                                            </div>

                                            <div class="col-lg-4">

                                                <h6 class="t-primary m-gutter required">ii. Approx delivery time</h6>

                                                <div class="row">

                                                    <div class="col-6 col-sm-4 col-lg-12">
                                                        <div class="form-group m-gutter">
                                                            <div class="radio-control">
                                                                <input type="radio" name="form-delivery-time" id="form-1-5-1" value="Morning" />
                                                                <label for="form-1-5-1">
                                                                    <span>Morning</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-6 col-sm-4 col-lg-12">
                                                        <div class="form-group m-gutter">
                                                            <div class="radio-control">
                                                                <input type="radio" name="form-delivery-time" id="form-1-5-2" value="Afternoon" />
                                                                <label for="form-1-5-2">
                                                                    <span>Afternoon</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-6 col-sm-4 col-lg-12">
                                                        <div class="form-group m-gutter">
                                                            <div class="radio-control">
                                                                <input type="radio" name="form-delivery-time" id="form-1-5-3" value="Evening" />
                                                                <label for="form-1-5-3">
                                                                    <span>Evening</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-9">

                                                <h6 class="t-primary m-gutter required">iii. How long for</h6>

                                                <div class="form-group m-gutter">
                                                    <select class="form-control" name="form-how-long" id="form-1-6-1" required>
                                                        <option value="" disabled selected hidden>Please select</option>
                                                        <option>1 day</option>
                                                        <option>2 days</option>
                                                        <option>3 days</option>
                                                        <option>4 days</option>
                                                        <option>5 days</option>
                                                        <option>6 days</option>
                                                        <option>7 days</option>
                                                        <option>Longer</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-footer">
                                        <button type="button" class="btn btn-secondary next" data="2">Next<span class="angle-right"></span></button>
                                    </div>
                                </div>

                                <div class="step step-2" style="display: none">

                                    <div class="form-step">
                                        <h4 class="t-primary m-gutter">1. Water access: <span>(Do you know if the facility can be connected to mains water)</span></h4>

                                        <div class="row compensate-m-gutter">

                                            <div class="col-6 col-sm-4 col-md-4">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-control">
                                                        <input type="radio" name="form-water-access" id="form-2-1-1"  checked="checked" value="Unknown" />
                                                        <label for="form-2-1-1">
                                                            <span>Unknown</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-control">
                                                        <input type="radio" name="form-water-access" id="form-2-1-2" value="Mains" />
                                                        <label for="form-2-1-2">
                                                            <span>Mains</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-control">
                                                        <input type="radio" name="form-water-access" id="form-2-1-3" value="No mains" />
                                                        <label for="form-2-1-3">
                                                            <span>No mains</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-step">
                                        <h4 class="t-primary m-gutter">2. Mains drainage: <span>(Do you know if waste will be plumbed into a mains sewer system)</span></h4>

                                        <div class="row compensate-m-gutter">

                                            <div class="col-6 col-sm-4 col-md-4">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-control">
                                                        <input type="radio" name="form-drainage" id="form-2-2-1" checked="checked" value="Unknown" />
                                                        <label for="form-2-2-1">
                                                            <span>Unknown</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-control">
                                                        <input type="radio" name="form-drainage" id="form-2-2-2" value="Yes" />
                                                        <label for="form-2-2-2">
                                                            <span>Yes</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-control">
                                                        <input type="radio" name="form-drainage" id="form-2-2-3" value="No" />
                                                        <label for="form-2-2-3">
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-step">
                                        <h4 class="t-primary m-gutter">3. Mains power: <span>(Do you know if the facilities can be plugged in to mains power)</span></h4>

                                        <div class="row compensate-m-gutter">

                                            <div class="col-6 col-sm-4 col-md-4">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-control">
                                                        <input type="radio" name="form-power" id="form-2-3-1" checked="checked" value="Unknown" />
                                                        <label for="form-2-3-1">
                                                            <span>Unknown</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-control">
                                                        <input type="radio" name="form-power" id="form-2-3-2" value="Yes" />
                                                        <label for="form-2-3-2">
                                                            <span>Yes</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-control">
                                                        <input type="radio" name="form-power" id="form-2-3-3" value="No (usually a generator)" />
                                                        <label for="form-2-3-3">
                                                            <span>No (usually a generator)</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-step">
                                        <h4 class="t-primary m-gutter">4. Terrain: <span>(Do you know what sort of surface the facilities will sit on)</span></h4>

                                        <div class="row compensate-m-gutter">

                                            <div class="col-6 col-sm-4 col-md-4">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-control">
                                                        <input type="radio" name="form-terrain" id="form-2-4-1" checked="checked" value="Unknown" />
                                                        <label for="form-2-4-1">
                                                            <span>Unknown</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-control">
                                                        <input type="radio" name="form-terrain" id="form-2-4-2" value="Man-name (eg. concrete, indoors)" />
                                                        <label for="form-2-4-2">
                                                            <span>Man-made<br>(eg. concrete, indoors)</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-sm-4 col-md-4">
                                                <div class="form-group m-gutter">
                                                    <div class="radio-control">
                                                        <input type="radio" name="form-terrain" id="form-2-4-3" value="Grass" />
                                                        <label for="form-2-4-3">
                                                            <span>Grass</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>


                                    <div class="form-footer">
                                        <button type="button" class="btn btn-secondary-o back" data="1"><span class="angle-left"></span>Back</button>

                                        <button type="button" class="btn btn-secondary next" data="3">Next<span class="angle-right"></span></button>
                                    </div>
                                </div>

                                <div class="step step-3" style="display: none">

                                    <div class="form-step">
                                        <h4 class="t-primary m-gutter">1. Contact Information:</h4>

                                        <div class="form-group m-gutter">
                                            <label class="required">Email</label>
                                            <input type="text" class="form-control lg" placeholder="name@example.com" name="form-email" id="form-3-1">
                                        </div>

                                        <div class="form-group m-gutter">
                                            <label class="required">Full Name</label>
                                            <input type="text" class="form-control lg" placeholder="Full Name" name="form-name" id="form-3-2">
                                        </div>

                                        <div class="form-group m-gutter">
                                            <label>Company (if applicable)</label>
                                            <input type="text" class="form-control lg" placeholder="Company Name" name="form-company" id="form-3-3">
                                        </div>

                                        <div class="form-group m-gutter">
                                            <label>Phone Number (optional)</label>
                                            <input type="text" class="form-control lg" placeholder="Phone Number" name="form-phone" id="form-3-4">
                                        </div>

                                        <div class="form-group">
                                            <div class="check-control">
                                                <input type="checkbox" name="form-terms" id="form-3-5" value="Terms Accepted" />
                                                <label for="form-3-5">
                                                    <span class="sm">I agree to the <a href="//www.bookaloo.co/terms-conditions" target="_blank">Terms &amp; Conditions</a></span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-footer">
                                        <button type="button" class="btn btn-secondary-o back" data="2"><span class="angle-left"></span>Back</button>

                                        <button type="submit" class="btn btn-secondary submit">Submit</button>
                                    </div>
                                    <div class="error email-not-sent-error">
                                        There was an error sending you email. Please try again.
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>


            </div>
        </section>

    </div>

    <!-- ------------ -->

    <?php include "../_footer.php"; ?>
    <?php include "../_js.php"; ?>

</body>

</html>
