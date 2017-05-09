<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-breadcrumb">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="six wide column">
				<h3 class="ui header">
					<?php if(App::isLocale('en')): ?>
						<?php echo e($post->category->name_en); ?>

					<?php elseif(App::isLocale('mn')): ?>
						<?php echo e($post->category->name); ?>

					<?php endif; ?>
				</h3>
			</div>
			<div class="right aligned ten wide column">
				<div class="ui breadcrumb">
					<a class="section" href="<?php echo e(url('/')); ?>"><?php echo e(__("messages.Home")); ?></a>
					<span class="divider">/</span>
					<a class="section" href="<?php echo e(url('posts')); ?>"><?php echo e(__("messages.Travel Inspiration")); ?></a>
					<span class="divider">/</span>
					<a class="section" href="<?php echo e(url('category', $post->category->id)); ?>">
						<?php if(App::isLocale('en')): ?>
							<?php echo e($post->category->name_en); ?>

						<?php elseif(App::isLocale('mn')): ?>
							<?php echo e($post->category->name); ?>

						<?php endif; ?>
					</a>
					<span class="divider">/</span>
					<div class="active section"><?php echo e($post->title); ?></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-page">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="eleven wide column">
				<div class="ui segment">
					<div class="content">
						<h4 class="ui right floated header">
							<a href="<?php echo e(url('category', $post->category->id)); ?>">
								<i class="angle left icon"></i><?php echo e(__("messages.Back")); ?>

							</a>
						</h4>
						<h4 class="ui header blog-header">
							<a href="<?php echo e(url('post', $post->id)); ?>"><?php echo e($post->title); ?></a>
						</h4>
						<div class="ui divided horizontal list">
							<div class="item">
								<img class="ui avatar image" src="<?php echo e(asset($post->user->avatar)); ?>">
								<div class="content">
									<a href="<?php echo e(url('posts/user', $post->user->id)); ?>" class="header"><?php echo e($post->user->name); ?></a>
								</div>
							</div>
							<div class="item">
								<a class="header" href="<?php echo e(url('category', $post->category->id)); ?>">
									<i class="icon folder"></i>
									<?php if(App::isLocale('en')): ?>
										<?php echo e($post->category->name_en); ?>

									<?php elseif(App::isLocale('mn')): ?>
										<?php echo e($post->category->name); ?>

									<?php endif; ?>
								</a>
							</div>
							<div class="item">
								<div class="blog-date">
									<i class="icon calendar"></i><?php echo e(date('Y-m-d', strtotime($post->created_at))); ?>

								</div>
							</div>
							<div class="item">
								<div class="blog-date">
									<i class="icon eye"></i><?php echo e($post->views); ?>

								</div>
							</div>
						</div>
						<section class="slider">
							<div id="slider" class="flexslider">
								<ul class="slides">
									<?php if($post->photos): ?>		
										<?php $__currentLoopData = unserialize($post->photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<li>
												<img src="<?php echo e(asset($photo)); ?>">
											</li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</ul>
							</div>
							<div id="carousel" class="flexslider">
								<ul class="slides">
									<?php if($post->photos): ?>		
										<?php $__currentLoopData = unserialize($post->photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<li>
												<img src="<?php echo e(asset($photo)); ?>">
											</li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</ul>
							</div>
						</section>
						<?php echo $post->content; ?>

						<div class="ui hidden divider"></div>
						<div id="social-link"></div>
					</div>
				</div>
				<div class="ui stackable grid">
					<div class="sixteen wide column">
						<div class="ui comments">
							<h3 class="ui dividing header">Сэтгэгдэл</h3>
							<div id="comments"> 
								<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="comment">
										<a class="avatar">
											<img src="<?php echo e(asset($comment->user->avatar)); ?>">
										</a>
										<div class="content">
											<a class="author"><?php echo e($comment->user->name); ?></a>
											<div class="metadata">
												<span class="date"><?php echo e(date('Y-m-d h:i:sa', strtotime($comment->created_at))); ?></span>
											</div>
											<div class="text"><?php echo e($comment->content); ?></div>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							<?php if(Auth::check()): ?>
								<form id="create-comment-form" class="ui reply form" action="<?php echo e(url('comment', $post->id)); ?>" method="POST">
									<?php echo e(csrf_field()); ?>

									<div class="field">
										<textarea name="content"></textarea>
									</div>
									<button class="ui blue labeled submit icon button" type="submit">
										<i class="icon edit"></i> Сэтгэгдэл илгээх
									</button>
								</form>
							<?php else: ?>
								<div class="ui message">
									<p>Та сэтгэгдэл бичхийн тулд нэвтрэх шаардлагатай. <a href="<?php echo e(url('login')); ?>">Энд</a> дарж нэвтэрнэ үү</p>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('js/jquery.flexslider.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('css/flexslider.css')); ?>" type="text/css" media="screen" />
<script type="text/javascript">
	$('#create-comment-form').submit(function(e) {
		$(this).find('button').addClass('loading disabled');
		e.preventDefault();
		$.ajax({
			method: $(this).attr('method'),
			url: $(this).attr('action'),
			data: $(this).serialize(),
			context: this,
		}).done(function(data) {
			$('#comments').prepend(data);
			$(this).find('button').removeClass('loading disabled');
			$(this).trigger('reset');
			$(window).scrollTop($('#comments').offset().top - 100);
		}).fail(function() {
			$(this).find('button').removeClass('loading disabled');
		});
	});
	$(window).load(function(){
		$('#carousel').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			itemWidth: 100,
			itemMargin: 5,
			asNavFor: '#slider'
		});
		$('#slider').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			sync: "#carousel",
			start: function(slider){
				$('body').removeClass('loading');
			}
		});
	});
	$("#social-link").jsSocials({
	    url: "<?php echo e(url('post', $post->id)); ?>",
	    text: "<?php echo e($post->title); ?>",
	    showLabel: true,
	    showCount: true,
	    shareIn: "popup",
	    shares: [
		    {
				share: "facebook",
				label: "Share",
				logo: "facebook f icon",
		    },
		    {
				share: "twitter",
				label: "Tweet",
				logo: "twitter icon",
		    },
		    {
				share: "googleplus",
				label: "+1",
				logo: "google plus icon",
		    }
		]
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>