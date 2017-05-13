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

										<h4 class="ui header">Өрөөний мэдээлэл</h4>
									</div>
								</div>
							</div>
							<div class="ui stackable grid">
								<?php if($rooms->count() > 0): ?>
									<?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="sixteen wide column">
											<div class="ui segment">
												<div class="ui stackable column grid">
													<div class="four wide column">
														<img class="ui image" src="<?php echo e(asset(unserialize($room->photos)[0])); ?>">
													</div>
													<div class="six wide column">
														<div class="ui large header"><?php echo e($room->name); ?> - <?php echo e(number_format($room->price)); ?>₮/хоног</div>
														<p class="ui justify"><?php echo e($room->introduction); ?></p>
														<div class="ui horizontal list">
															<div class="item">
																<i class="circular user icon"></i>
																<div class="middle aligned content">x<?php echo e($room->people_number); ?></div>
															</div>
															<div class="item">
																<i class="circular hotel icon"></i>
																<div class="middle aligned content">x<?php echo e($room->bed_number); ?></div>
															</div>
															<div class="item">
																<i class="circular expand icon"></i>
																<div class="middle aligned content"><?php echo e($room->size); ?> m2</div>
															</div>
														</div>
														<div class="ui hidden divider">
															<a class="ui primary button" href="<?php echo e(url('hotel/room/service', $hotel->id)); ?>">Засах</a>
														</div>
													</div>
													<div class="six wide column">
														<h4 class="ui header">Өрөө хаах</h4>
														<form class="close-room-form ui form" action="<?php echo e(url('admin/hotel/room/close', $room->id)); ?>" method="POST">
															<?php echo e(csrf_field()); ?>

															<div class="field">
																<div class="ui fluid left icon input">
																	<input type="text" class="close" placeholder="mm/dd/yyyy - mm/dd/yyyy" name="closedate" value="" data-id="<?php echo e($room->id); ?>">
																	<i class="calendar icon"></i>
																	<input type="hidden" name="startdate">
																	<input type="hidden" name="enddate">
																</div>
															</div>
															<div class="field" id="checked-select-<?php echo e($room->id); ?>">
																<select class="ui dropdown disabled" name="number">
																	<option value="">Өрөөний тоо</option>
																</select>
															</div>
															<div class="field">
																<button class="ui red button" type="submit">Хадгалах</button>
															</div>
														</form>
														<h4 class="ui header">Өрөөний үнэ өөрчлөх</h4>
														<form class="sale-room-form ui form" action="<?php echo e(url('admin/hotel/room/sale', $room->id)); ?>" method="POST">
															<?php echo e(csrf_field()); ?>

															<div class="field">
																<div class="ui fluid left icon input">
																	<input type="text" class="sale" name="saledate" placeholder="mm/dd/yyyy - mm/dd/yyyy" value="" data-id="<?php echo e($room->id); ?>">
																	<i class="calendar icon"></i>
																	<input type="hidden" name="startdate">
																	<input type="hidden" name="enddate">
																</div>
															</div>
															<div id="checked-input-<?php echo e($room->id); ?>">
																<?php if($room->price_op): ?>
																	<div class="two fields">
																		<div class="field">
																			<input type="text" name="price" placeholder="Үнэ (₮)" disabled="true">
																		</div>
																		<div class="field">
																			<input type="text" name="price_op" placeholder="Үнэ - 1 Хүний (₮)" disabled="true">
																		</div>
																	</div>
																<?php else: ?>
																	<div class="field">
																		<input type="text" name="price" placeholder="Үнэ (₮)" disabled="true">
																	</div>
																	<div></div>
																<?php endif; ?>
															</div>
															<div class="field">
																<button class="ui red button" type="submit">Хадгалах</button>
															</div>
														</form>
													</div>
												</div>
												<div class="closedRooms">
													<?php if($room->closes->count() > 0): ?>
														<div class="ui divider"></div>
														<h4 class="ui header">Өрөөний хаалт</h4>
														<table class="ui stackable selectable table">
															<thead>
																<tr>
																	<th>Өрөөний тоо</th>
																	<th>Эхлэх өдөр</th>
																	<th>Дуусах өдөр</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
																<?php $__currentLoopData = $room->closes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $close): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<tr>
																		<td><?php echo e($close->number); ?> өрөө</td>
																		<td><?php echo e($close->startdate); ?></td>
																		<td><?php echo e($close->enddate); ?></td>
																		<td>
																			<button class="ui red button" data-id="<?php echo e($close->id); ?>" type="button">Цуцлах</button>
																		</td>
																	</tr>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															</tbody>
														</table>
													<?php endif; ?>
												</div>
												<div class="saledRooms">
													<?php if($room->sales->count() > 0): ?>
														<div class="ui divider"></div>
														<h4 class="ui header">Өрөөний үнэ</h4>
														<table class="ui stackable selectable table">
															<thead>
																<tr>
																	<th>Өрөөний үнэ</th>
																	<?php if($room->price_op): ?>
																		<th>Өрөөний үнэ (1 хүний)</th>
																	<?php endif; ?>
																	<th>Эхлэх өдөр</th>
																	<th>Дуусах өдөр</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
																<?php $__currentLoopData = $room->sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<tr>
																		<td><?php echo e($sale->price); ?>₮</td>
																		<?php if($room->price_op): ?>
																			<td><?php echo e($sale->price_op); ?>₮</td>
																		<?php endif; ?>
																		<td><?php echo e($sale->startdate); ?></td>
																		<td><?php echo e($sale->enddate); ?></td>
																		<td>
																			<button class="ui red button" data-id="<?php echo e($sale->id); ?>" type="button">Цуцлах</button>
																		</td>
																	</tr>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															</tbody>
														</table>
													<?php endif; ?>
												</div>
											</div>
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php else: ?>
									<div class="sixteen wide column">
										<div class="ui segment">
											Та өрөө бүртгүүлээгүй байна. <a href="<?php echo e(url('hotel/room', $hotel->id)); ?>">Энд</a> дарж бүртгүүлнэ үү.
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="cancel-modal" class="ui modal">
	<div class="header">Цуцлах</div>
	<div class="content">
		<p>Та үүнийг цуцлахыг зөвшөөрч байна уу?</p>
	</div>
	<div class="actions">
		<a class="ui red negative button">Үгүй</a>
		<a class="ui positive right labeled icon button">
			<i class="checkmark icon"></i>Тийм
		</a>
		<form action="" method="POST">
			<?php echo e(csrf_field()); ?>

			<?php echo e(method_field('DELETE')); ?>

		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$(document).ready(function() {
	    $('.close').daterangepicker({
			autoApply: true,
			autoUpdateInput: false,
	    });
	    $('.sale').daterangepicker({
			autoApply: true,
			autoUpdateInput: false,
	    });
		$('.close').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
			id = $(this).data('id');
			$('#checked-select-' + id).find('select').addClass('disabled');
			var startdate = picker.startDate.format('YYYY-MM-DD');
			var enddate = picker.endDate.format('YYYY-MM-DD');
			$(this).siblings('input[name=startdate]').val(startdate);
			$(this).siblings('input[name=enddate]').val(enddate);
			$.ajax({
				method: 'POST',
				url: '<?php echo e(url("admin/hotel/room/close/check")); ?>/' + id,
				data: $(this).closest('form').serialize(),
				context: this,
			}).done(function(data) {
				$('#checked-select-' + id).html(data);
				$('.ui.dropdown').dropdown('refresh');
				$(this).closest('form').form('refresh');
			}).fail(function() {
				$('#checked-select-' + id).append('<div class="ui visible warning message"><p>Алдаа гарлаа</p></div>');
			});
		});
		$('.sale').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
			id = $(this).data('id');
			$('#checked-input-' + id).find('input').attr('disabled', true);
			var startdate = picker.startDate.format('YYYY-MM-DD');
			var enddate = picker.endDate.format('YYYY-MM-DD');
			$(this).siblings('input[name=startdate]').val(startdate);
			$(this).siblings('input[name=enddate]').val(enddate);
			$.ajax({
				method: 'POST',
				url: '<?php echo e(url("admin/hotel/room/sale/check")); ?>/' + id,
				data: $(this).closest('form').serialize(),
				context: this,
			}).done(function(data) {
				$('#checked-input-' + id).html(data);
				$(this).closest('form').form('refresh');
			}).fail(function() {
				$('#checked-input-' + id).append('<div class="ui visible warning message"><p>Алдаа гарлаа</p></div>');
			});
		});
		$('.close-room-form').form({
		    inline : true,
		    fields: {
		        number: {
		            identifier: 'number',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Өрөөний тоо сонгоно уу'
		                }
		            ]
		        },
		        closedate: {
		            identifier: 'closedate',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Огноо сонгоно уу'
		                },
		            ]
		        },
		    },
		    onSuccess: function(e) {
		    	$(this).find('button').addClass('loading disabled');
			    $.ajax({
					type: $(this).attr('method'),
					url: $(this).attr('action'),
		           	data: $(this).serialize(),
	            	context: this,
		           	success: function(data) {
		           		$(this).trigger('reset');
		           		$(this).find('.dropdown').form('clear');
		           		$(this).closest('.ui.grid').siblings('.closedRooms').html(data);
		    			$(this).find('button').removeClass('loading disabled');
		       		},
					error: function(){
		    			$(this).find('button').removeClass('loading disabled');
					}
				});
		    	e.preventDefault();
		    }
		});
		$('.sale-room-form').form({
		    inline : true,
		    fields: {
		        price: {
		            identifier: 'price',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Өрөөний үнэ оруулна уу'
		                },
		                {
		                    type   : 'number',
		                    prompt : 'Өрөөний үнэ оруулна уу'
		                }
		            ]
		        },
		        price_op: {
		            identifier: 'price_op',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Өрөөний үнэ оруулна уу'
		                },
		                {
		                    type   : 'number',
		                    prompt : 'Өрөөний үнэ оруулна уу'
		                }
		            ]
		        },
		        saledate: {
		            identifier: 'saledate',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Огноо сонгоно уу'
		                },
		            ]
		        },
		    },
		    onSuccess: function(e) {
		    	$(this).find('button').addClass('loading disabled');
			    $.ajax({
					type: $(this).attr('method'),
					url: $(this).attr('action'),
		           	data: $(this).serialize(),
	            	context: this,
		           	success: function(data) {
		           		$(this).trigger('reset');
		           		$(this).closest('.ui.grid').siblings('.saledRooms').html(data);
		    			$(this).find('button').removeClass('loading disabled');
		       		},
					error: function(){
		    			$(this).find('button').removeClass('loading disabled');
					}
				});
		    	e.preventDefault();
		    }
		});
	    $('.closedRooms').on('click', '.red.button', function() {
			cancelButton = $(this);
			var id = cancelButton.data('id');
			$('#cancel-modal').modal({
				onApprove : function() {
					$('#cancel-modal').find('form').attr('action', "<?php echo e(url('admin/hotel/room/close')); ?>/" + id);
				    $.ajax({
						type: $('#cancel-modal').find('form').attr('method'),
						url: $('#cancel-modal').find('form').attr('action'),
			           	data: $('#cancel-modal').find('form').serialize(),
			           	success: function(data) {
			           		cancelButton.closest('.closedRooms').html(data);
			       		},
					});
				}
			}).modal('show');
		});
	    $('.saledRooms').on('click', '.red.button', function() {
			cancelButton = $(this);
			var id = cancelButton.data('id');
			$('#cancel-modal').modal({
				onApprove : function() {
					$('#cancel-modal').find('form').attr('action', "<?php echo e(url('admin/hotel/room/sale')); ?>/" + id);
				    $.ajax({
						type: $('#cancel-modal').find('form').attr('method'),
						url: $('#cancel-modal').find('form').attr('action'),
			           	data: $('#cancel-modal').find('form').serialize(),
			           	success: function(data) {
			           		cancelButton.closest('.saledRooms').html(data);
			       		},
					});
				}
			}).modal('show');
		});
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.hoteladmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>