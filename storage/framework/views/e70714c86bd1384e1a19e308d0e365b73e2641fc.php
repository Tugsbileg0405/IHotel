 

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
								<input class="prompt" type="text" id="searchplace" placeholder="<?php echo e(__('messages.Destination')); ?>">
								<i class="marker icon"></i>
							</div>
							<div class="results"></div>
						</div>
					</div>
				</div>
				<div class="four wide column">
					<form class="ui form">
						<div class="ui fluid left icon input">
							<input type="text" name="reservation" id="reservation" placeholder="mm/dd/yyyy - mm/dd/yyyy" value="" />
							<i class="calendar icon"></i>
						</div>
					</form>
				</div>
				<div class="three wide column">
					<div class="ui form">
						<div class="people" style="display: <?php echo e($roomnumber >= 15 ? '' : 'none'); ?>">
							<a class="plus" href="#" id="plus0">
								<i class="chevron up icon"></i>
							</a>
							<input type="number" name="roomnumber" min="1" placeholder="<?php echo e(__('messages.Rooms')); ?>" id="selectedRoom" value="<?php echo e($roomnumber ? $roomnumber : 2); ?>">
							<a class="minus" href="#" id="minus0">
								<i class="chevron down icon"></i>
							</a>
						</div>
						<select class="<?php echo e($roomnumber < 15 ? 'ui' : ''); ?> fluid search dropdown selectedRoom" style="display: <?php echo e($roomnumber < 15 ? '' : 'none'); ?>">
                            <option value=""><?php echo e(__('messages.Rooms')); ?></option>
                            <?php for($i=1; $i< 15; $i++): ?>
                                <option value="<?php echo e($i); ?>" <?php if($i == $roomnumber): ?> selected <?php endif; ?>><?php echo e($i); ?> <?php echo e(__('messages.room')); ?></option>
                            <?php endfor; ?>
                            <option value="more"><?php echo e(__('messages.More')); ?></option>
                        </select>
					</div>
				</div>
				<div class="three wide column">
					<div class="ui form">
						<div class="room" style="display: <?php echo e($peoplenumber >= 15 ? '' : 'none'); ?>">
							<a class="plus" href="#" id="plus1">
								<i class="chevron up icon"></i>
							</a>
							<input type="number" name="peoplenumber" min="1" placeholder="<?php echo e(__('messages.People')); ?>" id="selectedPeople" value="<?php echo e($peoplenumber ? $peoplenumber : 1); ?>">
							<a class="minus" href="#" id="minus1">
								<i class="chevron down icon"></i>
							</a>
						</div>
						<select class="<?php echo e($peoplenumber < 15 ? 'ui' : ''); ?> fluid search dropdown selectedPeople" style="display: <?php echo e($peoplenumber < 15 ? '' : 'none'); ?>">
                            <option value=""><?php echo e(__('messages.People')); ?></option>
                            <?php for($i=1; $i< 15; $i++): ?>
                                <option value="<?php echo e($i); ?>" <?php if($i == $peoplenumber): ?> selected <?php endif; ?>><?php echo e($i); ?> <?php echo e(__('messages.people')); ?></option>
                            <?php endfor; ?>
                            <option value="more"><?php echo e(__('messages.More')); ?></option>
                        </select>
					</div>
				</div>
				<div class="two wide column">
					<div class="fluid ui red button" id="searchButton" data-token="<?php echo e(csrf_token()); ?>">
						<?php echo e(__('messages.Search')); ?>

					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="eight wide column">
				<h4 class="ui header">
					<div>
						<?php if(App::isLocale('mn')): ?> 
							<?php echo e($hotel->name); ?> 
						<?php elseif(App::isLocale('en')): ?> 
							<?php if($hotel->name_en): ?> 
								<?php echo e($hotel->name_en); ?> 
							<?php else: ?>
								<?php echo e($hotel->name); ?> 
							<?php endif; ?> 
						<?php endif; ?> 
						<?php for($i=0; $i<$hotel->star; $i++): ?>
							<i class="icon yellow star"></i> 
						<?php endfor; ?>
					</div>
					<div class="sub header">
						<?php if(App::isLocale('mn')): ?> 
							<?php echo e($hotel->address); ?> 
						<?php elseif(App::isLocale('en')): ?> 
							<?php if($hotel->address_en): ?> 
								<?php echo e($hotel->address_en); ?> 
							<?php else: ?> 
								<?php echo e($hotel->address); ?> 
							<?php endif; ?> 
						<?php endif; ?>
					</div>
				</h4>
			</div>
			<div class="right aligned eight wide column">
				<div class="ui breadcrumb">
					<a class="section" href="<?php echo e(url('/')); ?>"><?php echo e(__('messages.Home')); ?></a>
					<span class="divider">/</span>
					<div class="active section">
						<?php if(App::isLocale('mn')): ?> 
							<?php echo e($hotel->name); ?> 
						<?php elseif(App::isLocale('en')): ?> 
							<?php if($hotel->name_en): ?> 
								<?php echo e($hotel->name_en); ?> 
							<?php else: ?>
								<?php echo e($hotel->name); ?> 
							<?php endif; ?> 
						<?php endif; ?>
					</div>
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
													<?php if($hotel->cover_photo): ?>
													<li>
														<a class="popup-link" href="<?php echo e(asset($hotel->cover_photo)); ?>">
															<img src="<?php echo e(asset($hotel->cover_photo)); ?>"/>
														</a>
													</li>
													<?php endif; ?> 
													<?php if($hotel->other_photos): ?> 
														<?php $__currentLoopData = unserialize($hotel->other_photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<li>
															<a class="popup-link" href="<?php echo e(asset($photo)); ?>">
																<img src="<?php echo e(asset($photo)); ?>" />
															</a>
														</li>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
													<?php endif; ?>
												</ul>
											</div>
											<div id="carousel" class="flexslider">
												<ul class="slides">
													<?php if($hotel->cover_photo): ?>
													<li>
														<img src="<?php echo e(asset($hotel->cover_photo)); ?>" />
													</li>
													<?php endif; ?> 
													<?php if($hotel->other_photos): ?> 
														<?php $__currentLoopData = unserialize($hotel->other_photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
											<h4 class="ui header"><?php echo e(__('messages.Your order')); ?></h4>
											<?php if($startdate != 'undefined'): ?>
												<p><?php echo e(__('messages.Night')); ?>: <span id="difference">0</span></p>
												<p><?php echo e($startdate); ?> - <?php echo e($enddate); ?></p>
											<?php else: ?>
												<p><?php echo e(__('messages.Choose a day')); ?></p>
											<?php endif; ?>
											<h4 class="ui header"><?php echo e(__('messages.Pickup service')); ?></h4>
											<div class="ui form">
												<div class="grouped fields" id="pickups">
													<?php $__currentLoopData = $pickups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pickup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<div class="field">
														<div class="ui checkbox">
															<input type="checkbox" name="carrent" id="carrent<?php echo e($pickup->id); ?>" data-id="<?php echo e($pickup->id); ?>" data-price="<?php echo e($pickup->price); ?>" class="pickup hidden"> 
															<?php if(App::isLocale('mn')): ?>
																<label><?php echo e($pickup->name); ?> - <?php echo e(number_format($pickup->price)); ?>₮</label> 
															<?php elseif(App::isLocale('en')): ?>
																<label><?php echo e($pickup->name_en); ?> - <?php echo e(number_format($pickup->price/$rate,2)); ?>$</label>
															<?php endif; ?>
														</div>
													</div>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</div>
											</div>
											<h4 class="ui header"><?php echo e(__('messages.Rooms')); ?></h4>
											<div id="roomtype" class="ui middle aligned divided list">
												<div class="item" style="color:black" id="nullRoom">
													<?php echo e(__('messages.Choose a room')); ?>

												</div>
												<!--<div class="item">
													<div class="content">
														<h2 class="ui sub header">
															<?php echo e(__('messages.Tax')); ?>

														</h2>
														<?php if(App::isLocale('mn')): ?>
															<span id="nuat"><?php echo e(number_format(0)); ?> ₮</span> 
														<?php elseif(App::isLocale('en')): ?>
															<span id="nuat"><?php echo e(number_format(0)); ?> $</span> 
														<?php endif; ?>
													</div>
												</div>-->
												<div class="item">
													<div class="right floated content">
														<div class="ui ihotel button" id="order"><?php echo e(__('messages.Order')); ?></div>
													</div>
													<div class="content">
														<h2 class="ui sub header"><?php echo e(__('messages.Total price')); ?>:</h2>
														<?php if(App::isLocale('mn')): ?>
															<h2 class="ui sub header" id="totalPrice">0 ₮</h2>
														<?php elseif(App::isLocale('en')): ?>
															<h2 class="ui sub header" id="totalPrice">0 $</h2>
														<?php endif; ?>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php if($hotel->is_internet != 0 OR $hotel->is_child != 0 OR $hotel->services->count() != 0): ?>
									<h4 class="ui header"><?php echo e(__('messages.Options')); ?></h4>
									<div class="ui segment">
										<div class="ui list">
											<?php if($hotel->is_internet == 1): ?>
											<div class="item">
												<i class="circular wifi icon"></i>
												<div class="content">
													<?php echo e(__('messages.Wifi')); ?>

												</div>
											</div>
											<?php endif; ?> 
											<?php if($hotel->is_child == 1): ?>
											<div class="item">
												<i class="circular child icon"></i>
												<div class="content">
													<?php echo e(__('messages.Children are welcome')); ?>

												</div>
											</div>
											<?php endif; ?>
											<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="ui large header"><?php echo e($name); ?></div>
												<?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<div class="item">
														<i class="circular <?php echo e($item->icon); ?> icon"></i>
														<div class="content">
															<?php if(App::isLocale('en')): ?> 
																<?php if($item->name_en): ?> 
																	<?php if($item->name_en): ?> 
																		<?php echo e($item->name_en); ?> 
																	<?php else: ?> 
																		<?php echo e($item->name); ?>

																	<?php endif; ?> 
																<?php else: ?> 
																	<?php echo e($item->name); ?> 
																<?php endif; ?> 
															<?php elseif(App::isLocale('mn')): ?> 
																<?php echo e($item->name); ?> 
															<?php endif; ?>
														</div>
													</div>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
										</div>
									</div>
									<?php endif; ?>
								</div>
								<div class="eleven wide column">
									<div class="ui sizer vertical segment">
										<div class="ui large header">
											<?php echo e(__('messages.Introduction')); ?>

										</div>
										<div class="ui justify">
											<?php if(App::isLocale('mn')): ?> 
												<?php echo $hotel->introduction; ?> 
											<?php elseif(App::isLocale('en')): ?> 
												<?php if($hotel->introduction_en): ?> 
													<?php echo $hotel->introduction_en; ?> 
												<?php else: ?> 
													<?php echo $hotel->introduction; ?> 
												<?php endif; ?> 
											<?php endif; ?>
										</div>
									</div>
									<div class="ui sizer vertical segment">
										<div class="ui large header"><?php echo e(__('messages.Contact')); ?></div>
										<p class="ui justify">
											<i class="circular mail icon"></i><?php echo e($hotel->email); ?> <i class="circular phone icon"></i>
											<?php echo e($hotel->phone_number); ?>

										</p>
									</div>
									<div class="ui sizer vertical segment">
										<div class="ui large header"><?php echo e(__('messages.Address')); ?></div>
										<p class="ui justify">
											<i class="circular marker icon"></i> 
											<?php if(App::isLocale('mn')): ?> 
												<?php echo e($hotel->address); ?> 
											<?php elseif(App::isLocale('en')): ?>
												<?php if($hotel->address_en): ?> 
													<?php echo e($hotel->address_en); ?> 
												<?php else: ?> 
													<?php echo e($hotel->address); ?> 
												<?php endif; ?> 
											<?php endif; ?>
										</p>
									</div>
									<div class="ui large header"><?php echo e(__('messages.Rooms')); ?></div>
									<?php $__currentLoopData = $rooms->sortBy('price'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="ui segment">
										<div class="ui stackable column grid">
											<div class="four wide column">
                                                <div class="slider-room flexslider">
                                                    <ul class="slides">
                                                        <?php $__currentLoopData = unserialize($room->photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a class="popup-link-room-<?php echo e($room->id); ?>" href="<?php echo e(asset($photo)); ?>">
                                                                    <img src="<?php echo e(asset($photo)); ?>">
                                                                </a>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
											</div>
											<div class="seven wide column">
												<div class="ui large header"><?php echo e($room->name); ?></div>
												<p class="ui justify">
													<?php if(App::isLocale('mn')): ?> 
														<?php echo $room->introduction; ?> 
													<?php elseif(App::isLocale('en')): ?> 
														<?php if($room->introduction_en): ?> 
															<?php echo $room->introduction_en; ?> 
														<?php else: ?> 
															<?php echo $room->introduction; ?> 
														<?php endif; ?> 
													<?php endif; ?>
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
									
											<div class="five wide column">
												<?php if(App::isLocale('mn')): ?> 
													<?php if($room->saled_room): ?> 
														<?php $__currentLoopData = $room->saled_room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<div class="ui large header" id="price<?php echo e($key); ?>" data-price="<?php echo e($sale->price); ?>">
																<!--<span class="sub header" style="text-decoration: line-through"><?php echo e(number_format($room->price)); ?>₮/<?php echo e(__('messages.per night')); ?></span>-->
																<div><?php if($room->price_op): ?><i class="icon couple room_price"></i><?php endif; ?><?php echo e(number_format($sale->price)); ?>₮/<?php echo e(__('messages.per night')); ?></div>
															</div>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php else: ?>
														<div class="ui large header" id="price<?php echo e($key); ?>" data-price="<?php echo e($room->price); ?>">
															<?php if($room->price_op): ?><i class="icon couple room_price"></i><?php endif; ?><?php echo e(number_format($room->price)); ?>₮/<?php echo e(__('messages.per night')); ?>

														</div>
													<?php endif; ?> 
												<?php elseif(App::isLocale('en')): ?> 
													<?php if($room->saled_room): ?> 
														<?php $__currentLoopData = $room->saled_room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<div class="ui large header" id="price<?php echo e($key); ?>" data-price="<?php echo e($sale->price); ?>">
															<!--<span  class="sub header" style="text-decoration: line-through"><?php echo e(number_format($room->price/$rate,2)); ?>$/<?php echo e(__('messages.per night')); ?></span>-->
															<div><?php if($room->price_op): ?><i class="icon couple room_price"></i><?php endif; ?><?php echo e(number_format($sale->price/$rate,2)); ?>$/<?php echo e(__('messages.per night')); ?></div>
														</div>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
													<?php else: ?>
														<div class="ui large header" id="price<?php echo e($key); ?>" data-price="<?php echo e($room->price); ?>">
															<?php if($room->price_op): ?><i class="icon couple room_price"></i><?php endif; ?><?php echo e(number_format($room->price/$rate,2)); ?>$/<?php echo e(__('messages.per night')); ?>

														</div>
													<?php endif; ?> 
												<?php endif; ?>
												<p class="ui justify">
													<?php if($room->number < 1): ?>
														<select class="ui fluid search dropdown disabled">
															<option value="disabled" ><?php echo e(__('messages.No rooms available')); ?></option>
														</select> 
													<?php else: ?>
														<select class="ui fluid search dropdown" id="night<?php echo e($key); ?>">
															<option value="selected" ><?php echo e(__('messages.Choose a room')); ?></option>
															<?php for($i = 1; $i <= $room->number; $i++): ?>
																<?php if(App::isLocale('mn')): ?>
																	<?php if($room->saled_room): ?>
																		<?php $__currentLoopData = $room->saled_room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<option value="<?php echo e($i); ?>"><?php echo e($i); ?> <?php echo e(__('messages.room')); ?> - <?php echo e(number_format($sale->price * $i)); ?>₮</option>
																		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																	<?php else: ?>
																		<option value="<?php echo e($i); ?>"><?php echo e($i); ?> <?php echo e(__('messages.room')); ?> - <?php echo e(number_format($room->price * $i)); ?>₮</option>
																	<?php endif; ?> 
																<?php elseif(App::isLocale('en')): ?>
																	<?php if($room->saled_room): ?>
																		<?php $__currentLoopData = $room->saled_room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<option value="<?php echo e($i); ?>"><?php echo e($i); ?> <?php echo e(__('messages.room')); ?> - <?php echo e(number_format($sale->price * $i/$rate,2)); ?>$</option>
																		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																	<?php else: ?>
																		<option value="<?php echo e($i); ?>"><?php echo e($i); ?> <?php echo e(__('messages.room')); ?> - <?php echo e(number_format($room->price * $i/$rate,2)); ?>$</option>
																	<?php endif; ?>  
																<?php endif; ?>
															<?php endfor; ?>
														</select> 
													<?php endif; ?>
												</p>
												<?php if($room->price_op): ?>
													<?php if(App::isLocale('mn')): ?> 
														<?php if($room->saled_room): ?> 
															<?php $__currentLoopData = $room->saled_room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<div class="ui large header" id="price_op<?php echo e($key); ?>" data-price="<?php echo e($sale->price_op); ?>">
																	<!--<span class="sub header" style="text-decoration: line-through"><?php echo e(number_format($room->price)); ?>₮/<?php echo e(__('messages.per night')); ?></span>-->
																	<div><i class="icon user room_price"></i><?php echo e(number_format($sale->price_op)); ?>₮/<?php echo e(__('messages.per night')); ?></div>
																</div>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														<?php else: ?>
															<div class="ui large header" id="price_op<?php echo e($key); ?>" data-price="<?php echo e($room->price_op); ?>">
																<i class="icon user room_price"></i><?php echo e(number_format($room->price_op)); ?>₮/<?php echo e(__('messages.per night')); ?>

															</div>
														<?php endif; ?> 
													<?php elseif(App::isLocale('en')): ?> 
														<?php if($room->saled_room): ?> 
															<?php $__currentLoopData = $room->saled_room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<div class="ui large header" id="price_op<?php echo e($key); ?>" data-price="<?php echo e($sale->price_op); ?>">
																<!--<span  class="sub header" style="text-decoration: line-through"><?php echo e(number_format($room->price/$rate,2)); ?>$/<?php echo e(__('messages.per night')); ?></span>-->
																<div><i class="icon user room_price"></i><?php echo e(number_format($sale->price_op/$rate,2)); ?>$/<?php echo e(__('messages.per night')); ?>

																</div>
															</div>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
														<?php else: ?>
															<div class="ui large header" id="price_op<?php echo e($key); ?>" data-price="<?php echo e($room->price_op); ?>">
																<i class="icon user room_price"></i><?php echo e(number_format($room->price_op/$rate,2)); ?>$/<?php echo e(__('messages.per night')); ?>

															</div>
														<?php endif; ?> 
													<?php endif; ?>
													<p class="ui justify">
														<?php if($room->number < 1): ?>
															<select class="ui fluid search dropdown disabled">
																<option value="disabled" ><?php echo e(__('messages.No rooms available')); ?></option>
															</select> 
														<?php else: ?>
															<select class="ui fluid search dropdown" id="night_op<?php echo e($key); ?>">
																<option value="selected" ><?php echo e(__('messages.Choose a room')); ?></option>
																<?php for($i = 1; $i <= $room->number; $i++): ?>
																	<?php if(App::isLocale('mn')): ?>
																		<?php if($room->saled_room): ?>
																			<?php $__currentLoopData = $room->saled_room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																				<option value="<?php echo e($i); ?>"><?php echo e($i); ?> <?php echo e(__('messages.room')); ?> - <?php echo e(number_format($sale->price_op * $i)); ?>₮</option>
																			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																		<?php else: ?>
																			<option value="<?php echo e($i); ?>"><?php echo e($i); ?> <?php echo e(__('messages.room')); ?> - <?php echo e(number_format($room->price_op * $i)); ?>₮</option>
																		<?php endif; ?> 
																	<?php elseif(App::isLocale('en')): ?>
																		<?php if($room->saled_room): ?>
																			<?php $__currentLoopData = $room->saled_room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																				<option value="<?php echo e($i); ?>"><?php echo e($i); ?> <?php echo e(__('messages.room')); ?> - <?php echo e(number_format($sale->price_op * $i/$rate,2)); ?>$</option>
																			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																		<?php else: ?>
																			<option value="<?php echo e($i); ?>"><?php echo e($i); ?> <?php echo e(__('messages.room')); ?> - <?php echo e(number_format($room->price_op * $i/$rate,2)); ?>$</option>
																		<?php endif; ?>  
																	<?php endif; ?>
																<?php endfor; ?>
															</select> 
														<?php endif; ?>
													</p>
												<?php endif; ?>
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
</div>
<?php $__env->stopSection(); ?> <?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('js/moment.js')); ?>"></script>
<script src="<?php echo e(asset('js/daterangepicker.js')); ?>"></script>
<script defer src="<?php echo e(asset('js/jquery.flexslider.js')); ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDssMBUJqsqfD7XE5DKCbk6jK9R1C81MH0&libraries=places"></script>
<link rel="stylesheet" href="<?php echo e(asset('css/flexslider.css')); ?>" type="text/css" media="screen" />
<script>
	function initMap() {
		var input = document.getElementById('searchplace');
		var autocomplete = new google.maps.places.Autocomplete(input, { types: ['(cities)'] });
	}
	initMap();
	$('.ui.radio.checkbox').checkbox();
	$(window).load(function () {
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
			start: function (slider) {
				$('body').removeClass('loading');
			}
		});
		$('.slider-room').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false
		});
		$('.popup-link').magnificPopup({
			type: 'image',
			gallery: { enabled: true }
		});
        '<?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'
            $('.popup-link-room-<?php echo e($room->id); ?>').magnificPopup({
                type: 'image',
                gallery: { enabled: true }
            });
        '<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>'
	});
</script>
<script>
	// =============================================================================
	// - Remove information of room from order section 
	// =============================================================================
	var checkReset = true;
	var checkReset2 = true;
	var Totalsum = 0;
	var pickup = {};
	var pickup_price = 0;
	var array = [];
	var orderData = [];
	array = <?php echo json_encode($rooms);?>;
    var pickups = [];
    pickups = <?php echo json_encode($pickups); ?>;
    $(document).ready(function () {
        $.each(array, function (index, value) {
            var selectedval = $('#night' + index).find(":selected").val();
            var selectedval2 = $('#night_op' + index).find(":selected").val();
            var sum = 0;
            var string = '';
            var defaultID = '.nightRoom0';
            var counter = 0;
            var defaultclass = '';
            var totalprice = 0;
            var nuat = 0;
            var rating = "<?php echo e($rate); ?>";
            var perprice;
			
            if ((selectedval == null && selectedval2 == null) || (selectedval == 'selected' && selectedval2 == 'selected') || (selectedval == 'selected' && selectedval2 == null) || (selectedval == null && selectedval2 == 'selected')) {
                removeRow(index);
            }
            else {
                if((selectedval && selectedval2 == null) || (selectedval && selectedval2 == 'selected')){
                    perprice  = $('#price' + index).data('price');
                    Totalsum = 0;
                    $('#nullRoom').hide();
                    <?php if(App::isLocale('mn')): ?> 
                    string = '<div class="item nightRoom' + index + '" id="#nightRoom' + index + '">\
                            <div class="right floated content " >\
                                <button class="small ui button" onclick="removeRow('+ index + ');" id="removeRoom">\
                                <?php echo e(__("messages.remove")); ?>\
                                </button>\
                            </div>\
                            <div class="content">\
                                <h2 class="ui sub header" >\
                                '+ value.name + '\
                                </h2>\
                                <span class="perprice">'+ selectedval + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * selectedval).format('0,0') + '₮</span>\
                                <span class="price" style="display:none">'+ plus * perprice * selectedval + '</span>\
                            </div>\
                            </div>';
                    <?php elseif(App::isLocale('en')): ?>
                    string = '<div class="item nightRoom' + index + '" id="#nightRoom' + index + '">\
                            <div class="right floated content " >\
                                <button class="small ui button" onclick="removeRow('+ index + ');" id="removeRoom">\
                                <?php echo e(__("messages.remove")); ?>\
                                </button>\
                            </div>\
                            <div class="content">\
                                <h2 class="ui sub header" >\
                                '+ value.name + '\
                                </h2>\
                                <span class="perprice">'+ selectedval + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * selectedval / rating).format('0,0.00') + '$</span>\
                                <span class="price" style="display:none">'+ parseFloat(plus * perprice * selectedval / rating).toFixed(2) + '</span>\
                            </div>\
                            </div>';
                    <?php endif; ?>
                    var className = '.nightRoom';
                    var final = className.concat(index);
                    if (final == defaultID) {
                        defaultclass = 'nightRoom';
                        var concatted = defaultclass.concat(index);
                        defaultID = final;
                        var val = $("div").hasClass(concatted);
                    if (val == true) {
                        changeDesc(index, selectedval);
                        $("#order").removeClass("disabled");
                        <?php if(App::isLocale('mn')): ?> 
                            $("#roomtype").find(final).find('.price').text(plus * perprice * selectedval);
                            $("#roomtype").find(final).find('.perprice').text(this.value + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * selectedval).format('0,0') + '₮');
                        <?php elseif(App::isLocale('en')): ?>
                            $("#roomtype").find(final).find('.price').text(plus * perprice * selectedval / rating);
                            $("#roomtype").find(final).find('.perprice').text(selectedval + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * selectedval / rating).format('0,0.00') + '$');
                        <?php endif; ?>
                    }
                    else {
                        $("#order").removeClass("disabled");
                        orderData.push({ id: index, room_number: selectedval, room_id: value.id,person_number: 2 });
                        $('#roomtype').prepend(string);
                    }
                    }
                    else {
                    defaultID = final;
                    counter++;
                    if ($(final).length > 0) {
                        changeDesc(index, selectedval);
                        $("#order").removeClass("disabled");
                        <?php if(App::isLocale('mn')): ?> 
                        $("#roomtype").find(final).find('.price').text(plus * perprice * selectedval);
                        $("#roomtype").find(final).find('.perprice').text(selectedval + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * selectedval).format('0,0') + '₮');
                        <?php elseif(App::isLocale('en')): ?>
                        $("#roomtype").find(final).find('.price').text(plus * perprice * selectedval / rating);
                        $("#roomtype").find(final).find('.perprice').text(selectedval + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * selectedval / rating).format('0,0.00') + '$');
                        <?php endif; ?>
                    } else {
                        if (counter < array.length) {
                            $("#order").removeClass("disabled");
                            orderData.push({ id: index, room_number: selectedval, room_id: value.id,person_number: 2 });
                            $('#roomtype').prepend(string);
                        }
                    }
                    }
                }else{
                    perprice  = $('#price_op' + index).data('price');
                    Totalsum = 0;
                    $('#nullRoom').hide();
                    <?php if(App::isLocale('mn')): ?> 
                    string = '<div class="item nightRoom' + index + '" id="#nightRoom' + index + '">\
                            <div class="right floated content " >\
                                <button class="small ui button" onclick="removeRow('+ index + ');" id="removeRoom">\
                                <?php echo e(__("messages.remove")); ?>\
                                </button>\
                            </div>\
                            <div class="content">\
                                <h2 class="ui sub header" >\
                                '+ value.name + '\
                                </h2>\
                                <span class="perprice">'+ selectedval2 + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * selectedval2).format('0,0') + '₮</span>\
                                <span class="price" style="display:none">'+ plus * perprice * selectedval2 + '</span>\
                            </div>\
                            </div>';
                    <?php elseif(App::isLocale('en')): ?>
                    string = '<div class="item nightRoom' + index + '" id="#nightRoom' + index + '">\
                            <div class="right floated content " >\
                                <button class="small ui button" onclick="removeRow('+ index + ');" id="removeRoom">\
                                <?php echo e(__("messages.remove")); ?>\
                                </button>\
                            </div>\
                            <div class="content">\
                                <h2 class="ui sub header" >\
                                '+ value.name + '\
                                </h2>\
                                <span class="perprice">'+ selectedval2 + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * selectedval2 / rating).format('0,0.00') + '$</span>\
                                <span class="price" style="display:none">'+ parseFloat(plus * perprice * selectedval2 / rating).toFixed(2) + '</span>\
                            </div>\
                            </div>';
                    <?php endif; ?>
                    var className = '.nightRoom';
                    var final = className.concat(index);
                    if (final == defaultID) {
                        defaultclass = 'nightRoom';
                        var concatted = defaultclass.concat(index);
                        defaultID = final;
                        var val = $("div").hasClass(concatted);
                    if (val == true) {
                        changeDesc(index, selectedval2);
                        $("#order").removeClass("disabled");
                        <?php if(App::isLocale('mn')): ?> 
                            $("#roomtype").find(final).find('.price').text(plus * perprice * selectedval2);
                            $("#roomtype").find(final).find('.perprice').text(this.value + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * selectedval2).format('0,0') + '₮');
                        <?php elseif(App::isLocale('en')): ?>
                            $("#roomtype").find(final).find('.price').text(plus * perprice * selectedval2 / rating);
                            $("#roomtype").find(final).find('.perprice').text(selectedval2 + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * selectedval2 / rating).format('0,0.00') + '$');
                        <?php endif; ?>
                    }
                    else {
                        $("#order").removeClass("disabled");
                        orderData.push({ id: index, room_number: selectedval2, room_id: value.id,person_number: 1 });
                        $('#roomtype').prepend(string);
                    }
                    }
                    else {
                    defaultID = final;
                    counter++;
                    if ($(final).length > 0) {
                        changeDesc(index, selectedval2);
                        $("#order").removeClass("disabled");
                        <?php if(App::isLocale('mn')): ?> 
                        $("#roomtype").find(final).find('.price').text(plus * perprice * selectedval2);
                        $("#roomtype").find(final).find('.perprice').text(selectedval + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * selectedval2).format('0,0') + '₮');
                        <?php elseif(App::isLocale('en')): ?>
                        $("#roomtype").find(final).find('.price').text(plus * perprice * selectedval2 / rating);
                        $("#roomtype").find(final).find('.perprice').text(selectedval2 + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * selectedval2 / rating).format('0,0.00') + '$');
                        <?php endif; ?>
                    } else {
                        if (counter < array.length) {
                            $("#order").removeClass("disabled");
                            orderData.push({ id: index, room_number: selectedval2, room_id: value.id, person_number:1 });
                            $('#roomtype').prepend(string);
                        }
                    }
                    }
                }
                $('.price').each(function () {
                Totalsum += parseFloat($(this).text());
                });
                Totalsum += pickup_price;
                // nuat = parseFloat(Totalsum * 0.1).toFixed(2);
                var finalprice = parseFloat(Totalsum);
                <?php if(App::isLocale('mn')): ?> 
                // $('#nuat').html(numeral(nuat).format('0,0') + ' ₮');
                $('#totalPrice').html(numeral(finalprice).format('0,0') + ' ₮');
                <?php elseif(App::isLocale('en')): ?>
                // $('#nuat').html(parseFloat(nuat /'<?php echo e($rate); ?>').toFixed(2) + ' $');
                $('#totalPrice').html(parseFloat(finalprice).toFixed(2) + ' $');
                <?php endif; ?>
            }
        })
    
        $.each($('#pickups').find('.pickup'), function(index,value){
            if($(this).is(":checked")){
                pickup.value = $(this).data('id');
                <?php if(App::isLocale('mn')): ?>
                    pickup.price =  $(this).data('price');
                <?php else: ?>
                    pickup.price = $(this).data('price')/'<?php echo e($rate); ?>';
                <?php endif; ?>
                pickup_price += pickup.price;
                Totalsum += pickup_price;
                // var nuat = parseFloat(Totalsum * 0.1).toFixed(2);
                var finalprice = parseFloat(Totalsum);
                <?php if(App::isLocale('mn')): ?> 
                    // $('#nuat').html(numeral(nuat).format('0,0') + ' ₮');
                    $('#totalPrice').html(numeral(finalprice).format('0,0') + ' ₮');
                <?php elseif(App::isLocale('en')): ?>
                    // $('#nuat').html( parseFloat(nuat).toFixed(2) + ' $');
                    $('#totalPrice').html(parseFloat(finalprice).toFixed(2) + ' $');
                <?php endif; ?>
            }
        })
    })

    $.each(pickups, function (index, value) {
        $('#carrent'+value.id).change(function () {
            pickup.value = $(this).data('id');
            <?php if(App::isLocale('mn')): ?>
                pickup.price =  $(this).data('price');
            <?php else: ?>
                pickup.price = $(this).data('price')/'<?php echo e($rate); ?>';
            <?php endif; ?>
            if ($(this).is(":checked")) {
                $.each($('#pickups').find('.pickup'),function(index,data){
                    if($(data).data('id') != pickup.value){
                        if ($('#carrent'+$(data).data('id')).is(":checked")) {
                            $('#carrent'+$(data).data('id')).attr('checked', false);
                            Totalsum -= pickup_price;
                            <?php if(App::isLocale('mn')): ?>
                                pickup_price -= $(data).data('price');
                            <?php else: ?>
                                pickup.price -= $(data).data('price')/'<?php echo e($rate); ?>';
                            <?php endif; ?>
                        }
                    }
                })
                pickup_price += pickup.price;
                Totalsum += pickup_price;
            } else {
                Totalsum -= pickup_price;
                pickup_price -= pickup.price;
                pickup = {};
            }
            // var nuat = parseFloat(Totalsum * 0.1).toFixed(2);
            var finalprice = parseFloat(Totalsum);
            <?php if(App::isLocale('mn')): ?> 
                // $('#nuat').html(numeral(nuat).format('0,0') + ' ₮');
                $('#totalPrice').html(numeral(finalprice).format('0,0') + ' ₮');
            <?php elseif(App::isLocale('en')): ?>
                // $('#nuat').html( parseFloat(nuat).toFixed(2) + ' $');
                $('#totalPrice').html( parseFloat(finalprice).toFixed(2) + ' $');
            <?php endif; ?>
        });
    });

    function removeRow(index) {
        Totalsum = 0;
        var string = '.nightRoom';
        string = string.concat(index);
        $('#roomtype').find(string).remove();
        var val = $("#roomtype .perprice").length;
        if (val == 0) {
            $('#nullRoom').show();
            $("#order").addClass("disabled");
        }
        $('.price').each(function () {
            Totalsum += parseFloat($(this).text());
        });
        for (var i = 0; i < orderData.length; i++) {
            if (orderData[i].id == index) {
                orderData.splice(i, 1);
            }
        }
        Totalsum += pickup_price;
        // nuat = parseFloat(Totalsum * 0.1).toFixed(2);
        var finalprice = parseFloat(Totalsum);
        <?php if(App::isLocale('mn')): ?> 
            // $('#nuat').html(numeral(nuat).format('0,0') + ' ₮');
            $('#totalPrice').html(numeral(finalprice).format('0,0') + ' ₮');
        <?php elseif(App::isLocale('en')): ?>
            // $('#nuat').html(parseFloat(nuat).toFixed(2) + ' $');
            $('#totalPrice').html(parseFloat(finalprice).toFixed(2) + ' $');
        <?php endif; ?>
        checkReset = false;
        checkReset2 = false;
        $('#night' + index).dropdown('set selected', 'selected');
        $('#night_op' + index).dropdown('set selected', 'selected');
        checkReset = true;
        checkReset2 = true;
    }

    function changeDesc(value, desc) {
        for (var i in orderData) {
            if (orderData[i].id == value) {
                orderData[i].room_number = desc;
                break;
            }
        }
    }

    // =============================================================================
    // - When choose the room information, show information of room in order section
    // =============================================================================

    $.each(array, function (index, value) {
        var sum = 0;
        var string = '';
        var defaultID = '.nightRoom0';
        var counter = 0;
        var defaultclass = '';
        var totalprice = 0;
        var nuat = 0;
        var rating = "<?php echo e($rate); ?>";
        $("#order").addClass("disabled");
        var perprice;
        $('#night_op' + index).on('change',function(){
            checkReset = false;
            if(checkReset2 == true){
                $('#night'+index).dropdown('set selected','selected');
                perprice = $('#price_op' + index).data('price');
                if (this.value == 'selected') {
                    removeRow(index);
                }
                else {
                    Totalsum = 0;
                    $('#nullRoom').hide();
                    <?php if(App::isLocale('mn')): ?> 
                        string = '<div class="item nightRoom' + index + '" id="#nightRoom' + index + '">\
                                <div class="right floated content " >\
                                    <button class="small ui button" onclick="removeRow('+ index + ');" id="removeRoom">\
                                    <?php echo e(__("messages.remove")); ?>\
                                    </button>\
                                </div>\
                                <div class="content">\
                                    <h2 class="ui sub header" >\
                                    '+ value.name + '\
                                    </h2>\
                                    <span class="perprice">'+ this.value + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * this.value).format('0,0') + '₮</span>\
                                    <span class="price" style="display:none">'+ plus * perprice * this.value + '</span>\
                                </div>\
                                </div>';
                    <?php elseif(App::isLocale('en')): ?>
                        string = '<div class="item nightRoom' + index + '" id="#nightRoom' + index + '">\
                                <div class="right floated content " >\
                                    <button class="small ui button" onclick="removeRow('+ index + ');" id="removeRoom">\
                                    <?php echo e(__("messages.remove")); ?>\
                                    </button>\
                                </div>\
                                <div class="content">\
                                    <h2 class="ui sub header" >\
                                    '+ value.name + '\
                                    </h2>\
                                    <span class="perprice">'+ this.value + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * this.value / rating).format('0,0.00') + '$</span>\
                                    <span class="price" style="display:none">'+ parseFloat(plus * perprice * this.value / rating).toFixed(2) + '</span>\
                                </div>\
                                </div>';
                    <?php endif; ?>
                    var className = '.nightRoom';
                    var final = className.concat(index);
                    if (final == defaultID) {
                        defaultclass = 'nightRoom';
                        var concatted = defaultclass.concat(index);
                        defaultID = final;
                        var val = $("div").hasClass(concatted);
                        if (val == true) {
                            changeDesc(index, this.value);
                            $("#order").removeClass("disabled");
                            <?php if(App::isLocale('mn')): ?> 
                                $("#roomtype").find(final).find('.price').text(plus * perprice * this.value);
                                $("#roomtype").find(final).find('.perprice').text(this.value + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * this.value).format('0,0') + '₮');
                            <?php elseif(App::isLocale('en')): ?>
                                $("#roomtype").find(final).find('.price').text(plus * perprice * this.value / rating);
                                $("#roomtype").find(final).find('.perprice').text(this.value + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * this.value / rating).format('0,0.00') + '$');
                            <?php endif; ?>
                            }
                            else {
                                $("#order").removeClass("disabled");
                                orderData.push({ id: index, room_number: this.value, room_id: value.id, person_number : 1 });
                                $('#roomtype').prepend(string);
                            }
                        }
                        else {
                            defaultID = final;
                            counter++;
                            if ($(final).length > 0) {
                                changeDesc(index, this.value);
                                $("#order").removeClass("disabled");
                                <?php if(App::isLocale('mn')): ?> 
                                    $("#roomtype").find(final).find('.price').text(plus * perprice * this.value);
                                    $("#roomtype").find(final).find('.perprice').text(this.value + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * this.value).format('0,0') + '₮');
                                <?php elseif(App::isLocale('en')): ?>
                                    $("#roomtype").find(final).find('.price').text(plus * perprice * this.value / rating);
                                    $("#roomtype").find(final).find('.perprice').text(this.value + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * this.value / rating).format('0,0.00') + '$');
                                <?php endif; ?>
                            } else {
                                if (counter < array.length) {
                                    $("#order").removeClass("disabled");
                                    orderData.push({ id: index, room_number: this.value, room_id: value.id, person_number : 1 });
                                    $('#roomtype').prepend(string);
                                }
                            }
                        }
                        $('.price').each(function () {
                            Totalsum += parseFloat($(this).text());
                        });
                        Totalsum += pickup_price;
                        // nuat = parseFloat(Totalsum * 0.1).toFixed(2);
                        var finalprice = parseFloat(Totalsum);
                        <?php if(App::isLocale('mn')): ?> 
                            // $('#nuat').html(numeral(nuat).format('0,0') + ' ₮');
                            $('#totalPrice').html(numeral(finalprice).format('0,0') + ' ₮');
                        <?php elseif(App::isLocale('en')): ?>
                            // $('#nuat').html(parseFloat(nuat).toFixed(2) + ' $');
                            $('#totalPrice').html(parseFloat(finalprice).toFixed(2) + ' $');
                        <?php endif; ?>
                }
            }
            checkReset = true;
        })

        $('#night' + index).on('change', function () {
            checkReset2 = false;
            if(checkReset == true){
                $('#night_op'+index).dropdown('set selected','selected');
                perprice = $('#price' + index).data('price');
                if (this.value == 'selected') {
                    removeRow(index);
                }
                else {
                    Totalsum = 0;
                    $('#nullRoom').hide();
                    <?php if(App::isLocale('mn')): ?> 
                        string = '<div class="item nightRoom' + index + '" id="#nightRoom' + index + '">\
                                <div class="right floated content " >\
                                    <button class="small ui button" onclick="removeRow('+ index + ');" id="removeRoom">\
                                    <?php echo e(__("messages.remove")); ?>\
                                    </button>\
                                </div>\
                                <div class="content">\
                                    <h2 class="ui sub header" >\
                                    '+ value.name + '\
                                    </h2>\
                                    <span class="perprice">'+ this.value + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * this.value).format('0,0') + '₮</span>\
                                    <span class="price" style="display:none">'+ plus * perprice * this.value + '</span>\
                                </div>\
                                </div>';
                    <?php elseif(App::isLocale('en')): ?>
                        string = '<div class="item nightRoom' + index + '" id="#nightRoom' + index + '">\
                                <div class="right floated content " >\
                                    <button class="small ui button" onclick="removeRow('+ index + ');" id="removeRoom">\
                                    <?php echo e(__("messages.remove")); ?>\
                                    </button>\
                                </div>\
                                <div class="content">\
                                    <h2 class="ui sub header" >\
                                    '+ value.name + '\
                                    </h2>\
                                    <span class="perprice">'+ this.value + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * this.value / rating).format('0,0.00') + '$</span>\
                                    <span class="price" style="display:none">'+ parseFloat(plus * perprice * this.value / rating).toFixed(2) + '</span>\
                                </div>\
                                </div>';
                    <?php endif; ?>
                    var className = '.nightRoom';
                    var final = className.concat(index);
                    if (final == defaultID) {
                        defaultclass = 'nightRoom';
                        var concatted = defaultclass.concat(index);
                        defaultID = final;
                        var val = $("div").hasClass(concatted);
                        if (val == true) {
                            changeDesc(index, this.value);
                            $("#order").removeClass("disabled");
                            <?php if(App::isLocale('mn')): ?> 
                                $("#roomtype").find(final).find('.price').text(plus * perprice * this.value);
                                $("#roomtype").find(final).find('.perprice').text(this.value + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * this.value).format('0,0') + '₮');
                            <?php elseif(App::isLocale('en')): ?>
                                $("#roomtype").find(final).find('.price').text(plus * perprice * this.value / rating);
                                $("#roomtype").find(final).find('.perprice').text(this.value + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * this.value / rating).format('0,0.00') + '$');
                            <?php endif; ?>
                            }
                            else {
                                $("#order").removeClass("disabled");
                                orderData.push({ id: index, room_number: this.value, room_id: value.id, person_number : 2 });
                                $('#roomtype').prepend(string);
                            }
                        }
                        else {
                            defaultID = final;
                            counter++;
                            if ($(final).length > 0) {
                                changeDesc(index, this.value);
                                $("#order").removeClass("disabled");
                                <?php if(App::isLocale('mn')): ?> 
                                    $("#roomtype").find(final).find('.price').text(plus * perprice * this.value);
                                    $("#roomtype").find(final).find('.perprice').text(this.value + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * this.value).format('0,0') + '₮');
                                <?php elseif(App::isLocale('en')): ?>
                                    $("#roomtype").find(final).find('.price').text(plus * perprice * this.value / rating);
                                    $("#roomtype").find(final).find('.perprice').text(this.value + ' <?php echo e(__("messages.room")); ?> - ' + numeral(perprice * this.value / rating).format('0,0.00') + '$');
                                <?php endif; ?>
                            } else {
                                if (counter < array.length) {
                                    $("#order").removeClass("disabled");
                                    orderData.push({ id: index, room_number: this.value, room_id: value.id, person_number : 2 });
                                    $('#roomtype').prepend(string);
                                }
                            }
                        }
                        $('.price').each(function () {
                            Totalsum += parseFloat($(this).text());
                        });
                        Totalsum += pickup_price;
                        // nuat = parseFloat(Totalsum * 0.1).toFixed(2);
                        var finalprice = parseFloat(Totalsum);
                        <?php if(App::isLocale('mn')): ?> 
                            // $('#nuat').html(numeral(nuat).format('0,0') + ' ₮');
                            $('#totalPrice').html(numeral(finalprice).format('0,0') + ' ₮');
                        <?php elseif(App::isLocale('en')): ?>
                            // $('#nuat').html(parseFloat(nuat).toFixed(2) + ' $');
                            $('#totalPrice').html(parseFloat(finalprice).toFixed(2) + ' $');
                        <?php endif; ?>
                }
            }
            checkReset2 = true;
        })
    })

    // =============================================================================
    //  - Get data of search 
    // =============================================================================

    var roomNumber;
    var people;
    var startDate;
    var endDate;
    var searchPlace;

    searchPlace = '<?php echo e($place); ?>';
    if (searchPlace == 'undefined' || !searchPlace) {
        $('.datalocation input').val('Ulaanbaatar, Mongolia');
    }
    else {
        $('.datalocation input').val(searchPlace);
    }

    endDate = moment('<?php echo e($enddate); ?>').format('L');
    startDate = moment('<?php echo e($startdate); ?>').format('L');
    var plus = moment.duration(moment(endDate).diff(moment(startDate))).days();;
    $('#difference').html(plus);

    if ('<?php echo e($peoplenumber); ?>' >= 15) {
        people = $('#selectedPeople').val();
    } else {
        people = $('.selectedPeople option:selected').val();
    }

    if ('<?php echo e($roomnumber); ?>' >= 15) {
        roomNumber = $('#selectedRoom').val();
    } else {
        roomNumber = $('.selectedRoom option:selected').val();
    }

    var plus0 = $('#plus0');
    var minus0 = $('#minus0');
    var selectedRoom = $('#selectedRoom');
    plus0.click(function (e) {
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
    minus0.click(function (e) {
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
    plus1.click(function (e) {
        var value = parseFloat(selectedPeople.val());
		if(!value){
			value = 0;
        }
		value = value + 1;
		selectedPeople.val(value);
		people = value;
		e.preventDefault();
    });
    minus1.click(function (e) {
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

    $("#selectedRoom").keyup(function () {
        var value = $( this ).val();
		roomNumber = value;
		$('#selectedPeople').val(value);
		people = value;
    });

    $("#selectedPeople").keyup(function () {
        var value = $( this ).val();
		people = value;
    });

    $(".selectedPeople").change(function () {
        if($(this).val() === "more"){
			$('.selectedPeople').css("display","none");
			$('.room').css("display","");
            $('#selectedRoom').val(15);
			people = 15;
		}else{
			$('.selectedPeople').css("display","");
			$('.room').css("display","none");
			people = $(this).val();
		}
    });

    $(".selectedRoom").change(function () {
        $('.selectedPeople').dropdown('set selected', $(this).val());
		if($(this).val() === "more"){
			$('.selectedRoom').css("display","none");
			$('.people').css("display","");
            $('#selectedRoom').val(15);
            $('#selectedPeople').val(15);
			roomNumber = 15;
		}else{
			roomNumber = $(this).val();
			
		}
    });
    $('#reservation').daterangepicker({
        "autoApply": true,
        minDate: '<?php echo date("m/d/Y") ?>',
        endDate: endDate,
        dateLimitMin: {
            days: 1
        },
        startDate: startDate,
        "showCustomRangeLabel": true,
        "alwaysShowCalendars": true,
        "opens": "center"
    }, function (start, end, label) {
        startDate = start.format('L');
        endDate = end.format('L');
    });
    roomNumber = '<?php echo e($roomnumber); ?>';

    var perNum = '<?php echo e($peoplenumber); ?>';
    $('#selectedPeople option').each(function () {
        if ($(this).val() == perNum) {
            $(this).prop("selected", true);
            people = perNum
        }
    });

    // =============================================================================
    //  - Pass data of result to search function in SearchController
    // =============================================================================

    $("#searchButton").click(function () {
        $('#searchButton').addClass('loading');
        if (!people) {
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
            .error(function (jqXHR, textStatus, errorThrown) {
                if (textStatus == 'error') {
                    alert(errorThrown);
                }
            });
    });

    // =============================================================================
    //  - Pass data of order to save order function in OrderController
    // =============================================================================

    $("#order").click(function () {
        $('#order').addClass('loading disabled');
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("order")); ?>',
            data: { 'order_pickup': pickup.value, 'order_startdate': moment(startDate).format('YYYY-MM-DD'), 'order_enddate': moment(endDate).format('YYYY-MM-DD'), 'order_hotelid': '<?php echo e($hotel->id); ?>', 'order_roomdata': orderData, '_token': '<?php echo e(csrf_token()); ?>' },
        }).done(function (data) {
            if (data.success == true) {
                window.location = "<?php echo e(url('order/card')); ?>";
            }
        });
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>