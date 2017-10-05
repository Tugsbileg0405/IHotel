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
    <link rel="stylesheet" href="<?php echo e(asset('css/reset.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">

    <script src="<?php echo e(asset('js/jquery-2.1.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/semantic.min.js')); ?>"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'#editor' });</script>
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
                    <h3 class="ui header"><?php echo e(__('messages.User section')); ?></h3>
                </div>
                <div class="right aligned ten wide column">
                    <div class="ui breadcrumb">
                        <a class="section"><?php echo e(__('messages.Home')); ?></a>
                        <span class="divider">/</span>
                        <div class="active section"><?php echo e(__('messages.User section')); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-page">
        <div class="ui container">
            <div class="ui stackable column grid">
                <div class="five wide column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="right floated meta">
                                <h4 class="ui sub header"></h4>
                            </div>
                            <img class="ui avatar image" src="<?php echo e(asset(Auth::user()->avatar)); ?>">
                            <?php echo e(Auth::user()->email); ?>

                        </div>
                        <div class="ui fluid vertical menu">
                            <a href="<?php echo e(url('profile/edit')); ?>" class="item<?php echo e(Request::is('profile/edit') ? ' active' : ''); ?>">
                                <i class="user icon"></i> <?php echo e(__('messages.Edit profile')); ?>

                            </a>
                            <a href="<?php echo e(url('profile/edit/password')); ?>" class="item<?php echo e(Request::is('profile/edit/password') ? ' active' : ''); ?>">
                                <i class="key icon"></i> <?php echo e(__('messages.Change password')); ?>

                            </a>
                        </div>
                    </div>
                    <a class="ui green button" href="<?php echo e(url('profile/posts/create')); ?>">
                        <i class="plus icon"></i> <?php echo e(__('messages.Add post')); ?>

                    </a>
                    <div class="ui fluid vertical menu">
                        <a class="item<?php echo e(Request::is('profile') ? ' blue active' : ''); ?>" href="<?php echo e(url('profile')); ?>">
                            <?php echo e(__('messages.My posts')); ?>

                            <div class="ui label<?php echo e(Request::is('profile') ? ' blue left pointing' : ''); ?>"><?php echo e($postCount); ?></div>
                        </a>
                        <a class="item<?php echo e(Request::is('profile/orders') ? ' blue active' : ''); ?>" href="<?php echo e(url('profile/orders')); ?>">
                            <?php echo e(__('messages.My orders')); ?>

                            <div class="ui label<?php echo e(Request::is('profile/orders') ? ' blue left pointing' : ''); ?>"><?php echo e($orderCount); ?></div>
                        </a>
                        <a class="item<?php echo e(Request::is('profile/rate') ? ' blue active' : ''); ?>" href="<?php echo e(url('profile/rate')); ?>">
                            <?php echo e(__('messages.Give a rating')); ?>

                            <div class="ui label<?php echo e(Request::is('profile/rate') ? ' blue left pointing' : ''); ?>"><?php echo e($rateCount); ?></div>
                        </a>
                        <?php if(Auth::user()->isHotelAdmin()): ?>
                            <a class="item<?php echo e(Request::is('profile/hotels') ? ' blue active' : ''); ?>" href="<?php echo e(url('profile/hotels')); ?>">
                                 <?php echo e(__('messages.My hotels')); ?>

                                <div class="ui label<?php echo e(Request::is('profile/hotels') ? ' blue left pointing' : ''); ?>"><?php echo e(Auth::user()->hotels()->count()); ?></div>
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php if(Auth::user()->isAdmin()): ?>
                        <div class="ui fluid vertical menu">
                            <a class="item" href="<?php echo e(url('profile/order')); ?>">
                                Захиалга
                            </a>
                            <a class="item" href="<?php echo e(url('profile/dollarrate')); ?>">
                                Долларын ханш
                            </a>
                            <a class="item" href="<?php echo e(url('profile/hotelcategory')); ?>">
                                Буудлын ангилал
                            </a>
                            <a class="item" href="<?php echo e(url('profile/hotelservicecategory')); ?>">
                                Буудлын үйлчилгээ
                            </a>
                            <a class="item" href="<?php echo e(url('profile/roomcategory')); ?>">
                                Өрөөний ангилал
                            </a>
                            <a class="item" href="<?php echo e(url('profile/roomservicecategory')); ?>">
                                Өрөөний үйлчилгээ
                            </a>
                            <a class="item" href="<?php echo e(url('profile/pickup')); ?>">
                                Онгоцны буудлаас тосох
                            </a>
                            <a class="item" href="<?php echo e(url('profile/hotel')); ?>">
                                Буудал
                            </a>
                            <a class="item" href="<?php echo e(url('profile/post')); ?>">
                                Нийтлэл
                            </a>
                            <a class="item" href="<?php echo e(url('profile/postcategory')); ?>">
                                Нийтлэлийн ангилал
                            </a>
                            <a class="item" href="<?php echo e(url('profile/postcomment')); ?>">
                                Нийтлэлийн сэтгэгдэл
                            </a>
                            <a class="item" href="<?php echo e(url('profile/question')); ?>"> 
                                Түгээмэл асуулт
                            </a>
                            <a class="item" href="<?php echo e(url('profile/information')); ?>">
                                Нүүр хуудасны слайд
                            </a>
                            <a class="item" href="<?php echo e(url('profile/slide')); ?>">
                                Нүүр хуудасны зураг
                            </a>
                            <a class="item" href="<?php echo e(url('profile/comment')); ?>">
                                Сэтгэгдэл
                            </a>
                            <a class="item" href="<?php echo e(url('profile/term')); ?>">
                                Үйлчилгээний нөхцөл
                            </a>
                            <a class="item" href="<?php echo e(url('profile/team')); ?>">
                                Хамт олон
                            </a>
                            <a class="item" href="<?php echo e(url('profile/user')); ?>">
                                Хэрэглэгч
                            </a>
                            <a class="item" href="<?php echo e(url('profile/option')); ?>">
                                Тохиргоо
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <?php echo $__env->yieldContent('content'); ?>
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