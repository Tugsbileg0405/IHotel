<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

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
    <script src="<?php echo e(asset('js/jquery-2.1.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/semantic.min.js')); ?>"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <header style="z-index:9999">
        <div class="ui container">
            <div class="cd-logo">
                <a href="<?php echo e(url('/logout')); ?>"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                    <img src="<?php echo e(asset('img/logo-white.png')); ?>" alt="Logo">
                </a>
                <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
            </div>
            <div class="important-word">
                <i class="spinner loading icon"></i><?php echo e(__('messages.Collect memories, not a property')); ?>

            </div>
        </div>
    </header>
    <main class="cd-main-content"></main>
    <div class="main-breadcrumb">
        <div class="ui container">
            <div class="ui stackable column grid">
                <div class="six wide column">
                    <h3 class="ui header">Hello</h3>
                </div>
                <div class="right aligned ten wide column">
                    <div class="ui breadcrumb">
                    <a href="<?php echo e(url('/logout')); ?>"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><?php echo e(__("messages.Home")); ?></a>
                        <span class="divider">/</span>
                        <div class="active section">Hello</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="silver-back">
        <div class="main-page">
            <div class="ui fluid stackable container">
                <div class="ui column grid">
                    <div class="sixteen wide column">
                        <div class="ui stackable container">
                            <div class="ui stackable grid">
                                <div class="ui sixteen column row">
                                    <div class="four wide column"></div>
                                    <div class="eight wide column">
                                        <div class="ui success message">
                                            <div class="content">
                                                <div class="header">We sent activation email to you.</div>
                                                <p><?php echo e(__('messages.Check your email')); ?></p>
                                            </div>
                                        </div>
                                        <div class="ui stackable grid">
                                            <div class="ui three column row">
                                                <div class="column"></div>
                                                <div class="column">
                                                    <a class="ui fluid  primary icon button" href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        <?php echo e(__('messages.Go to home page')); ?>

                                                    </a>
                                                </div>
                                                <div class="column"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="four wide column"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>