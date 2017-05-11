<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('hotel.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="twelve wide column">
	<div class="ui segment">
		<img class="ui centered tiny image hotel-add" src="<?php echo e(asset('img/marker.png')); ?>">
		<?php if($total_room_number != $room_number): ?>
			<form class="ui form" id="create-room-form" action="<?php echo e(url('hotel/room', $hotel->id)); ?>" method="POST">
				<?php echo e(csrf_field()); ?>

				<h6 class="ui horizontal header divider ihotel-title">Өрөөний товч мэдээлэл</h6>
				<?php if($total_room_number > $room_number): ?>
					<div class="ui yellow message">Та <?php echo e($total_room_number -  $room_number); ?> өрөө бүртгэх шаарлагатай</div>
				<?php elseif($total_room_number < $room_number): ?>
					<div class="ui yellow message">Та <?php echo e($room_number - $total_room_number); ?> өрөө илүү бүртгэсэн байна</div>
				<?php endif; ?>
				<div class="two fields">
					<div class="required field">
						<label>Өрөөний төрөл</label>
						<input type="text" name="name">
					</div>
					<div class="required field">
						<label>Өрөөний тоо</label>
						<input type="text" name="number">
					</div>
				</div>
				<div class="two fields">
					<div class="required field">
						<label>Орны төрөл</label>
						<select name="category" class="ui fluid dropdown">
							<option value="">Ороо сонгоно уу</option>
							<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
					<div class="required field">
						<label>Орны тоо</label>
						<input type="text" name="bed_number">
					</div>
				</div>
				<div class="two fields">
					<div class="required field">
						<label>Хүний тоо</label>
						<input type="text" name="people_number">
					</div>
					<div class="two fields">
						<div class="required field">
							<label>Өрөөний үнэ</label>
							<input type="text" name="price" placeholder="₮">
						</div>
						<div class="field">
							<label>Өрөөний үнэ (1 хүний)</label>
							<input type="text" name="price_op" placeholder="₮">
						</div>
					</div>
				</div>
				<div class="ui right floated buttons">
					<button class="ui primary button" type="submit">Нэмэх</button>
				</div><br><br><br>
			</form>
		<?php endif; ?>
		<?php if($rooms->count() > 0): ?>
			<h6 class="ui horizontal header divider ihotel-title">Өрөөний мэдээлэл</h6>
			<table class="ui table">
				<thead>
					<tr>
						<th>Өрөөний төрөл</th>
						<th>Өрөөний тоо</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($room->name); ?></td>
							<td><?php echo e($room->number); ?></td>
							<td>
								<a class="ui icon button open-EditModal" data-key="<?php echo e($key); ?>">
									<i class="pencil icon"></i>
								</a>
								<a class="ui icon button" href="<?php echo e(url('hotel/room', $room->id)); ?>" 
									onclick="event.preventDefault();
             						document.getElementById('room-<?php echo e($room->id); ?>').submit();">
									<i class="trash icon"></i>
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
			<?php if($total_room_number == $room_number): ?>
				<div class="ui right floated buttons">
					<a class="ui ihotel-back button" href="<?php echo e(url('hotel/photo', $hotel->id)); ?>">Буцах</a>
					<div class="or"></div>
					<a class="ui primary button" 
						href="<?php echo e(url('hotel/room/service', $hotel->id)); ?>"
						onclick="$(this).addClass('loading disabled')">
						Дараах<i class="right chevron icon"></i>
					</a>
				</div>
			<?php else: ?>
				<div class="ui right floated buttons">
					<a class="ui ihotel-back button" href="<?php echo e(url('hotel/photo', $hotel->id)); ?>">Буцах</a>
					<div class="or"></div>
					<a class="ui primary disabled button">
						Дараах<i class="right chevron icon"></i>
					</a>
				</div>
			<?php endif; ?><br><br>
		<?php endif; ?>
	</div>
</div>
<div class="ui modal" id="editModal">
	<i class="close icon"></i>
	<div class="header">Өрөөний мэдээлэл засах</div>
	<div class="content">
		<form class="ui form" id="edit-room-form" action="" method="POST">
			<?php echo e(csrf_field()); ?>

			<?php echo e(method_field('PUT')); ?>

			<div class="two fields">
				<div class="required field">
					<label>Өрөөний төрөл</label>
					<input type="text" name="name">
				</div>
				<div class="required field">
					<label>Өрөөний тоо</label>
					<input type="text" name="number">
				</div>
			</div>
			<div class="two fields">
				<div class="required field">
					<label>Орны төрөл</label>
					<select name="category" class="ui fluid dropdown">
						<option value="">Ороо сонгоно уу</option>
						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
				<div class="required field">
					<label>Орны тоо</label>
					<input type="text" name="bed_number">
				</div>
			</div>
			<div class="two fields">
				<div class="required field">
					<label>Хүний тоо</label>
					<input type="text" name="people_number">
				</div>
				<div class="two fields">
					<div class="required field">
						<label>Өрөөний үнэ</label>
						<input type="text" name="price" placeholder="₮">
					</div>
					<div class="field">
						<label>Өрөөний үнэ (1 хүний)</label>
						<input type="text" name="price_op" placeholder="₮">
					</div>
				</div>
			</div>
			<div class="ui right floated buttons">
				<button class="ui primary button" type="submit">Хадгалах</button>
			</div><br><br><br>
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$('.open-EditModal').click(function(e) {
		var rooms = <?php echo json_encode($rooms) ?>;
		var key = $(this).data('key');
		$('#editModal').modal('show');
		$('#edit-room-form').attr('action', '<?php echo e(url("hotel/room")); ?>/' + rooms[key].id + '/<?php echo e($hotel->id); ?>');
		$('#edit-room-form').find('[name=name]').val(rooms[key].name);
		$('#edit-room-form').find('[name=number]').val(rooms[key].number);
		$('#edit-room-form').find('[name=category]').dropdown('set selected', rooms[key].room_category_id);
		$('#edit-room-form').find('[name=bed_number]').val(rooms[key].bed_number);
		$('#edit-room-form').find('[name=people_number]').val(rooms[key].people_number);
		$('#edit-room-form').find('[name=price]').val(rooms[key].price);
		$('#edit-room-form').find('[name=price_op]').val(rooms[key].price_op);
		e.preventDefault();
	});
	$('#create-room-form').form({
	    inline : true,
	    fields: {
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
		                type   : 'integer[1..1000000000]',
		                prompt : 'Өрөөний тоо оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        category: {
	            identifier: 'category',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Орны төрөл сонгоно уу'
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
		                type   : 'integer[1..1000000000]',
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
		                type   : 'integer[1..1000000000]',
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
		                type   : 'integer[1..1000000000]',
		                prompt : 'Өрөөний үнэ оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        price_op: {
	            identifier: 'price_op',
	            rules: [
	                {
		                type   : 'integer[1..1000000000]',
		                prompt : 'Өрөөний үнэ оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
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
	$('#edit-room-form').form({
	    inline : true,
	    fields: {
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
		                type   : 'integer[1..1000000000]',
		                prompt : 'Өрөөний тоо оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        category: {
	            identifier: 'category',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Орны төрөл сонгоно уу'
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
		                type   : 'integer[1..1000000000]',
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
		                type   : 'integer[1..1000000000]',
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
	        price_op: {
	            identifier: 'price_op',
	            rules: [
	                {
		                type   : 'integer[1..1000000000]',
		                prompt : 'Өрөөний үнэ оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
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