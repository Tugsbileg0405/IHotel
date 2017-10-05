<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Facebook Metadata /-->
    <meta property="og:url" content="https://www.ihotel.mn" />
    <meta property="og:title" content="iHotel.mn: Online hotel booking" />
    <meta property="og:image" content="<?php echo e(asset('img/share.jpg')); ?>" />
    <meta property="og:description" content="Олон улсын зочид буудлын захиалга" />

    <!-- Google Metadata /-->
    <meta itemprop="name" content="iHotel.mn: Online hotel booking">
    <meta itemprop="description" content="Олон улсын зочид буудлын захиалга"/>
    <meta itemprop="image" content="<?php echo e(asset('img/share.jpg')); ?>" />

    <!-- Twitter Metadata /-->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@ihotelmn" />
    <meta name="twitter:title" content="iHotel.mn: Online hotel booking">
    <meta name="twitter:description" content="Олон улсын зочид буудлын захиалга"/>
    <meta name="twitter:image" content="<?php echo e(asset('img/share.jpg')); ?>" />

    <link rel="icon" href="<?php echo e(asset('img/favicon.ico')); ?>">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,100,100italic,500,500italic,700,700italic,900,900italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo e(asset('dist/semantic.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dist/semantic.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/daterangepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/reset.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">

    <script src="<?php echo e(asset('js/jquery-3.1.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/semantic.min.js')); ?>"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({height: '250',selector: '.editor',toolbar: 'undo redo',menubar: false,})</script>
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <?php echo $__env->make('partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="main-breadcrumb">
        <div class="ui container">
            <div class="ui stackable column grid">
                <div class="six wide column">
                    <h3 class="ui header">Буудал нэмэх</h3>
                </div>
                <div class="right aligned ten wide column">
                    <div class="ui breadcrumb">
                        <a class="section">Эхлэл</a>
                        <span class="divider">/</span>
                        <div class="active section">Буудал нэмэх</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="silver-back">
        <div class="main-page">
            <div class="ui fluid stackable container">
                <div class="ui stackable column grid">
                    <div class="sixteen wide column">
                        <div class="ui container">
                            <div class="ui stackable grid">
                                <?php echo $__env->yieldContent('content'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script src="<?php echo e(asset('js/modernizr.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/components/popup.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/components/dropdown.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/components/transition.js')); ?>"></script>
    <script src="<?php echo e(asset('js/iframe-content.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('script'); ?>
</body>
</html>
