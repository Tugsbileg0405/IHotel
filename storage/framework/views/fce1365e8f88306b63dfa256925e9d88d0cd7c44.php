<?php $__env->startSection('title', 'Буудал'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
<form class="ui form green segment" action="<?php echo e(url('profile/hotel', $hotel->id)); ?>" method="POST">
	<?php echo e(csrf_field()); ?>

	<?php echo e(method_field('PUT')); ?>

	<h4 class="ui header">Үндсэн мэдээлэл</h4>
	<div class="ui divider"></div>
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
				<?php $__currentLoopData = $hotelCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($category->id); ?>" <?php echo e($hotel->category_id == $category->id ? 'selected':''); ?>><?php echo e($category->name); ?></option>
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
						<?php for($i=1; $i <= 5; $i++): ?>
							<option value="<?php echo e($i); ?>" <?php echo e($hotel->star == $i ? 'selected':''); ?>><?php echo e($i); ?> од</option>
						<?php endfor; ?>
					</select>
				</div>
			</div>
			<div class="eight wide required field">
				<label>Өрөөний тоо</label>
				<input type="number" name="room_number" value="<?php echo e($hotel->room_number); ?>">
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
				<input type="number" name="phone_number" value="<?php echo e($hotel->phone_number); ?>">
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
		<button class="ui primary button" type="submit">Хадгалах</button>
	</div><br><br><br>
</form>
<form class="ui form green segment" action="<?php echo e(url('profile/hotel/hotelservice', $hotel->id)); ?>" method="POST">
	<?php echo e(csrf_field()); ?>

	<?php echo e(method_field('PUT')); ?>

	<h4 class="ui header">Буудлын мэдээлэл</h4>
	<div class="ui divider"></div>
	<div class="field">
		<div class="fields">
			<div class="eight wide field">
				<div class="required field">
					<label>Хүүхэд авчирч болох эсэх</label>
					<div class="ui form">
						<br>
						<div class="inline fields">
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" name="is_child" value="1" class="hidden" <?php echo e($hotel->is_child ? 'checked':''); ?>>
									<label>Тийм</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" name="is_child" value="0" class="hidden" <?php echo e($hotel->is_child ? '':'checked'); ?>>
									<label>Үгүй</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="eight wide field">
				<div class="required field">
					<label>Интернет байгаа эсэх</label>
					<div class="ui form">
						<br>
						<div class="inline fields">
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" name="is_internet" value="0" class="hidden" <?php echo e($hotel->is_internet == 0 ? 'checked':''); ?>>
									<label>Үгүй</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" name="is_internet" value="1" class="hidden" <?php echo e($hotel->is_internet == 1 ? 'checked':''); ?>>
									<label>Тийм, үнэгүй</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" name="is_internet" value="2" class="hidden" <?php echo e($hotel->is_internet == 2 ? 'checked':''); ?>>
									<label>Тийм, үнэтэй</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $__currentLoopData = $hotelServiceCategories->chunk(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorySet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="field">
			<div class="fields">
				<?php $__currentLoopData = $categorySet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="eight wide required field">
						<label><?php echo e($category->name); ?></label>
						<div class="ui form">
							<div class="field">
								<select multiple="" name="services[]" class="ui dropdown">
									<option value="">Сонгох</option>
									<?php $__currentLoopData = $category->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($service->id); ?>" <?php echo e($hotel->services->contains($service->id) ? 'selected':''); ?>><?php echo e($service->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<div class="sixteen wide field">
		<div class="required field">
			<label>Танилцуулга</label>
			<textarea name="introduction"><?php echo e($hotel->introduction); ?></textarea>
		</div>
	</div>
	<div class="sixteen wide field">
		<div class="field">
			<label>Бусад нэмэлт мэдээллүүд</label>
			<textarea name="other_service"><?php echo e($hotel->other_service); ?></textarea>
		</div>
	</div>
	<div class="ui right floated buttons">
		<button class="ui primary button" type="submit">Хадгалах</button>
	</div><br><br><br>
</form>
<div class="ui green segment">
	<h4 class="ui header">Буудлын зураг</h4>
	<div class="ui divider"></div>
	<form class="ui form">
		<?php echo e(csrf_field()); ?>

		<div class="required field">
			<label>Үндсэн зураг</label>
			<div class="ui segment">
		  		<a class="upload-browse">
		  			<i class="plus icon"></i>
		  		</a>
		  		<div class="upload-zone" id="cover-photo">
			  		<?php if($hotel->cover_photo): ?>
			  			<div class="upload-zone-item">
		  					<img class="ui rounded image" src="<?php echo e(asset($hotel->cover_photo)); ?>" path="<?php echo e($hotel->cover_photo); ?>">
		  					<a class="upload-zone-button">
		  						<i class="close icon"></i>
		  					</a>
		  				</div>
	  				<?php endif; ?>
		  		</div>
		  		<input type="file" name="photo" id="cover" style="display: none">
			</div>
		</div>
	</form><br>
	<form class="ui form">
		<?php echo e(csrf_field()); ?>

		<div class="required field">
			<label>Бусад зураг</label>
			<div class="ui segment">
		  		<a class="upload-browse">
		  			<i class="plus icon"></i>
		  		</a>
		  		<div class="upload-zone" id="other-photos">
			  		<?php if($hotel->other_photos): ?>
			  			<?php $__currentLoopData = unserialize($hotel->other_photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  			<div class="upload-zone-item">
				  				<img class="ui rounded image" src="<?php echo e(asset($photo)); ?>" path="<?php echo e($photo); ?>">
			  					<a class="upload-zone-button">
			  						<i class="close icon"></i>
			  					</a>
			  				</div>
			  			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  		<?php endif; ?>
		  		</div>
				<input type="file" name="photos" id="photos" style="display: none">
			</div>
		</div>
	</form><br>
</div>
<div class="ui green segment">
	<form class="ui form" action="<?php echo e(url('hotel/room', $hotel->id)); ?>" method="POST">
		<?php echo e(csrf_field()); ?>

		<h4 class="ui header">Өрөө нэмэх</h4>
		<div class="ui divider"></div>
		<div class="field">
			<div class="fields">
				<div class="eight wide field">
					<div class="required field">
						<label>Өрөөний төрөл</label>
						<input type="text" name="name">
					</div>
				</div>
				<div class="eight wide required field">
					<label>Өрөөний тоо</label>
					<input type="number" name="number">
				</div>
			</div>
		</div>
		<div class="field">
			<div class="fields">
				<div class="eight wide field">
					<div class="required field">
						<label>Орны төрөл</label>
						<select name="category" class="ui fluid dropdown">
							<option value="">Ороо сонгоно уу</option>
							<?php $__currentLoopData = $roomCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
				</div>
				<div class="eight wide required field">
					<label>Орны тоо</label>
					<input type="number" name="bed_number">
				</div>
			</div>
		</div>
		<div class="field">
			<div class="fields">
				<div class="eight wide field">
					<div class="required field">
						<label>Хүний тоо</label>
						<input type="number" name="people_number">
					</div>
				</div>
				<div class="eight wide required field">
					<label>Өрөөний үнэ</label>
					<input type="number" name="price" placeholder="₮">
				</div>
			</div>
		</div>
		<div class="ui right floated buttons">
			<button class="ui primary button" type="submit">Нэмэх</button>
		</div><br><br><br>
	</form>
	<?php if($hotel->room_number > $rooms): ?>
		<div class="ui yellow message">Та <?php echo e($hotel->room_number - $rooms); ?> өрөө бүртгээгүй байна</div>
	<?php elseif($hotel->room_number < $rooms): ?>
		<div class="ui yellow message">Та <?php echo e($rooms - $hotel->room_number); ?> өрөө илүү бүртгэсэн байна</div>
	<?php endif; ?>
	<?php if($hotel->rooms->count() > 0): ?>
		<h4 class="ui header">Өрөөний мэдээлэл</h4>
		<div class="ui divider"></div>
		<table class="ui table">
			<thead>
				<tr>
					<th>Өрөөний төрөл</th>
					<th>Өрөөний тоо</th>
					<th>Устгах</th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $hotel->rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($room->name); ?></td>
						<td><?php echo e($room->number); ?></td>
						<td>
							<a class="ui icon button" href="<?php echo e(url('hotel/room', $room->id)); ?>" 
								onclick="event.preventDefault();
         						document.getElementById('room-<?php echo e($room->id); ?>').submit();">
								<i class="trash icon"></i>
							</a>
							<a class="ui icon button" href="<?php echo e(url('profile/hotel/room/edit', $room->id)); ?>">
								<i class="settings icon"></i>
							</a>
							<form id="room-<?php echo e($room->id); ?>" action="<?php echo e(url('hotel/room', $room->id)); ?>" method="POST">
								<?php echo e(csrf_field()); ?>

								<?php echo e(method_field('DELETE')); ?>

							</form>
						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	<?php endif; ?>
</div>
<form class="ui form green segment" action="<?php echo e(url('profile/hotel/payment', $hotel->id)); ?>" method="POST">
	<?php echo e(csrf_field()); ?>

	<?php echo e(method_field('PUT')); ?>

	<h4 class="ui header">Төлбөрийн нөхцөл</h4>
	<div class="ui divider"></div>
	<label>Үйлчлүүлэгчид кредит картаар тооцоо хийх боломжтой юу?</label><br><br>
	<div class="ui stackable grid">
		<div class="six column row">
			<div class="column">
				<div class="ui checkbox">
					<input type="checkbox" value="1" name="payments[]" class="hidden" 
					>
					<label>
						<img class="ui  image" src="<?php echo e(asset('img/card1.svg')); ?>">
					</label>
				</div>
			</div>
			<div class="column">
				<div class="ui checkbox">
					<input type="checkbox" value="2" name="payments[]" class="hidden"
					>
					<label>
						<img class="ui  image" src="<?php echo e(asset('img/card2.svg')); ?>">
					</label>
				</div>
			</div>
			<div class="column">
				<div class="ui checkbox">
					<input type="checkbox" value="3" name="payments[]" class="hidden"
					>
					<label>
						<img class="ui  image" src="<?php echo e(asset('img/card3.svg')); ?>">
					</label>
				</div>
			</div>
			<div class="column">
				<div class="ui checkbox">
					<input type="checkbox" value="4" name="payments[]" class="hidden"
					>
					<label>
						<img class="ui  image" src="<?php echo e(asset('img/card4.svg')); ?>">
					</label>
				</div>
			</div>
			<div class="column">
				<div class="ui checkbox">
					<input type="checkbox" value="5" name="payments[]" class="hidden"
					>
					<label>
						<img class="ui  image" src="<?php echo e(asset('img/card5.svg')); ?>">
					</label>
				</div>
			</div>
			<div class="column">
				<div class="ui checkbox">
					<input type="checkbox" value="6" name="payments[]" class="hidden"
					>
					<label>
						<img class="ui  image" src="<?php echo e(asset('img/card6.svg')); ?>">
					</label>
				</div>
			</div>
		</div>
	</div>
	<div class="field">
		<div class="sixteen wide required field"><br>
			<h4 class="ui header">Урьдчилгаа төлбөр ба захиалга цуцлах нөхцөл</h4>
			<div class="ui divider"></div>
			<div class="field">
				<div class="fields">
					<div class="eight wide field">
						<label>Ирэх өдрийн 18:00 цагаас өмнө</label>
						<div class="ui form">
							<div class="field">
								<select class="ui dropdown" name="co_day">
									<option value="">Сонгох</option>
									<option value="1" <?php echo e($hotel->co_day == 1 ? 'selected':''); ?>>1 өдрийн өмнө
									</option>
									<option value="2" <?php echo e($hotel->co_day == 2 ? 'selected':''); ?>>2 өдрийн өмнө
									</option>
									<option value="3" <?php echo e($hotel->co_day == 3 ? 'selected':''); ?>>3 өдрийн өмнө
									</option>
									<option value="7" <?php echo e($hotel->co_day == 7 ? 'selected':''); ?>>7 өдрийн өмнө
									</option>
									<option value="14" <?php echo e($hotel->co_day == 14 ? 'selected':''); ?>>14 өдрийн өмнө
									</option>
								</select>
							</div>
						</div>
					</div>
					<div class="eight wide field">
						<label>Цуцлаагүй бол</label>
						<div class="ui form">
							<div class="field">
								<select class="ui dropdown" name="co_payment">
									<option value="">Сонгох</option>
									<option value="Эхний шөнийн төлбөр" <?php echo e($hotel->co_payment == 'Эхний шөнийн төлбөр' ? 'selected':''); ?>>Эхний шөнийн төлбөр</option>
									<option value="Бүтэн төлбөр" <?php echo e($hotel->co_payment == 'Бүтэн төлбөр' ? 'selected':''); ?>>Бүтэн төлбөр</option>
								</select>
							</div>
						</div>
					</div>
					<div class="sixteen wide field">
						<div class="required field">
							<label>НӨАТ</label>
							<input type="text" value="10%" disabled>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="ui right floated buttons">
		<button class="ui primary button" type="submit">Хадгалах</button>
	</div><br><br><br>
	</form><br>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$('.upload-browse').click(function() {
		$(this).siblings('input[type=file]').click();
	});
	$('#cover').change(function(){
		var segment = $(this).closest('.segment');
		var container = $(this).siblings('.upload-zone');
		segment.addClass('loading disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo e(url("hotel/photo", $hotel->id)); ?>',	
           	data: new FormData($(this).closest('form')[0]),
			contentType: false,
			processData: false,
  			context: this,
		}).done(function(data) {
       		$(container).empty();
			$(this).closest('form')[0].reset();
			$(segment).removeClass('loading disabled');
			$('<div class="upload-zone-item"><img class="ui rounded image" src="http://localhost/ihotel-revised/public/' + data.photo + '" path="' + data.photo + '"><a class="upload-zone-button"><i class="close icon"></i></a></div>').appendTo(container).transition('scale in');
   		}).fail(function() {
            $(segment).removeClass('loading disabled');
            $(this).val('');
            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);

        });
	});
	$("#photos").change(function(){
		var segment = $(this).closest('.segment');
		var container = $(this).siblings('.upload-zone');
		segment.addClass('loading disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo e(url("hotel/photos", $hotel->id)); ?>',	
           	data: new FormData($(this).closest('form')[0]),
			contentType: false,
			processData: false,
  			context: this,
		}).done(function(data) {
				$(this).closest('form')[0].reset();
				$(segment).removeClass('loading disabled');
				$('<div class="upload-zone-item"><img class="ui rounded image" src="http://localhost/ihotel-revised/public/' + data.photo + '" path="' + data.photo + '"><a class="upload-zone-button"><i class="close icon"></i></a></div>').appendTo(container).transition('scale in');
		}).fail(function() {
            $(segment).removeClass('loading disabled');
            $(this).val('');
            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);

        });
	});
	$(document).on('click', '#cover-photo .upload-zone-button', function() {
		var segment = $(this).closest('.segment');
		var container = $(this).closest('.upload-zone');
		var path = $(this).siblings('.image').attr('path');
		segment.addClass('loading disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo e(url("hotel/photo/destroy", $hotel->id)); ?>',
           	data: {'path': path, '_token': '<?php echo e(csrf_token()); ?>'},
  			context: this,
		}).done(function() {
				$(segment).removeClass('loading disabled');
           		$(this).closest('.upload-zone-item').remove();
		}).fail(function() {
            $(segment).removeClass('loading disabled');
            $(this).val('');
            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);

        });
	});
	$(document).on('click', '#other-photos .upload-zone-button', function() {
		var segment = $(this).closest('.segment');
		var container = $(this).closest('.upload-zone');
		var path = $(this).siblings('.image').attr('path');
		segment.addClass('loading disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo e(url("hotel/photos/destroy", $hotel->id)); ?>',
           	data: {'path': path, '_token': '<?php echo e(csrf_token()); ?>'},
  			context: this,
		}).done(function() {
				$(segment).removeClass('loading disabled');
           		$(this).closest('.upload-zone-item').remove();
		}).fail(function() {
            $(segment).removeClass('loading disabled');
            $(this).val('');
            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);

        });
	});
</script>
<script async defer 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjW4iZ6gWxhzJOE3Vi4wvHZcTH0vgdDqk&sensor=false&libraries=places&callback=initMap">
</script>
<script type="text/javascript">
	function initMap() {
	    var map = new google.maps.Map(document.getElementById('map'), {
	        zoom: 13,
	        center: { lat: parseFloat('<?php echo e(json_decode($hotel->location)[0]); ?>'), lng: parseFloat('<?php echo e(json_decode($hotel->location)[1]); ?>') },
	    });

		marker = new google.maps.Marker({
	             position: { lat: parseFloat('<?php echo e(json_decode($hotel->location)[0]); ?>'), lng: parseFloat('<?php echo e(json_decode($hotel->location)[1]); ?>') },
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
	$('.ui.form').form({
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
	                    type   : 'minCount[1]',
	                    prompt : 'Төрөл сонгоно уу'
	                }
	            ]
	        },
	        star: {
	            identifier: 'star',
	            rules: [
	                {
	                    type   : 'minCount[1]',
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
	                    type   : 'maxLength[10]',
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
	        introduction: {
	            identifier: 'introduction',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Танилцуулга оруулна уу'
	                },
	                {
	                    type   : 'minLength[5]',
	                    prompt : 'Танилцуулга оруулна уу'
	                }
	            ]
	        },
	        name: {
	            identifier: 'name',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Өрөөний төрөл оруулна уу'
	                },
	                {
	                    type   : 'maxLength[191]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        number: {
	            identifier: 'number',
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
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        bed_number: {
	            identifier: 'bed_number',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Орны тоо оруулна уу'
	                },
	                {
		                type   : 'integer',
		                prompt : 'Орны тоо оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        people_number: {
	            identifier: 'people_number',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Хүний тоо оруулна уу'
	                },
	                {
		                type   : 'integer',
		                prompt : 'Хүний тоо оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        price: {
	            identifier: 'price',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Өрөөний үнэ оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        co_day: {
	            identifier: 'co_day',
	            rules: [
	                {
		                type   : 'minCount[1]',
		                prompt : 'Утга сонгоно уу'
	                }
	            ]
	        },
	        co_payment: {
	            identifier: 'co_payment',
	            rules: [
	                {
		                type   : 'minCount[1]',
		                prompt : 'Утга сонгоно уу'
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
	    	$('.ui.form button').addClass('loading disabled');
	    }
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>