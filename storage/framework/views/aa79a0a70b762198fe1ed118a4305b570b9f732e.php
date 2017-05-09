<?php $__env->startSection('title', 'Онгоцны буудлаас тосох үйлчилгээ'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
	<div class="ui green segment">
		<h4 class="ui header">Онгоцны буудлаас тосох үйлчилгээ</h4>
		<div class="ui divider"></div>
	    <a class="ui button primary" href="<?php echo e(url('profile/pickup/create')); ?>">
	    	<i class="plus icon"></i>Шинэ
	    </a><br><br>
		<div id="result">
			<table class="ui stackable selectable table">
				<thead>
					<tr>
						<th>#</th>
						<th>Нэр</th>
						<th>Үнэ</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $pickups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pickup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($pickup->id); ?></td>
							<td><?php echo e($pickup->name); ?></td>
							<td><?php echo e($pickup->price); ?></td>
							<td>
								<a class="ui icon button" href="<?php echo e(url('profile/pickup/'.$pickup->id.'/edit')); ?>">
									<i class="pencil icon"></i>
								</a>
								<a class="ui icon button open-DeleteModal" data-id="<?php echo e($pickup->id); ?>">
									<i class="trash icon"></i>
								</a>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<?php echo e($pickups->links()); ?>

		</div>
	</div>
</div>
<div id="delete-modal" class="ui modal">
	<div class="header">Устгах</div>
	<div class="content">
		<p>Та үүнийг устгахыг зөвшөөрч байна уу?</p>
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
	    $('#result').on('click', '.open-DeleteModal', function() {
			var id = $(this).data('id');
			$('#delete-modal').modal({
				onApprove : function() {
					$('#delete-modal').find('form').attr('action', "<?php echo e(url('profile/pickup')); ?>/" + id);
					$('#delete-modal').find('form').submit();
				}
			}).modal('show');
		});
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>