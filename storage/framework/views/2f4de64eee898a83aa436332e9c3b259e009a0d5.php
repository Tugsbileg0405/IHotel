<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-breadcrumb">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="six wide column">
				<h3 class="ui header"><?php echo e(__("messages.Contact")); ?></h3>
			</div>
			<div class="right aligned ten wide column">
				<div class="ui breadcrumb">
					<a class="section"><?php echo e(__("messages.Home")); ?></a>
					<span class="divider">/</span>
					<div class="active section"><?php echo e(__("messages.Contact")); ?></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-page">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="ten wide column">
				<?php if(App::isLocale('mn')): ?>
					<h2 class="ui sub header">Хаяг</h2>
					<span><?php echo e($options[2]->value); ?></span>
				<?php elseif(App::isLocale('en')): ?>
					<h2 class="ui sub header">Address</h2>
					<span><?php echo e($options[2]->value_en); ?></span>
				<?php endif; ?>
				<?php if(App::isLocale('mn')): ?>
					<h2 class="ui sub header">Утас</h2>
					<span><?php echo e($options[3]->value); ?></span>
				<?php elseif(App::isLocale('en')): ?>
					<h2 class="ui sub header">Phone number</h2>
					<span><?php echo e($options[3]->value_en); ?></span>
				<?php endif; ?>
				<?php if(App::isLocale('mn')): ?>
					<h2 class="ui sub header">Цахим шуудан</h2>
					<span><?php echo e($options[4]->value); ?></span>
				<?php elseif(App::isLocale('en')): ?>
					<h2 class="ui sub header">E-mail address</h2>
					<span><?php echo e($options[4]->value_en); ?></span>
				<?php endif; ?>
			</div>
			<div class="six wide column">
				<form class="ui form segment" id="contact-form">
					<?php echo e(csrf_field()); ?>

				 	<h6 class="ui horizontal header center aligned">
						<i class="big mail outline icon"></i>
					</h6>
					<h6 class="ui horizontal header divider"><?php echo e(__("messages.Contact Us")); ?></h6>
					<div class="sixteen wide field">
						<div class="required field">
							<label><?php echo e(__("messages.Email")); ?></label>
							<input type="text" name="email">
						</div>
					</div>
					<div class="sixteen wide field">
						<div class="required field">
							<label><?php echo e(__("messages.Name")); ?></label>
							<input type="text" name="name">
						</div>
					</div>
					<div class="sixteen wide field">
						  <div class="required field">
						    <label><?php echo e(__("messages.Message")); ?></label>
						    <textarea rows="5" name="content"></textarea>
						  </div>
					</div>
					<?php echo Recaptcha::render(); ?><br>
					<button type="submit" class="ui primary fluid submit button"><?php echo e(__("messages.Send")); ?></button>
				</form>
				<div id="message"></div>
			</div>
		</div>
	</div>
</div>
<div class="ui fluid container">
	<div class="page-title">
		<div class="sixteen wide center aligned column">
			<?php if(App::isLocale('mn')): ?>
				<h4>Байршил</h4>
			<?php elseif(App::isLocale('en')): ?>
				<h4>Location</h4>
			<?php endif; ?>
		</div>
	</div>
	<div class="sixteen wide column">
		<div id="map" style="height:500px"></div>
	</div>
</div>
<div class="ui basic modal" id="success-message">
	<div class="ui icon header">
		<i class="green check icon"></i>
        	<?php echo e(__('messages.Successfully sent')); ?>

	</div>
</div>
<div class="ui basic modal" id="error-message">
	<div class="ui icon header">
		<i class="red close icon"></i>
        	<?php echo e(__('messages.Error occured')); ?>

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
	$("#contact-form").submit(function(e) {
	    e.preventDefault(); 
	}).form({
	    inline : true,
	    fields: {
	        name: {
	            identifier  : 'name',
	            rules: [
	                {
	                    type   : 'empty',
                    	prompt : '<?php echo e(__("messages.Please enter your name")); ?>'
	                },
                    {
                        type   : 'maxLength[191]',
                        <?php if(App::isLocale('mn')): ?>
                        	prompt : 'Хэтэрхий олон тэмдэгт оруулсан байна'
                        <?php elseif(App::isLocale('en')): ?>
                        	prompt : 'Please enter at most 191 characters'
                        <?php endif; ?>
                    }
	            ]
	        },
	        email: {
	            identifier  : 'email',
	            rules: [
	                {
	                    type   : 'email',
                        <?php if(App::isLocale('mn')): ?>
	                    	prompt : 'И-мэйл хаяг оруулна уу'
                        <?php elseif(App::isLocale('en')): ?>
                        	prompt : 'Please enter your email'
                        <?php endif; ?>
	                },
                    {
                        type   : 'maxLength[191]',
                        <?php if(App::isLocale('mn')): ?>
                        	prompt : 'Хэтэрхий олон тэмдэгт оруулсан байна'
                        <?php elseif(App::isLocale('en')): ?>
                        	prompt : 'Please enter at most 191 characters'
                        <?php endif; ?>
                    }
	            ]
	        },
	        content: {
	            identifier  : 'content',
	            rules: [
	                {
	                    type   : 'empty',
                        <?php if(App::isLocale('mn')): ?>
		                    prompt : 'Хүсэлт оруулна уу'
                        <?php elseif(App::isLocale('en')): ?>
                        	prompt : 'Please enter a message'
                        <?php endif; ?>
	                }
	            ]
	        },
	    },
	    onSuccess: function() {
			$('#contact-form button').addClass('loading disabled');
		    $.ajax({
				type: "POST",
				url: "<?php echo e(url('feedback')); ?>",
	           	data: $("#contact-form").serialize(),
	           	success: function() {
	           		$('#contact-form').trigger("reset");
					$('#contact-form button').removeClass('loading');
                    $('#success-message').modal('show');
	       		},
				error: function(){
					$('#contact-form button').removeClass('loading disabled');
                    $('#error-message').modal('show');
				}
			});
	    }
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>