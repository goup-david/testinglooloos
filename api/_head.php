<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo $description; ?>">
<meta name="author" content="">
<title><?php echo $title; ?></title>

<!-- Favicon -->
<link rel="icon" href="https://looloos.co/img/brand/favicon.png" type="image/x-icon" />
<link rel="shortcut icon" href="https://looloos.co/img/brand/favicon.png" type="image/x-icon" />
<link rel="apple-touch-icon" href="https://looloos.co/img/brand/favicon.png">

<!-- CSS -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" >
<link rel="stylesheet" href="https://use.typekit.net/yqs7hnc.css">
<link href="/css/app.css" rel="stylesheet" type="text/css">
<link href="https://looloos.co/css/edits.css" rel="stylesheet" type="text/css">
<!-- <link href="/css/edits.css" rel="stylesheet" type="text/css"> -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-151052355-1"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());
 gtag('config', 'UA-151052355-1');
</script>


<?php 
    if(!isset($_COOKIE['covid-banner'])) :
    ?>

    <div class="covid19-banner">
        <div class="covid19-banner__wrapper">
        <p>Due to Covid-19, your booking may take a little longer than usual - <span id="covid19-learn-more">Learn More</span><span id="covid19-banner-close"></span></p>
        </div>
    </div>
    <div class="covid19-overlay"></div>
    <div class="covid19-popup">
        <span id="covid19-popup-close"></span>
        <p>Due to the Coronavirus, our suppliers are taking extra measures to ensure that your event runs smoothly. Increased hygiene and safety protocols will vary amongst suppliers, and will be discussed with you on a individual basis before taking a deposit.</p>
        <p>Looloos itself is not a toilet hire company, and is therefore not subject to such measures. We work with the top suppliers in the country to provide you with the best experience and will do all we can to help you find the most competitive toilet hire rates during Covid-19.</p>
        <p>Please check back regularly to find out the latest information on our supplier policies.</p>
    </div>


    <?php endif; ?>