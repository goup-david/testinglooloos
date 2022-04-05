<?php
    $postcode = "";
    if (isset($_GET['postcode'])) $postcode = $_GET['postcode'];
?>
<?php // site meta data
$title = "Enquire Now";
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
                                <h1 class="sm t-white">Enquire Now</h1>
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
                                <li class="step-4">
                                    <button type="button" data="4"><span>Step 4</span></button>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="box-form animate slide-in-left">
                            <form class="book" method="post" action="//looloos.co/book-send-email.php" novalidate>
                              <?php include "_step-1.php" ?>

                              <?php include "_step-2.php" ?>

                              <?php include "_step-3.php" ?>

                              <?php include "_step-4.php" ?>
                            </form>
                        </div>
                    </div>
                </div>


                <?php include "_loading-icon.php" ?>

            </div>
        </section>
    </div>

    <!-- ------------ -->

    <?php include "../_footer.php"; ?>
    <?php include "../_js.php"; ?>

</body>

</html>
