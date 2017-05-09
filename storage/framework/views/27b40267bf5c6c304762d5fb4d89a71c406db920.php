<header>
	<div class="ui fluid container">
		<div class="admin-body">
			<div class="cd-logo">
				<a href="<?php echo e(url('/')); ?>">
					<img src="<?php echo e(asset('img/logo-white.png')); ?>" alt="Logo">
				</a>
			</div>
			<nav class="main-nav cd-main-nav-wrapper">
				<ul class="cd-main-nav">
					<li>
						<a href="#">
							<i class="user icon"></i><?php echo e($hotel->name); ?>

						</a>
					</li>
                    <li>
                        <a href="<?php echo e(url('/logout')); ?>"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="power icon"></i>Гарах
                        </a>
                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </li>
				</ul>
			</nav>
			<a href="#" class="cd-nav-trigger"><span></span></a>
		</div>
	</div>
</header>
<main class="cd-main-content"></main>