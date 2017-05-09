<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
	<div class="main-breadcrumb">
		<div class="header-search">
			<div class="ui container">
				<div class="ui stackable column grid">
					<div class="four wide column">
						<div class="local example">
							<div class="ui search searhlocation">
								<div class="ui fluid left icon input datalocation">
									<input class="prompt" type="text" placeholder="Очих газар...">
									<i class="marker icon"></i>
								</div>
								<div class="results"></div>
							</div>
						</div>
					</div>
					<div class="four wide column">
						<form class="ui form">
							<div class="ui fluid left icon input">
								<input type="text" name="reservation"
								id="reservation" placeholder="mm/dd/yyyy - mm/dd/yyyy"
								value=""/>
								<i class="calendar icon"></i>
							</div>
						</form>
					</div>
					<div class="three wide column">
						<select class="ui fluid search dropdown" name="roomnumber" id="selectedRoom">
							<option value="">Өрөө</option>
							<option value="1">1 өрөө</option>
							<option value="2">2 өрөө</option>
							<option value="3">3 өрөө</option>
							<option value="4">4 өрөө</option>
							<option value="5">5 өрөө</option>
							<option value="6">6 өрөө</option>
							<option value="7">7 өрөө</option>
							<option value="8">8 өрөө</option>
							<option value="9">9 өрөө</option>
							<option value="10">10 өрөө</option>
							<option value="11">11 өрөө</option>
							<option value="12">12 өрөө</option>
							<option value="13">13 өрөө</option>
							<option value="14">14 өрөө</option>
						</select>
					</div>
					<div class="three wide column">
						<select class="ui fluid search dropdown" name="peoplenumber" id="selectedPeople">
							<option value="">Хүний тоо</option>
							<option value="1">1 хүн</option>
							<option value="2">2 хүн</option>
							<option value="3">3 хүн</option>
							<option value="4">4 хүн</option>
							<option value="5">5 хүн</option>
							<option value="6">6 хүн</option>
							<option value="7">7 хүн</option>
							<option value="8">8 хүн</option>
							<option value="9">9 хүн</option>
							<option value="10">10 хүн</option>
							<option value="11">11 хүн</option>
							<option value="12">12 хүн</option>
							<option value="13">13 хүн</option>
							<option value="14">14 хүн</option>
						</select>
						
					</div>
					<div class="two wide column">
						<div class="fluid ui red button" id="searchButton" data-token="<?php echo e(csrf_token()); ?>">
							Хайх
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div class="ui container">
			<div class="ui stackable column grid">
				<div class="eight wide column">
					<h4 class="ui header">
					<div><?php echo e($hotel->name); ?>

						<?php for($i=0; $i<$hotel->star; $i++): ?>
						<i class="icon yellow star"></i>
						<?php endfor; ?>
					</div>
					<div class="sub header"><?php echo e($hotel->address); ?></div>
					</h4>
				</div>
				<div class="right aligned eight wide column">
					<div class="ui breadcrumb">
						<a class="section" href="<?php echo e(url('/')); ?>">Эхлэл</a>
						<span class="divider">/</span>
						<div class="active section"><?php echo e($hotel->name); ?> </div>
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
						<div class="ui stackable container content-search">
							<div class="ui stackable segment">
								<div class="ui stackable grid">
									<div class="five wide column">
										
										<div id="main" role="main">
											<section class="slider">
												<div id="slider" class="flexslider">
													<ul class="slides">
													<?php if($hotel->other_photos): ?>		
													<?php $__currentLoopData = json_decode($hotel->other_photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<li>
															<img src="<?php echo e(asset($photo)); ?>" />
														</li>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endif; ?>
													</ul>
												</div>
												<div id="carousel" class="flexslider">
													<ul class="slides">
													<?php if($hotel->other_photos): ?>	
													<?php $__currentLoopData = json_decode($hotel->other_photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<li>
															<img src="<?php echo e(asset($photo)); ?>" />
														</li>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endif; ?>
													</ul>
												</div>
											</section>
											
										</div>
										<div class="pay-total">
											<div class="ui  yellow inverted segment">
												<h4 class="ui header">Таны захиалга</h4>
												
												 <?php if($startdate != 'undefined'): ?>
												 <p>Байрлах хоног: <span id="difference">0</span> өдөр</p>
												 <p> 
												  <?php echo e($startdate); ?> - <?php echo e($enddate); ?>

												</p>
												 <?php else: ?>
												 <p>Өдрөө сонгоно уу </p>
												 <?php endif; ?>
												
												<h4 class="ui header">Онгоцны буудлаас тосох</h4>
												<div class="ui form">
													<div class="grouped fields">
														
														<div class="field">
															<div class="ui checkbox">
																<input type="checkbox">
																<label>SIXT - 50,000₮</label>
															</div>
															
														</div>
														<div class="field">
															<div class="ui checkbox">
																<input type="checkbox">
																<label>Энгийн - 50,000₮</label>
															</div>
															
														</div>
														
														
													</div>
												</div>
												
												<h4 class="ui header">Өрөөнүүд</h4>
												<div id="roomtype" class="ui middle aligned divided list">
													<div class="item" style="color:black" id="nullRoom">
														Өрөө сонгоно үү
													</div>
												
													<div class="item">
														<div class="content">
															<h2 class="ui sub header">
															НӨАТ
															</h2>
															<span id="nuat">0.00 ₮</span>
														</div>
													</div>
													<div class="item">
														<div class="right floated content">
															<div class="ui ihotel button" id="order">захиалах</div>
														</div>
														<div class="content">
															<h2 class="ui sub header">
															Нийт дүн:
															</h2>
															<h2 class="ui sub header" id="totalPrice">
																0 ₮
															</h2>
															
														</div>
													</div>
													
												</div>
											</div>
										</div>
										<h4 class="ui header">Зочид буудлын онцлог</h4>
										<div class="ui segment">
											<div class="ui list">
												<?php if($hotel->is_internet === 1): ?>
												<div class="item">
													<i class="circular wifi icon"></i>
													<div class="content">
														Утасгүй интернет
													</div>
												</div>
												<?php endif; ?>
												<?php if($hotel->is_child === 1): ?>
												<div class="item">
													<i class="circular child icon"></i>
													<div class="content">
														Хүүхэд авчрах боломжтой
													</div>
												</div>
												<?php endif; ?>
												<?php if($hotel->services): ?>
												<?php $__currentLoopData = $hotel->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="item">
													<i class="circular tags icon"></i>
													<div class="content">
														<?php echo e($service->name); ?>

													</div>
												</div>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
											</div>
										</div>
										
										
									</div>
									<div class="eleven wide column">
										<div class="ui sizer vertical segment">
											
											<div class="ui large header">Танилцуулга</div>
											<p class="ui justify">
													<?php echo e($hotel->introduction); ?>

											</p>
										</div>
										<div class="ui sizer vertical segment">
											
											<div class="ui large header">Холбоо барих</div>
											<p class="ui justify">
												<i class="circular mail icon"></i><?php echo e($hotel->email); ?>  <i class="circular phone icon"></i><?php echo e($hotel->phone_number); ?>

											</p>
											
										</div>
										<div class="ui sizer vertical segment">
											
											<div class="ui large header">Хаяг</div>
											<p class="ui justify">
												<i class="circular marker icon"></i><?php echo e($hotel->address); ?>

											</p>
											
										</div>
										<div class="ui large header">Өрөөнүүд</div>
										<?php $__currentLoopData = $hotel->rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="ui segment">
											<div class="ui stackable column grid">
												
												<div class="four wide column">
													
													<img class="ui image" src="<?php echo e(asset(json_decode($room->photos)[0])); ?>"/>
												</div>
												<div class="eight wide column">
													<div class="ui large header"><?php echo e($room->name); ?></div>
													<p class="ui justify">
														<?php echo e($room->introduction); ?>

													</p>
													<div class="ui horizontal list">
														<?php if($room->people_number): ?>
														<div class="item">
															<i class="circular user icon"></i>
															<div class="middle aligned content">
																x<?php echo e($room->people_number); ?>

															</div>
														</div>
														<?php endif; ?>
														<?php if($room->bed_number): ?>
														<div class="item">
															<i class="circular hotel icon"></i>
															<div class="middle aligned content">
																x<?php echo e($room->bed_number); ?>

															</div>
														</div>
														<?php endif; ?>
														<?php if($room->size): ?>
														<div class="item">
															<i class="circular expand icon"></i>
															<div class="middle aligned content">
																<?php echo e($room->size); ?> m2
															</div>
														</div>
														<?php endif; ?>
													</div>
												</div>
												<div class="four wide column">
													
													<div class="ui large header" id="price<?php echo e($key); ?>" data-price="<?php echo e($room->price); ?>"><?php echo e($room->price); ?>₮/хоног</div>
													<p class="ui justify">
														<select class="ui fluid search dropdown" id="night<?php echo e($key); ?>">
															<option selected="selected">0</option>
															<?php for($i = 1; $i < 25; $i++): ?>
																<option value="<?php echo e($i); ?>"><?php echo e($i); ?> өдөр - <?php echo e($room->price * $i); ?>₮</option>
															<?php endfor; ?>
														</select>
													</p>
												</div>
											</div>
										</div>
									 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
	<?php $__env->stopSection(); ?>
	<?php $__env->startPush('script'); ?>
	<script src="<?php echo e(asset('js/moment.js')); ?>"></script>
	<script src="<?php echo e(asset('js/daterangepicker.js')); ?>"></script>
	<script defer src="<?php echo e(asset('js/jquery.flexslider.js')); ?>"></script>
	<link rel="stylesheet" href="<?php echo e(asset('css/flexslider.css')); ?>" type="text/css" media="screen" />
	<script>

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
	</script>
			<script>
		function removeRow(index){
			var Totalsum = 0;
			var string = '.nightRoom';
			string = string.concat(index);
			var val = $("#roomtype .perprice").length;
			if(val == 1){
				$('#nullRoom').show();
			}
			$('#roomtype').find(string).remove();
			$('.price').each(function()
			{
				Totalsum += parseFloat($(this).text());
			});
			nuat = parseFloat(Totalsum*0.1).toFixed(2);
			$('#nuat').html(nuat+ ' ₮');
			var finalprice = parseFloat(Totalsum*0.1) + parseInt(Totalsum);
			$('#totalPrice').html(finalprice +' ₮');
		}
		
	
		var array = [];
		 array = <?php echo json_encode($hotel->rooms );?>;
		
		 $.each(array,function(index,value){
				 var sum = 0;
			 	 var string = '';
				 var defaultID = '.nightRoom0';
				 var counter = 0;
				 var defaultclass = '';
				 var totalprice = 0;
				 var nuat = 0;
				var perprice = $('#price'+ index).data('price');
				$('#night'+index).on('change', function() {
						var Totalsum = 0;
						var dayprice = perprice * this.value;
						$('#nullRoom').hide();
						string = '<div class="item nightRoom'+index+'" id="#nightRoom'+index+'">\
									<div class="right floated content " >\
										<button class="small ui button" onclick="removeRow('+index+');" id="removeRoom">\
										хасах\
										</button>\
									</div>\
									<div class="content">\
										<h2 class="ui sub header" >\
										'+ value.name +'\
										</h2>\
										<span class="perprice">'+ this.value +' өдөр - '+ perprice * this.value +'₮</span>\
										<span class="price" style="display:none">'+ perprice * this.value +'</span>\
									</div>\
									</div>';
									var className = '.nightRoom';
									var final = className.concat(index);
								
									if(final === defaultID){
														defaultclass = 'nightRoom';
														var concatted = defaultclass.concat(index);
														defaultID = final;
														var val = $("div").hasClass(concatted);
														if(val == true){
															$("#roomtype").find(final).find('.price').text(perprice * this.value);
															$("#roomtype").find(final).find('.perprice').text( this.value +' өдөр - '+ perprice * this.value +'₮' );
														}
														else {
															$('#roomtype').prepend(string);
														}
														
									}
									else {
										defaultID = final;
										counter ++;
										if(counter < array.length){
												$('#roomtype').prepend(string);
										}
									}
										$('.price').each(function()
										{
											Totalsum += parseFloat($(this).text());
										});
										nuat = parseFloat(Totalsum*0.1).toFixed(2);
										$('#nuat').html(nuat+ ' ₮');
										var finalprice = parseFloat(Totalsum*0.1) + parseInt(Totalsum);
										$('#totalPrice').html(finalprice +' ₮');
									})
		 })
		

				var roomNumber;
				var people;
				var startDate;
				var endDate;
				var searchPlace;

				searchPlace = '<?php echo e($place); ?>';
				
				if(searchPlace == 'undefined'){
					$('.datalocation input').val('');
				}
				else {
					$('.datalocation input').val(searchPlace);
				}	



				$('.ui.search')
					.search({
					source: content,
					error: {
						noResults: 'Үр дүн олдсонгүй ...'
					},
					onSelect : function(event) {
						searchPlace = event.title;
						return 'default';
					}
				})


				endDate = '<?php echo e($enddate); ?>';
				startDate = '<?php echo e($startdate); ?>';
				var plus = moment.duration(moment(endDate).diff(moment(startDate))).days();;
				$('#difference').html(plus);
				$('#selectedRoom').on('change', function() {
						 roomNumber = this.value;
				})
				$('#selectedPeople').on('change', function() {
						 people = this.value;
				})
				$('#reservation').daterangepicker({
				"autoApply": true,
				endDate: endDate,
				startDate: startDate,
				"showCustomRangeLabel": true,
				"alwaysShowCalendars": true,
				"opens": "center"
				}, function(start, end, label) {
						  startDate = start.format('L');
						  endDate = end.format('L');
				});
				 var roNum = '<?php echo e($roomnumber); ?>';
				$('#selectedRoom option').each(function() {
					if($(this).val() == roNum) {
						$(this).prop("selected", true);
						roomNumber = roNum;
					}
				});

				var perNum = '<?php echo e($peoplenumber); ?>';
				$('#selectedPeople option').each(function() {
					if($(this).val() == perNum) {
						$(this).prop("selected", true);
						people = perNum
					}
				});

				$("#searchButton").click(function(){
					$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					}
					})
					$.get('search?roomnumber=' + roomNumber + '&peoplenumber='+ people + '&startdate=' + startDate + '&enddate='+ endDate + '&place=' + searchPlace, function (data) {
						window.location="<?php echo e(url('searchresult')); ?>";
					});
				});


				$( "#order" ).click(function() {
					var price = $('#totalPrice').text();
					console.log(price);
					window.location="<?php echo e(url('hotel/order')); ?>";
				});

		 </script>
	
	
		<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>