<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('profile.hotel.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main-page">
	<div class="admin-header">
		<div class="admin-body">
			<div class="ui fluid stackable container">
				<div class="ui stackable column grid">
					<div class="sixteen wide column">
						<div id="context1">
							<?php echo $__env->make('profile.hotel.partials.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<div class="ui segment com-service">
								<div class="ui stackable grid search-form">
									<div class="eight wide column"><?php echo e(date('Y-m-d')); ?>

										<h4 class="ui header">Буудлын мэдээлэл</h4>
									</div>
								</div>
							</div>
							<div class="ui stackable grid">
								<div class="three wide column">
									<?php echo $__env->make('profile.hotel.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
								</div>
								<div class="thirteen wide column">
									<form class="ui form segment" id="update-hotel-form" action="<?php echo e(url('admin/hotel/update', $hotel->id)); ?>" method="POST">
										<?php echo e(csrf_field()); ?>

										<div class="sixteen wide field">
											<div class="required field">
												<label>Буудлын нэр</label>
												<input type="text" name="name" value="<?php echo e($hotel->name); ?>">
											</div>
										</div>
										<div class="sixteen wide field">
											<div class="field">
												<label>Зочид буудын төрөл</label>
												<select class="ui fluid dropdown" name="category">
												<option value="">Сонгох</option>
													<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($category->id); ?>"
															<?php echo e($hotel->category_id == $category->id ? 'selected' : ''); ?>>
															<?php echo e($category->name); ?>

														</option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
										</div>
										<div class="field">
											<div class="fields">
												<div class="eight wide field">
													<div class="required field">
														<label>Одны зэрэглэл</label>
														<select name="star" class="ui fluid dropdown">
															<option value="">Сонгох</option>
															<?php for($i=1; $i<=5; $i++): ?>
																<option value="<?php echo e($i); ?>"
																	<?php echo e($hotel->star == $i ? 'selected' : ''); ?>>
																	<?php echo e($i); ?> од
																</option>
															<?php endfor; ?>
														</select>
													</div>
												</div>
												<div class="eight wide required field">
													<label>Өрөөний тоо</label>
													<input type="number" name="room_number" min="1" value="<?php echo e($hotel->room_number); ?>">
												</div>
											</div>
										</div>
										<div class="sixteen wide field">
											<div class="required field">
												<label>Цахим хуудас</label>
												<div class="ui labeled input">
													<div class="ui label">http://</div>
													<input type="text" name="website" placeholder="mysite.com" value="<?php echo e($hotel->website); ?>">
												</div>
											</div>
										</div>
										<h6 class="ui horizontal header divider ihotel-title">
										Холбоо барих
										</h6>
										<div class="field">
											<div class="fields">
												<div class="eight wide field">
													<div class="required field">
														<label>Холбоо барих ажилтны нэр</label>
														<input type="text" name="contact" value="<?php echo e($hotel->contact); ?>">
													</div>
												</div>
												<div class="eight wide required field">
													<label>Утас</label>
													<input type="text" name="phone_number" value="<?php echo e($hotel->phone_number); ?>">
												</div>
											</div>
										</div>
										<div class="sixteen wide field">
											<div class="required field">
												<label>И-мэйл</label>
												<input type="text" name="email" value="<?php echo e($hotel->email); ?>">
											</div>
										</div>
										<div class="sixteen wide field">
											<div class="required field">
												<label>Хаяг</label>
												<textarea name="address"><?php echo e($hotel->address); ?></textarea>
											</div>
										</div>
										<div class="sixteen wide field">
											<div class="required field">
												<label>Байршил</label>
												<div id="map" style="height:500px"></div>
												<input type="hidden" value="<?php echo e(json_decode($hotel->location)[0]); ?>" name="lat" id="lat">
												<input type="hidden" value="<?php echo e(json_decode($hotel->location)[1]); ?>" name="lon" id="lon">
											</div>
										</div>
										<div class="ui right floated buttons">
											<button class="ui primary button" type="submit">
												Хадгалах<i class="right chevron icon"></i>
											</button>
										</div><br><br>
									</form>
								</div>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjW4iZ6gWxhzJOE3Vi4wvHZcTH0vgdDqk&sensor=false&libraries=places"></script>
<script type="text/javascript">
	$(document).ready(function() {
		function initMap() {
		    var map = new google.maps.Map(document.getElementById('map'), {
		        zoom: 13,
		        center: {
		        	lat: <?php echo e(json_decode($hotel->location)[0]); ?>, 
		        	lng: <?php echo e(json_decode($hotel->location)[1]); ?>

		        },
		    });
			marker = new google.maps.Marker({
				position: {
					lat: <?php echo e(json_decode($hotel->location)[0]); ?>, 
					lng: <?php echo e(json_decode($hotel->location)[1]); ?>

				},
				map: map        
			});
			google.maps.event.addListener(map, "click", function (e) {
				var lat = e.latLng.lat();
				var lon = e.latLng.lng();
				marker.setPosition(new google.maps.LatLng(lat, lon));
				$('#lat').val(lat);
				$('#lon').val(lon);
			});
		}
		initMap();
		$('#update-hotel-form').form({
		    inline : true,
		    fields: {
		        name: {
		            identifier  : 'name',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Нэр оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        category: {
		            identifier: 'category',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Төрөл сонгоно уу'
		                }
		            ]
		        },
		        star: {
		            identifier: 'star',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Одны зэрэглэл сонгоно уу'
		                }
		            ]
		        },
		        room_number: {
		            identifier: 'room_number',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Өрөөний тоо оруулна уу'
		                },
		                {
		                    type   : 'integer',
		                    prompt : 'Өрөөний тоо оруулна уу'
		                },
		                {
		                    type   : 'maxLength[6]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        contact: {
		            identifier  : 'contact',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Холбоо барих ажилтны нэр оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        phone_number: {
		            identifier  : 'phone_number',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Утасны дугаар оруулна уу'
		                },
		                {
		                    type   : 'integer',
		                    prompt : 'Утасны дугаар оруулна уу'
		                },
		                {
		                    type   : 'minLength[3]',
		                    prompt : 'Утасны дугаар оруулна уу'
		                },
		                {
		                    type   : 'maxLength[10]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        website: {
		            identifier  : 'website',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Цахим хуудас оруулна уу'
		                },
		                {
		                    type   : 'url',
		                    prompt : 'Цахим хуудас оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        email: {
		            identifier  : 'email',
		            rules: [
		                {
		                    type   : 'email',
		                    prompt : 'И-мэйл хаяг оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        address: {
		            identifier  : 'address',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Хаяг оруулна уу'
		                },
		                {
		                    type   : 'minLength[6]',
		                    prompt : 'Хаяг оруулна уу'
		                }
		            ]
		        },
		        location: {
		            identifier  : 'location',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Хаяг оруулна уу'
		                },
		                {
		                    type   : 'minLength[6]',
		                    prompt : 'Хаяг оруулна уу'
		                }
		            ]
		        },
		    },
		    onSuccess: function() {
		    	$(this).find('button').addClass('loading disabled');
		    }
		});
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.hoteladmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>