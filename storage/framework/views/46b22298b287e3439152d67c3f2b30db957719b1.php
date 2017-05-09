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

										<h4 class="ui header">Англи танилцуулга оруулах</h4>
									</div>
								</div>
							</div>
							<div class="ui stackable grid">
								<div class="sixteen wide column">
									<div class="ui segment">
										<form id="hotel-form-en" class="ui form" action="<?php echo e(url('admin/hotel/en', $hotel->id)); ?>" method="POST">
											<?php echo e(csrf_field()); ?>

											<h6 class="ui horizontal header divider ihotel-title">Буудлын мэдээлэл</h6>
											<div class="fields">
												<div class="required eight wide field">
													<label>Буудлын нэр</label>
													<input type="text" name="name" value="<?php echo e($hotel->name_en); ?>">
												</div>
												<div class="required eight wide field">
													<label>Холбоо барих ажилтны нэр</label>
													<input type="text" name="contact" value="<?php echo e($hotel->contact_en); ?>">
												</div>
											</div>
											<div class="required field">
												<label>Хаяг</label>
												<textarea name="address"><?php echo e($hotel->address_en); ?></textarea>
											</div>
											<h6 class="ui horizontal header divider ihotel-title">Буудлын нэмэлт мэдээлэл</h6>
											<div class="required field">
												<label>Танилцуулга</label>
												<textarea name="introduction"><?php echo e($hotel->introduction_en); ?></textarea>
											</div>
											<div class="field">
												<label>Бусад нэмэлт мэдээллүүд</label>
												<textarea name="other_service"><?php echo e($hotel->other_service_en); ?></textarea>
											</div>
											<h6 class="ui horizontal header divider ihotel-title">Өрөөний танилцуулга</h6>
											<?php $__currentLoopData = $hotel->rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="required field">
													<label><?php echo e($room->name); ?></label>
													<textarea name="room-introduction-<?php echo e($room->id); ?>"><?php echo e($room->introduction_en); ?></textarea>
												</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<h6 class="ui horizontal header divider ihotel-title">Бусад мэдээлэл</h6>
											<div class="field">
												<textarea name="other_info" placeholder="Нэмэлт мэдээлэл"><?php echo e($hotel->other_info_en); ?></textarea>
											</div>
											<div class="field">
												<button class="ui right floated primary button" type="submit">Хадгалах</button>
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
</div>
<?php if(session()->has('status')): ?>
	<div class="ui basic modal" id="success-message">
		<div class="ui icon header">
			<i class="green check icon"></i>
			<?php echo e(session('status')); ?>

		</div>
	</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#success-message').modal('show');
		$('#hotel-form-en').form({
		    inline : true,
		    fields: {
		        name: {
		            identifier  : 'name',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Please enter a name'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Please enter at most 191 characters'
		                }
		            ]
		        },
		        contact: {
		            identifier  : 'contact',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Please enter a contact name'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Please enter at most 191 characters'
		                }
		            ]
		        },
		        address: {
		            identifier  : 'address',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Please enter an address'
		                },
		                {
		                    type   : 'minLength[6]',
		                    prompt : 'Please enter at least 6 characters'
		                }
		            ]
		        },
		        introduction: {
		            identifier  : 'introduction',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Please enter an introduction'
		                },
		                {
		                    type   : 'minLength[6]',
		                    prompt : 'Please enter at least 6 characters'
		                }
		            ]
		        },
				<?php $__currentLoopData = $hotel->rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        introduction<?php echo e($room->id); ?>: {
			            identifier  : 'room-introduction-<?php echo e($room->id); ?>',
			            rules: [
			                {
			                    type   : 'empty',
			                    prompt : 'Please enter an introduction'
			                }
			            ]
			        },
		        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    },
		    onSuccess: function(e) {
		    	$(this).find('button').addClass('loading disabled');
		    }
		});
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.hoteladmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>