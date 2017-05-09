<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="about-banner">
	<div class="ui container">
		<div class="ui grid">
			<div class="two wide column"></div>
			<div class="twelve wide column">
				<div class="ui row">
					<div class="about-link">
						<div class="ui stackable grid">
							<div class="center aligned three column row">
								<div class="column">
									<h3>
										<a href="#team" class="ui primary button"><?php echo e(__('messages.Our team')); ?></a>
									</h3>
								</div>
								<div class="column">
									<h3>
										<a href="#introduction" class="ui primary button">www.ihotel.mn</a>
									</h3>
								</div>
								<div class="column">
									<h3>
										<a href="#contact" class="ui primary button">
											<?php if(App::isLocale('mn')): ?>
												Холбоо барих
											<?php elseif(App::isLocale('en')): ?>
												Contact us
											<?php endif; ?>
										</a>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="two wide column"></div>
			<div class="two wide column"></div>
			<div class="twelve wide column">
				<div class="about-info">
					<?php if(App::isLocale('mn')): ?>
						<h4>Бидний тухай</h4>
						<?php echo e($options[0]->value); ?>

					<?php elseif(App::isLocale('en')): ?>
						<h4>About us</h4>
						<?php echo e($options[0]->value_en); ?>

					<?php endif; ?>
				</div>
			</div>
			<div class="two wide column"></div>
		</div>
	</div>
</div>
<div class="back-white" id="introduction">
	<div class="ui container">
		<div class="page-title">
			<div id="ihotel" class="ui stackable container ">
				<div class="sixteen wide center aligned column">
					<?php if(App::isLocale('mn')): ?>
						<h4>Танилцуулга</h4>
					<?php elseif(App::isLocale('en')): ?>
						<h4>Introduction</h4>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="ui stackable three column grid container">
			<div class="ui two wide center aligned column page-text"></div>
			<div class="ui twelve wide center aligned column page-text">
				<?php if(App::isLocale('mn')): ?>
					<p><?php echo e($options[1]->value); ?></p>
				<?php elseif(App::isLocale('en')): ?>
					<p><?php echo e($options[1]->value_en); ?></p>
				<?php endif; ?>
			</div>
			<div class="ui two wide center aligned column page-text"></div>
		</div>
	</div>
</div>
<div class="back-silver">
	<div class="ui container">
		<div class="page-title">
			<div id="ihotel" class="ui stackable container ">
				<div class="sixteen wide center aligned column">
					<h4 id="contact"><?php echo e(__('messages.Login to control system')); ?></h4>
				</div>
			</div>
		</div>
		<div class="ui stackable grid">
			<div class="three column row">
				<div class="center aligned column">
					<div class="ui segment ">
						<div class="login-content">
							<div class="content">
								<img class="ui tiny centered image" src="img/marker.png">
							</div>
							<div class="content">
								<h4 class="ui sub header"><?php echo e(__('messages.Add hotel')); ?></h4>
							</div>
							<div class="extra content">
								<a href="<?php echo e(url('hotel/create')); ?>" class="ui primary button"><?php echo e(__('messages.Add')); ?></a>
							</div>
						</div>
					</div>
				</div>
				<div class="center aligned column">
					<div class="ui segment ">
						<div class="login-content">
							<div class="content">
								<img class="ui tiny centered image" src="img/room.png">
							</div>
							<div class="content">
								<h4 class="ui sub header"><?php echo e(__('messages.Room Control System')); ?></h4>
							</div>
							<div class="extra content">
								<a href="<?php echo e(url('profile/hotels')); ?>" class="ui primary button"><?php echo e(__('messages.Login')); ?></a>
							</div>
						</div>
					</div>
				</div>
				<div class="center aligned column">
					<div class="ui segment ">
						<div class="login-content">
							<div class="content">
								<img class="ui tiny centered image" src="img/hotel.png">
							</div>
							<div class="content">
								<h4 class="ui sub header"><?php echo e(__('messages.Hotel Booking System')); ?></h4>
							</div>
							<div class="extra content">
								<a href="#" class="ui primary button"><?php echo e(__('messages.Login')); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="back-white" id="team">
	<div class="ui container">
		<div class="page-title">
			<div  class="ui stackable container ">
				<div class="sixteen wide center aligned column">
					<h4><?php echo e(__('messages.Our team')); ?></h4>
				</div>
			</div>
		</div>
		<div class="ui stackable container">
			<div class="ui grid">
				<div class="two wide column"></div>
				<div class="twelve wide column">
					<div class="ui three column stackable grid">
						<?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="column">
								<div class="about-img">
									<div class="ui circular image">
										<img class="visible circular content" src="<?php echo e(asset($team->photo)); ?>">
									</div>
								</div>
								<h4 class="ui centered aliged header">
									<?php if(App::isLocale('mn')): ?>
										<?php echo e($team->name); ?>

										<div class="sub header">(<?php echo e($team->description); ?>)</div>
									<?php elseif(App::isLocale('en')): ?>
										<?php echo e($team->name_en); ?>

										<div class="sub header">(<?php echo e($team->description_en); ?>)</div>
									<?php endif; ?>
								</h4>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<div class="two wide column"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="contact">
	<div class="ui fluid container">
		<div class="page-title">
			<div  class="ui stackable container ">
				<div class="sixteen wide center aligned column">
					<?php if(App::isLocale('mn')): ?>
						<h4>Байршил</h4>
					<?php elseif(App::isLocale('en')): ?>
						<h4>Location</h4>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="ui grid">
			<div class="sixteen wide column">
				<div id="map" style="height:500px"></div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script async defer 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjW4iZ6gWxhzJOE3Vi4wvHZcTH0vgdDqk&sensor=false&libraries=places&callback=initMap">
</script>
<script type="text/javascript">
	function initMap() {
	    var map = new google.maps.Map(document.getElementById('map'), {
	        zoom: 13,
	        center: { lat: parseFloat('<?php echo e(json_decode($options[5]->value)[0]); ?>'), lng: parseFloat('<?php echo e(json_decode($options[5]->value)[1]); ?>') },
	    });

		marker = new google.maps.Marker({
	             position: { lat: parseFloat('<?php echo e(json_decode($options[5]->value)[0]); ?>'), lng: parseFloat('<?php echo e(json_decode($options[5]->value)[1]); ?>') },
	             map: map                    
		})

		google.maps.event.addListener(map, "click", function (e) {
			var lat = e.latLng.lat();
			var lon = e.latLng.lng();
			marker.setPosition(new google.maps.LatLng(lat, lon));
			$('#lat').val(lat);
			$('#lon').val(lon);
		});
	}
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>