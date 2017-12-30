<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="<?php echo base_url('assets/images/banner/logo.png');?>" type="image/png">
    <title>Our Daily Supply</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/uikit/uikit.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/uikit/custom.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/uikit/font-awesome.css');?>">
    <!-- End Of CSS -->

</head>
<body>

<!--Hook Header-->
<?php include 'partials/header.php' ?>
<!--End Hook Header-->

<!--Contents-->

<div class="uk-section uk-section-default">
    <div class="uk-container">

        <?php include 'partials/products.php'?>

    </div>
</div>

<div class="uk-section uk-section-muted uk-position-z-index">
    <div class="uk-container">

        <?php include 'partials/lookbook.php'?>

    </div>
</div>

<div class="uk-container-expand uk-margin-auto-vertical uk-light ">
    <!--        <div class="uk-height-viewport uk-background-fixed uk-background-image uk-background-center-center uk-light uk-flex" style="background-image: url(./images/banner/banner2.jpg);">-->
    <div class="aitsclearance-sales">
        <div uk-scrollspy="cls:uk-animation-fade .uk-grid; delay: 500; repeat: true"  class="aitsclearance-sales-text uk-responsive-width">
            <h2>We dedicate Volume 1.0
                <br> from Our Daily Supply
                <br>With</h2>

            <h5>100% COTTON</h5>
        </div>
    </div>
    <!--        </div>-->
</div>

<div class="uk-section uk-section-muted uk-position-z-index">
    <div class="uk-container">

        <?php include 'partials/category.php'?>

    </div>
</div>

<div id="test-filter" class="uk-height-large uk-background-cover uk-overflow-hidden uk-flex uk-flex-top" uk-parallax="sepia: 100;" style="background-image: url('assets/images/banner/banner5.jpg');">

    <h1 class="uk-width-1-2@m uk-text-center uk-margin-auto uk-margin-auto-vertical" uk-parallax="target: #test-filter; blur: 0,10;"></h1>

</div>

<!--End Contents-->

<!--Hook Footer-->
<?php include 'partials/footer.php' ?>
<!--End Hook Footer-->



<!--Javascript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/uikit/uikit.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/uikit/uikit-icons.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/custom.js');?>"></script>
<!--End Of Javascript-->

<script>
    UIkit.ready(function () {
        UIkit.nav(UIkit.$('.uk-nav-offcanvas'));
    });
</script>

</body>
</html>