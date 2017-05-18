<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="home-banner">
	<ul class="rslides">
		<li>
			<?php if(App::isLocale('en')): ?>
				<div class="rslides-item" style="background-image: url(<?php echo e(asset('img/banner5.jpg')); ?>)"></div>
			<?php else: ?>
				<img src="<?php echo e(asset('img/banner1.jpg')); ?>">
			<?php endif; ?>
		</li>
	</ul>
</div>
<div id="main-search" style="top: <?php echo e(App::isLocale('en') ? '33vh' : '150px'); ?>">
	<div class="ui stackable container">
		<div id="context2">
			<div class="ui stackable secondary menu">
				<a class="item active" data-tab="hotel">
					<i class="hotel icon"></i><?php echo e(__('messages.Hotel')); ?>

				</a>
				<a href="<?php echo e(url('aspac')); ?>" class="item tab-travel">
					<i class="world icon"></i>JCI ASPAC <?php echo e(date('Y')); ?>

				</a>
				<a href="https://www.sixt.com/php/reservation" target="_blance" class="item">
					<i class="car icon"></i><?php echo e(__('messages.Rent a car')); ?>

				</a>
				<a href="<?php echo e(url('posts')); ?>" class="item tab-aspac">
					<i class="plane icon"></i><?php echo e(__('messages.Travel Inspiration')); ?>

				</a>
			</div>
			<form class="ui form active tab segment" data-tab="hotel" action="<?php echo e(url('searchresult')); ?>" method="POST">
				<div class="ui grid stackable">
					<div class="four wide column">
						<div class="local example">
							<div class="ui search">
								<div class="ui fluid left icon input datalocation">
									<input class="prompt" type="text" name="place" id="searchplace"  data-content="<?php echo e(__('messages.Write your destination of travel')); ?>"  placeholder="<?php echo e(__('messages.Destination')); ?>">
									<i class="marker icon"></i>
								</div>
								<div class="results"></div>
							</div>
						</div>
					</div>
					<div class="four wide column">
						<div class="ui page stackable">
							<form class="ui form">
								<div class="ui fluid left icon input">
									<input type="text" name="reservation"
									id="reservation" placeholder="mm/dd/yyyy - mm/dd/yyyy"
									value=""/>
									<i class="calendar icon"></i>
								</div>
							</form>
						</div>
					</div>
					<div class="three wide column select-room">
						<div class="people" style="display:none">
							<a class="plus" href="#" id="plus">
								<i class="chevron up icon"></i>
							</a>
							<input type="number" name="roomnumber" placeholder="<?php echo e(__('messages.Rooms')); ?>" id="selectedRoom" min="1" value="15">
							<a class="minus" href="#" id="minus">
								<i class="chevron down icon"></i>
							</a>
						</div>
						<select class="ui fluid search dropdown selectedRoom">
							<option value=""><?php echo e(__('messages.Rooms')); ?></option>
							<?php for($i=1; $i< 15; $i++): ?>
							<option value="<?php echo e($i); ?>" <?php if($i == 1): ?> selected <?php endif; ?>><?php echo e($i); ?> <?php echo e(__('messages.room')); ?></option>
							<?php endfor; ?>
							<option value="more"><?php echo e(__('messages.More')); ?></option>
						</select>
					</div>
					
					<div class="three wide column select-room">
						<div class="room" style="display:none">
							<a class="plus" href="#" id="plus1">
								<i class="chevron up icon"></i>
							</a>
							<input type="number" name="peoplenumber" placeholder="<?php echo e(__('messages.People')); ?>" id="selectedPeople" min="1" value="15">
							<a class="minus" href="#" id="minus1">
								<i class="chevron down icon"></i>
							</a>
						</div>
						<select class="ui fluid search dropdown selectedPeople">
							<option value=""><?php echo e(__('messages.People')); ?></option>
							<?php for($i=1; $i< 15; $i++): ?>
							<option value="<?php echo e($i); ?>" <?php if($i == 2): ?> selected <?php endif; ?>><?php echo e($i); ?> <?php echo e(__('messages.people')); ?></option>
							<?php endfor; ?>
							<option value="more"><?php echo e(__('messages.More')); ?></option>
						</select>
				   </div>
					<div class="two wide search-btn column">
						<div class="fluid ui red button" id="searchButton" data-token="<?php echo e(csrf_token()); ?>">
							<?php echo e(__('messages.Search')); ?>

						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php if(App::isLocale('mn')): ?>
	<?php if($informations->count() > 0): ?>
		<section class="cd-hero">
			<ul class="cd-hero-slider autoplay">
				<?php $__currentLoopData = $informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $information): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li class="<?php echo e($key == 0 ? 'selected':''); ?>">
						<div class="cd-full-width">
							<?php if(App::isLocale('en')): ?>
								<h2><?php echo e($information->subtitle_en); ?></h2>
								<?php echo $information->content_en; ?>

							<?php elseif(App::isLocale('mn')): ?>
								<h2><?php echo e($information->subtitle); ?></h2>
								<?php echo $information->content; ?>

							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
			<div class="cd-slider-nav">
				<nav>
					<span class="cd-marker item-1"></span>
					<ul>
						<?php $__currentLoopData = $informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $information): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li class="<?php echo e($key == 0 ? 'selected':''); ?>">
								<a href="#">
									<img src="<?php echo e(asset($information->image)); ?>">
									<label style="word-spacing: 9999px">
										<?php if(App::isLocale('en')): ?>
											<?php echo e($information->title_en); ?>

										<?php elseif(App::isLocale('mn')): ?>
											<?php echo e($information->title); ?>

										<?php endif; ?>
									</label>
								</a>
							</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</nav>
			</div>
		</section>
	<?php endif; ?>
<?php endif; ?>
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
<div class="special-content">
	<div class="ui container">
		<div class="ui stackable grid">
			<div class="three column row">
				<?php if($firstPost): ?>
					<div class="column">
						<h4 class="ui centered header">
							<i class="ui globe icon"></i><?php echo e(App::isLocale('mn') ? $firstPost->category->name : $firstPost->category->name_en); ?>

						</h4>
						<div class="ui special raised link cards">
							<div class="ui fluid card">
								<div class="blurring dimmable image">
									<div class="ui inverted dimmer">
										<div class="content">
											<div class="center">
												<a class="ui primary button" href="<?php echo e(url('post', $firstPost->id)); ?>"><?php echo e(__('messages.Read More')); ?></a>
											</div>
										</div>
									</div>
									<img src="<?php echo e(asset(unserialize($firstPost->photos)[0])); ?>">
								</div>
								<div class="content footer-news">
									<a class="header" href="<?php echo e(url('post', $firstPost->id)); ?>"><?php echo e($firstPost->title); ?></a>
									<div class="meta">
										<span class="date">
											<i class="ui calendar icon"></i>
											<?php echo e(date('Y-m-d', strtotime($firstPost->created_at))); ?>

										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php if($secondPost): ?>
					<div class="column">
						<h4 class="ui centered header">
							<i class="ui map icon"></i><?php echo e(App::isLocale('mn') ? $secondPost->category->name : $secondPost->category->name_en); ?>

						</h4>
						<div class="ui special raised link cards">
							<div class="ui fluid card">
								<div class="blurring dimmable image">
									<div class="ui inverted dimmer">
										<div class="content">
											<div class="center">
												<a class="ui primary button" href="<?php echo e(url('post', $secondPost->id)); ?>"><?php echo e(__('messages.Read More')); ?></a>
											</div>
										</div>
									</div>
									<img src="<?php echo e(asset(unserialize($secondPost->photos)[0])); ?>">
								</div>
								<div class="content footer-news">
									<a class="header"><?php echo e($secondPost->title); ?></a>
									<div class="meta">
										<span class="date">
											<i class="ui calendar icon"></i>
											<?php echo e(date('Y-m-d', strtotime($secondPost->created_at))); ?>

										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php if($hotel): ?>
					<div class="column">
						<h4 class="ui centered header">
							<i class="ui tags icon"></i><?php echo e(__('messages.Sale')); ?>

						</h4>
						<div class="ui special raised link cards">
							<div class="ui fluid card">
								<div class="blurring dimmable image">
									<div class="ui inverted dimmer">
										<div class="content">
											<div class="center">
												<a class="ui primary button" href="<?php echo e(url('search/hotel', $hotel->id)); ?>"><?php echo e(__('messages.Read More')); ?></a>
											</div>
										</div>
									</div>
									<div class="ui fluid image">
										<div class="ui red right ribbon label">
											<?php echo e($room->price); ?>₮
										</div>
										<img src="<?php echo e(asset($hotel->cover_photo)); ?>">
									</div>
								</div>
								<div class="content footer-news">
									<a class="header"><?php echo e($hotel->name); ?>

									<?php for($i=0;$i<$hotel->star;$i++): ?>
										<i class="ui star icon"></i>
									<?php endfor; ?>
									</a>
									<div class="meta">
										<span class="date">
											<i class="marker icon"></i>
											<?php echo e($hotel->address); ?>

										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php if($comments->count() > 0): ?>
	<div class="people-say">
		<div class="ui container">
			<div class="ui two column centered stackable grid">
				<div class="column">
					<section class="slider">
						<div class="flexslider">
							<ul class="slides">
								<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li class="artive">
										<article>
											<div id="owl">
												<div class="large-12 columns testimonial">
													<div class="quote">
														<p><?php echo e($comment->content); ?></p>
													</div>
													<div class="student">
														<div class="photo round-image">
															<img class="ui medium circular image" src="<?php echo e(asset($comment->photo)); ?>">
														</div>
														<p><?php echo e($comment->name); ?></p>
														<p><?php echo e($comment->description); ?></p>
													</div>
												</div>
											</div>
										</article>
									</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<div id="places"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjW4iZ6gWxhzJOE3Vi4wvHZcTH0vgdDqk&libraries=places"></script>
<script src="<?php echo e(asset('js/moment.js')); ?>"></script>
<script src="<?php echo e(asset('js/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.flexslider.js')); ?>"></script>
<script type="text/javascript">
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlsContainer: $(".custom-controls-container"),
			customDirectionNav: $(".custom-navigation a"),
		});
	});
</script>
<script>
	$('#searchplace').val('Ulaanbaatar, Mongolia');
	function initialize() {
		var input = document.getElementById('searchplace');


		var autocomplete = new google.maps.places.Autocomplete(input,{ types: ['(cities)']});
		google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
        });

		let autocompleteService = new google.maps.places.AutocompleteService();
		let request = {input: "Ulaanbaatar, Mongolia"};
		autocompleteService.getPlacePredictions(request, (predictionsArr, placesServiceStatus) => {
				var request = {
                    placeId: predictionsArr[0].place_id
                };
				var service = new google.maps.places.PlacesService(document.getElementById('places'));
				service.getDetails(request, function(place, status) {
					if (status === google.maps.places.PlacesServiceStatus.OK) {
							$('#searchplace').val(place.formatted_address);
					}
				});
		});

   }
   google.maps.event.addDomListener(window, 'load', initialize);
  

   var searchPlace;
   
   $('.datalocation input')
      .popup({
        on: 'focus'
      });
	var roomNumber;
	var people;
	var startDate;
	var endDate;
	endDate = moment().add(1, 'days').format('L');
	startDate = moment().format('L');
	
	roomNumber = $('.selectedRoom').val();
	people =$('.selectedPeople').val();
	
	
	var plus = $('#plus');
	var minus = $('#minus');
	var selectedRoom = $('#selectedRoom');
	plus.click(function(e) {
		var value = parseFloat(selectedRoom.val());
		if(!value){
			value = 0;
        }
		value = value + 1;
		selectedRoom.val(value);
		roomNumber = value;
		$('#selectedPeople').val(value);
		people = value;
		e.preventDefault();
	});		
	minus.click(function(e) {
		var value = parseFloat(selectedRoom.val());
		if(value < 16){
			$('.selectedRoom').dropdown('set selected', 14);
			$('.selectedRoom').css("display","");
			$('.people').css("display","none");
		}else{	
			if (value > 1) {
				value = value - 1;
			}
			selectedRoom.val(value);
			roomNumber = value;
			$('#selectedPeople').val(value);
			people = value;
		}
		e.preventDefault();
	});

	var plus1 = $('#plus1');
	var minus1 = $('#minus1');
	var selectedPeople = $('#selectedPeople');
	plus1.click(function(e) {
		var value = parseFloat(selectedPeople.val());
		if(!value){
			value = 0;
        }
		value = value + 1;
		selectedPeople.val(value);
		people = value;
		e.preventDefault();
	});		
	minus1.click(function(e) {
		var value = parseFloat(selectedPeople.val());
		if(value < 16){
			$('.selectedPeople').dropdown('set selected', 14);
			$('.selectedPeople').css("display","");
			$('.room').css("display","none");
		}else{	
			if (value > 1) {
				value = value - 1;
			}
			selectedPeople.val(value);
			people = value;
		}
		e.preventDefault();
	});

	$( "#selectedRoom" ).keyup(function() {
		var value = $( this ).val();
		roomNumber = value;
		$('#selectedPeople').val(value);
		people = value;
	})

	$( "#selectedPeople" ).keyup(function() {
		var value = $( this ).val();
		people = value;
	})


	$( ".selectedPeople" ).change(function() {
		if($(this).val() === "more"){
			$('.selectedPeople').css("display","none");
			$('.room').css("display","");
			people = 15;
		}else{
			$('.selectedPeople').css("display","");
			$('.room').css("display","none");
			people = $(this).val();
		}
	});

	$( ".selectedRoom" ).change(function() {
		$('.selectedPeople').dropdown('set selected', $(this).val());
		if($(this).val() === "more"){
			$('.selectedRoom').css("display","none");
			$('.people').css("display","");
			roomNumber = 15;
		}else{
			roomNumber = $(this).val();
			
		}
	});

	$('#reservation').daterangepicker({
	endDate: moment().add(1, 'days'),
	minDate: '<?php echo date("m/d/Y") ?>',
    "opens": "center",
    "autoApply": true,
    dateLimitMin: {
            days: 1
    },
    "showCustomRangeLabel": true,
    "alwaysShowCalendars": true,
    applyClass: 'ui positive button' , 
    cancelClass : 'ui button',
    locale: { cancelLabel: 'Хаах',applyLabel: 'Сонгох' }  
    }, function(start, end, label) {
                startDate = start.format('L');
                endDate = end.format('L');
    });
    
    
    $("#searchButton").click(function(){
        $('#searchButton').addClass('loading');
        if(!people){
            people = 2;
        }
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        })
        searchPlace = $('#searchplace').val();
        $.get('search?roomnumber=' + roomNumber + '&peoplenumber=' + people + '&startdate=' + startDate + '&enddate=' + endDate + '&place=' + searchPlace)
        .success(function (data) {
            window.location = "<?php echo e(URL::to('searchresult')); ?>";
        })
        .error(function(jqXHR, textStatus, errorThrown){
            if (textStatus == 'error'){
                    alert(errorThrown);
            }
        });
    });

    
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>