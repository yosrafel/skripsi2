<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title><?php echo $__env->yieldContent('title'); ?></title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- site icons -->
<link rel="icon" href="/assets/images/fevicon/logo.png" sizes="40x40" type="image/gif" />
<!-- bootstrap css -->
<link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
<!-- Site css -->
<link rel="stylesheet" href="/assets/css/style.css" />
<!-- responsive css -->
<link rel="stylesheet" href="/assets/css/responsive.css" />
<!-- colors css -->
<link rel="stylesheet" href="/assets/css/colors1.css" />
<!-- custom css -->
<link rel="stylesheet" href="/assets/css/custom.css" />
<!-- wow Animation css -->
<link rel="stylesheet" href="/assets/css/animate.css" />
<!-- revolution slider css -->
<link rel="stylesheet" type="text/css" href="/assets/revolution/css/settings.css" />
<link rel="stylesheet" type="text/css" href="/assets/revolution/css/layers.css" />
<link rel="stylesheet" type="text/css" href="/assets/revolution/css/navigation.css" />
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
<body id="default_theme" class="it_service">
<!-- loader -->
<div class="bg_load"> <img class="loader_animation" src="/assets/images/loaders/loader_els.png" alt="#" /> </div>
<!-- end loader -->
<!-- header -->
<header id="default_header" class="header_style_1">
  <!-- header top -->
  <div class="header_top" style="background-color:#FF8C00">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="full">
            <div class="topbar-left">
              <ul class="list-inline">
                <li> <span class="topbar-label"><i class="fa  fa-home"></i></span> <span class="topbar-hightlight">Jl. C. Simanjuntak 38, Yogyakarta</span> </li>
                <li> <span class="topbar-label"><i class="fa fa-envelope-o"></i></span> <span class="topbar-hightlight"><a href="mailto:sales@els.co.id">sales@els.co.id</a></span> </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 right_section_header_top">
          <div class="float-right">
            <div class="social_icon">
              <ul class="list-inline">
                <li><a class="fa fa-facebook" href="https://www.facebook.com/ElsComputer" title="Facebook" target="_blank"></a></li>
                <li><a class="fa fa-twitter" href="https://twitter.com/elscomputer?lang=id" title="Twitter" target="_blank"></a></li>
                <li><a class="fa fa-linkedin" href="https://id.linkedin.com/company/elscomputer?trk=public_profile_topcard_current_company" title="LinkedIn" target="_blank"></a></li>
                <li><a class="fa fa-instagram" href="https://www.instagram.com/elscomputer/?hl=id" title="Instagram" target="_blank"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end header top -->
  <!-- header bottom -->
  <div class="header_bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
          <!-- logo start -->
          <div class="logo"> <a href="/page/index"><img src="/assets/images/logos/logo.png" alt="logo" /></a> </div>
          <!-- logo end -->
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
          <!-- menu start -->
          <div class="menu_side">
            <div id="navbar_menu">
              <ul class="first-ul">
                <li> <a class="<?php echo $__env->yieldContent('home'); ?>" href="/page/index">Home</a></li>
                <li> <a class="<?php echo $__env->yieldContent('history'); ?>" href="/page/history">History</a></li>
                <li> <a href="/logout">logout</a></li>
              </ul>
            </div>
          </div>
          <!-- menu end -->
        </div>
      </div>
    </div>
  </div>
  <!-- header bottom end -->
</header>
<!-- end header -->

<?php echo $__env->yieldContent('content'); ?>

<!-- footer -->
<footer class="footer_style_2">
  <div class="container-fuild">
    <div class="row">
      <div class="footer_blog">
        <div class="row">
          <div class="col-md-3">
            <div class="main-heading left_text">
              <h2>Els Computer </h2>
            </div>
            <p>ELS Computer - Pusat Belanja Komputer Cari Laptop ? Cek Harga Laptop Terbaik & Terbaru !</p>
              <ul class="social_icons">
              <li class="social-icon fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li class="social-icon tw"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <div class="main-heading left_text">
              <h2>Information</h2>
            </div>
            <ul class="footer-menu">
              <li><a href="https://www.els.co.id/profile-perusahaan-els-computer" target="_blank"><i class="fa fa-angle-right"></i> About us</a></li>
              <li><a href="https://www.els.co.id/blog/" target="_blank"><i class="fa fa-angle-right"></i> Blog</a></li>
              <li><a href="https://www.els.co.id/metode-pembayaran" target="_blank"><i class="fa fa-angle-right"></i> Metode Pembayaran</a></li>
              <li><a href="https://www.els.co.id/opsi-pengiriman" target="_blank"><i class="fa fa-angle-right"></i> Opsi Pengiriman</a></li>
              <li><a href="https://www.els.co.id/download-pricelist" target="_blank"><i class="fa fa-angle-right"></i> Price List</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <div class="main-heading left_text">
              <h2>Official Marketplace</h2>
            </div>
            <ul class="footer-menu">
              <li><a href="https://www.blibli.com/merchant/els-computer/ELC-53809?page=1&start=0&pickupPointCode=&cnc=&multiCategory=true&excludeProductList=true" target="_blank"><i class="fa fa-angle-right"></i> Blibli</a></li>
              <li><a href="https://www.bukalapak.com/u/elscomputer_yk" target="_blank"><i class="fa fa-angle-right"></i> Bukalapak</a></li>
              <li><a href="https://shopee.co.id/elscomputer" target="_blank"><i class="fa fa-angle-right"></i> Shopee</a></li>
              <li><a href="https://www.tokopedia.com/elscomputer" target="_blank"><i class="fa fa-angle-right"></i> Tokopedia</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <div class="main-heading left_text">
              <h2>Contact Us</h2>
            </div>
            <p>Jalan C.Simanjuntak 38 </br>
            Yogyakarta </br>
              <span style="font-size:18px;"><a href="tel:+62274566569">0274- 566 569</a></span></p>
            <div class="footer_mail-section">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- end footer -->

<!-- js section -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<!-- menu js -->
<script src="/assets/js/menumaker.js"></script>
<!-- wow animation -->
<script src="/assets/js/wow.js"></script>
<!-- custom js -->
<script src="/assets/js/custom.js"></script>
<!-- revolution js files -->
<script src="/assets/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="/assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="/assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="/assets/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="/assets/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="/assets/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="/assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="/assets/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="/assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="/assets/revolution/js/extensions/revolution.extension.video.min.js"></script>
</body>
</html>
<?php /**PATH D:\Rafel\perwalian\resources\views/layout/page.blade.php ENDPATH**/ ?>