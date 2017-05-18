<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Facebook Metadata /-->
   
    <meta property="og:title" content="IHotel" />
    <meta property="og:image" content="<?php echo e(asset('img/share.jpg')); ?>" />
    <meta property="og:description" content="iHotel.mn нь аялагчид Монголын 500 гаруй, дэлхийн сая илүү зочид буудал, амралтын газрыг хамгийн хурдан, хялбар, нэмэлт төлбөр, шимтгэлгүйгээр эх хэл дээрээ, найдвартай захиалах боломжтой онлайн зөвлөгч юм. Бид олон улсын нэр хүнд бүхий booking.com, agoda.com, airbnb, ctrip гэх мэт онлайн захиалгын системүүдийн албан ёсны түнш бөгөөд өөрийн 3 жилийн туршлага дээрээ үндэслэн танд хамгийн хямд, тав тухтай, байрлал сайтай, хэрэгцээ шаардлагад тань төгс тохирох сонголтуудыг ямагт санал болгоно. Та эх хэл дээрээ сонголтоо хийж, аяллын зөвлөгөөг үнэгүй авснаар учирч болох олон эрсдэлээс сэргийлж илүү хямд зардал, бага энергиэр аялах боломжтой." />

    <!-- Google Metadata /-->
    <meta itemprop="name" content="IHotel">
    <meta itemprop="description" content="iHotel.mn нь аялагчид Монголын 500 гаруй, дэлхийн сая илүү зочид буудал, амралтын газрыг хамгийн хурдан, хялбар, нэмэлт төлбөр, шимтгэлгүйгээр эх хэл дээрээ, найдвартай захиалах боломжтой онлайн зөвлөгч юм. Бид олон улсын нэр хүнд бүхий booking.com, agoda.com, airbnb, ctrip гэх мэт онлайн захиалгын системүүдийн албан ёсны түнш бөгөөд өөрийн 3 жилийн туршлага дээрээ үндэслэн танд хамгийн хямд, тав тухтай, байрлал сайтай, хэрэгцээ шаардлагад тань төгс тохирох сонголтуудыг ямагт санал болгоно. Та эх хэл дээрээ сонголтоо хийж, аяллын зөвлөгөөг үнэгүй авснаар учирч болох олон эрсдэлээс сэргийлж илүү хямд зардал, бага энергиэр аялах боломжтой."/>
    <meta itemprop="image" content="<?php echo e(asset('img/share.jpg')); ?>" />

    <!-- Twitter Metadata /-->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@ihotelmn" />
    <meta name="twitter:title" content="IHotel">
    <meta name="twitter:description" content="iHotel.mn нь аялагчид Монголын 500 гаруй, дэлхийн сая илүү зочид буудал, амралтын газрыг хамгийн хурдан, хялбар, нэмэлт төлбөр, шимтгэлгүйгээр эх хэл дээрээ, найдвартай захиалах боломжтой онлайн зөвлөгч юм. Бид олон улсын нэр хүнд бүхий booking.com, agoda.com, airbnb, ctrip гэх мэт онлайн захиалгын системүүдийн албан ёсны түнш бөгөөд өөрийн 3 жилийн туршлага дээрээ үндэслэн танд хамгийн хямд, тав тухтай, байрлал сайтай, хэрэгцээ шаардлагад тань төгс тохирох сонголтуудыг ямагт санал болгоно. Та эх хэл дээрээ сонголтоо хийж, аяллын зөвлөгөөг үнэгүй авснаар учирч болох олон эрсдэлээс сэргийлж илүү хямд зардал, бага энергиэр аялах боломжтой."/>
    <meta name="twitter:image" content="<?php echo e(asset('img/share.jpg')); ?>" />

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <link rel="icon" href="<?php echo e(asset('img/favicon.ico')); ?>">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,100,100italic,500,500italic,700,700italic,900,900italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo e(asset('dist/semantic.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dist/semantic.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/daterangepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/reset.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/nouislider.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jssocials.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jssocials-theme-flat.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/lightgallery.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/map-icons.css')); ?>">
    <script src="<?php echo e(asset('js/jquery-2.1.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/semantic.min.js')); ?>"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <?php echo $__env->make('partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php if(!Request::is('aspac2017') && !Request::is('searchresult') && !Request::is('aspac')): ?>
        <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    
    <script src="<?php echo e(asset('js/modernizr.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/components/popup.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/components/dropdown.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/components/transition.js')); ?>"></script>
    <script src="<?php echo e(asset('js/iframe-content.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/chosen.jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/nouislider.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lodash.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jssocials.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/numeral.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lightgallery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-scrolltofixed-min.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('script'); ?>
</body>
</html>