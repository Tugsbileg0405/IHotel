<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="sixteen wide column ihotel-progress">
    <div class="ui tiny green progress" data-value="10" data-total="100">
        <div class="bar"></div>
    </div>
</div>
<div class="four wide column">
    <div class="ui fluid vertical pointing menu">
        <a class="item active">
            Үндсэн мэдээлэл
        </a>
        <a class="item disabled">
            Буудлын мэдээлэл
        </a>
        <a class="item disabled">
            Буудлын зураг
        </a>
        <a class="item disabled">
            Өрөөний товч мэдээлэл
        </a>
        <a class="item disabled">
            Өрөөний дэлгэрэнгүй мэдээлэл
        </a>
        <a class="item disabled">
            Өрөөний зураг
        </a>
        <a class="item disabled">
            Төлбөрийн нөхцөл
        </a>
        <a class="item disabled">
            Гэрээ хийх
        </a>
    </div>
</div>
<div class="twelve wide column">
	<form class="ui form segment" id="create-hotel-form" action="<?php echo e(url('hotel/create')); ?>" method="POST">
		<?php echo e(csrf_field()); ?>

		<img class="ui centered tiny image hotel-add" src="<?php echo e(asset('img/marker.png')); ?>">
		<h6 class="ui horizontal header divider ihotel-title">Үндсэн мэдээлэл</h6>
		<div class="required field">
			<label>Буудлын нэр</label>
			<input type="text" name="name">
		</div>
		<div class="required field">
			<label>Зочид буудын төрөл</label>
			<select class="ui fluid dropdown" name="category">
			<option value="">Сонгох</option>
				<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($category->id); ?>">
						<?php echo e($category->name); ?>

					</option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</div>
		<div class="two fields">
			<div class="required field">
				<label>Одны зэрэглэл</label>
				<select name="star" class="ui fluid dropdown">
					<option value="">Сонгох</option>
					<?php for($i=1; $i<=5; $i++): ?>
						<option value="<?php echo e($i); ?>">
							<?php echo e($i); ?> од
						</option>
					<?php endfor; ?>
				</select>
			</div>
			<div class="required field">
				<label>Өрөөний тоо</label>
				<input type="number" name="room_number" min="1">
			</div>
		</div>
		<div class="field">
			<label>Цахим хуудас</label>
			<div class="ui labeled input">
				<div class="ui label">http://</div>
				<input type="text" name="website" placeholder="mysite.com">
			</div>
		</div>
		<h6 class="ui horizontal header divider ihotel-title">
		Холбоо барих
		</h6>
		<div class="two fields">
			<div class="required field">
				<label>Холбоо барих ажилтны нэр</label>
				<input type="text" name="contact">
		</div>
			<div class="required field">
				<label>Утас</label>
				<input type="text" name="phone_number">
			</div>
		</div>
		<div class="required field">
			<label>И-мэйл</label>
			<input type="text" name="email">
		</div>
		<div class="required field">
			<label>Хаяг</label>
			<textarea name="address"></textarea>
		</div>
		<div class="required field">
			<label>Байршил</label>
			<div id="map" style="height:300px"></div>
			<input type="hidden" value="47.921622" name="lat" id="lat">
			<input type="hidden" value="106.922362" name="lon" id="lon">
		</div>
		<div class="required field">
			<label>3 үгт хаяг (what3words)</label>
			<input type="text" value="зоригт.анхаарах.хуруу" name="what3words" id="what3words">
			<input type="hidden" value="saving.masts.pile" name="what3words_en" id="what3words_en">
		</div>
		<div class="ui right floated buttons">
			<button class="ui primary button" type="submit">
				Дараах<i class="right chevron icon"></i>
			</button>
		</div><br><br>
	</form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjW4iZ6gWxhzJOE3Vi4wvHZcTH0vgdDqk&sensor=false&libraries=places"></script>
<script type="text/javascript">
	function initMap() {
	    var map = new google.maps.Map(document.getElementById('map'), {
	        zoom: 13,
	        center: {
	        	lat: 47.921622,
	        	lng: 106.922362
	        },
	    });
		marker = new google.maps.Marker({
			position: {
	        	lat: 47.921622,
	        	lng: 106.922362
			},
			map: map        
		});
		google.maps.event.addListener(map, "click", function (e) {
	    	$('#create-hotel-form').find('button').addClass('disabled');
			var lat = e.latLng.lat();
			var lon = e.latLng.lng();
			$.ajax({
				"async": true,
				"crossDomain": true,
				"url": "https://api.what3words.com/v2/reverse?coords="+lat+","+lon+"&display=full&lang=mn&format=json&key=Y2CPOYC3",
				"method": "GET",
				"headers": {},
			}).done(function (response) {
				$('#what3words').val(response.words);
	    		$('#create-hotel-form').find('button').removeClass('disabled');
			});
			$.ajax({
				"async": true,
				"crossDomain": true,
				"url": "https://api.what3words.com/v2/reverse?coords="+lat+","+lon+"&display=full&lang=en&format=json&key=Y2CPOYC3",
				"method": "GET",
				"headers": {},
			}).done(function (response) {
				$('#what3words_en').val(response.words);
	    		$('#create-hotel-form').find('button').removeClass('disabled');
			});
			marker.setPosition(new google.maps.LatLng(lat, lon));
			$('#lat').val(lat);
			$('#lon').val(lon);
		});
	}
	initMap();
	$('#create-hotel-form').form({
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
	    },
		onFailure: function(formErrors, fields) {
			var element;
			$.each(fields, function(e) {
				element = $('[name=' + e + ']');
				if(element.closest('.field').hasClass('error')) {
					if (element.parent().hasClass('dropdown')) {
						$(window).scrollTop(element.parent().offset().top - $(window).height() / 2);
					}
					else {
						element.focus();
					}
					return false;
				}
			});
			return false;
		},
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.hotel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>