<div class="five wide column">
	<div class="ui fluid vertical menu blog-right-menu">
		<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<a href="<?php echo e(url('category', $category->id)); ?>" class="item">
				<?php if(App::isLocale('en')): ?>
					<?php echo e($category->name_en); ?>

				<?php elseif(App::isLocale('mn')): ?>
					<?php echo e($category->name); ?>

				<?php endif; ?>
			</a>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
    <a class="ui green button" href="<?php echo e(url('profile/posts/create')); ?>">
        <i class="plus icon"></i> <?php echo e(__('messages.Add post')); ?>

    </a>
	<h4 class="ui header"><?php echo e(__('messages.Book a Hotel')); ?></h4>
	<div class="right-search">
		<form class="ui form">
			<div class="column">
				<div class="local example">
					<div class="ui search">
						<div class="ui fluid left icon input">
							<input class="prompt" type="text" id="searchplace" value="<?php echo e($place ? $place : 'Ulaanbaatar, Mongolia'); ?>" placeholder="<?php echo e(__('messages.Destination')); ?>">
							<i class="marker icon"></i>
						</div>
						<div class="results"></div>
					</div>
				</div>
			</div>
			<div class="ui grid">
				<div class="column row hotel-date">
					<div class="column">
						<form class="ui form">
							<div class="ui fluid left icon input">
								<input type="text" name="reservation"
								id="startDate"
								value=""/>
								<i class="calendar icon"></i>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="ui grid">
				<div class="two column row hotel-number">
					<div class="people-number-left column">
						<div class="ui form">
							<input type="number" name="peoplenumber" id="selectedPeople" min="1" placeholder="<?php echo e(__('messages.People')); ?>" id="selectedPeople" value="<?php echo e($peoplenumber ? $peoplenumber : 1); ?>">
						</div>
					</div>
					<div class="people-number-right column">
						<div class="ui form">
							<input type="number" name="roomnumber" id="selectedRoom" min="1" placeholder="<?php echo e(__('messages.Rooms')); ?>" id="selectedRoom" value="<?php echo e($roomnumber ? $roomnumber : 2); ?>">
						</div>
					</div>
				</div>
			</div>
			<button class="ui mini-search fluid red button" id="searchButton" type="submit"><?php echo e(__('messages.Search')); ?></button>
		</form>
	</div>
	<?php if($mostPosts->count() > 0): ?>
		<h4 class="ui header"><?php echo e(__('messages.The most viewed')); ?></h4>
		<?php $__currentLoopData = $mostPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mostPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="ui card">
				<a class="image" href="<?php echo e(url('post', $mostPost->id)); ?>">
					<img src="<?php echo e(asset(unserialize($mostPost->photos)[0])); ?>">
				</a>
				<div class="content">
					<a class="header" href="<?php echo e(url('post', $mostPost->id)); ?>"><?php echo e($mostPost->title); ?></a>
					<div class="meta">
						<a class="time" href="<?php echo e(url('category', $mostPost->category->id)); ?>">
							<?php if(App::isLocale('en')): ?>
								<?php echo e($mostPost->category->name_en); ?>

							<?php elseif(App::isLocale('mn')): ?>
								<?php echo e($mostPost->category->name); ?>

							<?php endif; ?>
						</a>
					</div>
				</div>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
</div>
<?php $__env->startPush('script'); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjW4iZ6gWxhzJOE3Vi4wvHZcTH0vgdDqk&libraries=places&callback=initMap"
         async defer></script>
<script src="<?php echo e(asset('js/moment.js')); ?>"></script>
<script src="<?php echo e(asset('js/daterangepicker.js')); ?>"></script>
<script>
		function initMap() {
			var input = document.getElementById('searchplace');
			var autocomplete = new google.maps.places.Autocomplete(input,{ types: ['(cities)']});
		}

		var searchPlace;
		var roomNumber;
		var people;
		var startDate;
		var endDate;

		endDate = '<?php echo e($enddate); ?>';
		startDate = '<?php echo e($startdate); ?>';
		$('#startDate').daterangepicker({
			endDate: endDate,
			startDate: startDate,
			"opens": "center",
			"autoApply": true,
			"showCustomRangeLabel": true,
			"alwaysShowCalendars": true,
			applyClass: 'ui positive button' , 
			cancelClass : 'ui button',
			locale: { cancelLabel: 'Хаах',applyLabel: 'Сонгох' }  
		}, function(start, end, label) {
						startDate = start.format('L');
						endDate = end.format('L');
			});
		
		roomNumber = $('#selectedRoom').val();
	    people =$('#selectedPeople').val();

		$( "#selectedRoom" ).keyup(function() {
			var value = $( this ).val();
			roomNumber = value;
		})

		$( "#selectedPeople" ).keyup(function() {
			var value = $( this ).val();
			people = value;
		})

		
			
	$("#searchButton").click(function(){
		$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		}
		})
		
		searchPlace = $('#searchplace').val();

		$.get(' <?php echo e(url("search")); ?>' + '?roomnumber=' + roomNumber + '&peoplenumber='+ people + '&startdate=' + startDate + '&enddate='+ endDate + '&place=' + searchPlace, function (data) {
			window.location="<?php echo e(URL::to('searchresult')); ?>";
		});
	});
</script>
<?php $__env->stopPush(); ?>