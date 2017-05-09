<?php $__env->startSection('title', 'Хэрэглэгч'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
	<div class="ui green segment">
		<h4 class="ui header">Хэрэглэгч</h4>
		<div class="ui divider"></div>
	    <form id="search-form" class="ui form" action="<?php echo e(url('profile/user/search')); ?>" method="POST">
    		<?php echo e(csrf_field()); ?>

			<div class="field">
				<div class="ui fluid left icon input">
					<input type="text" name="search" placeholder="Хайх">
					<i class="search icon"></i>
				</div>
				<div class="results"></div>
			</div>
			<button class="ui red right floated button">Хайх</button>
		</form><br><br><br>
		<div id="result">
			<table class="ui stackable selectable table">
				<thead>
					<tr>
						<th>#</th>
						<th>Нэр</th>
						<th>И-мэйл</th>
						<th>Эрх</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($user->id); ?></td>
							<td><?php echo e($user->name); ?></td>
							<td><?php echo e($user->email); ?></td>
							<td>
								<?php if($user->isAdmin()): ?>
									Админ
								<?php else: ?> 
									Хэрэглэгч
								<?php endif; ?>
							</td>
							<td>
								<a class="ui icon button" href="<?php echo e(url('profile/user/'.$user->id.'/edit')); ?>">
									<i class="pencil icon"></i>
								</a>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<?php echo e($users->links()); ?>

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#search-form').submit(function(e) {
			$('#search-form button').addClass('loading disabled');
	        $.ajax({
	            url: $(this).attr('action'),
	            type: $(this).attr('method'),
	            data: $(this).serialize(),
	        }).done(function(data) {
				$('#search-form button').removeClass('loading disabled');
	            $('#result').html(data);
	        }).fail(function() {
				$('#search-form button').removeClass('loading disabled');
	            $('#result').html('<div class="ui warning message">Алдаа гарлаа</div>');
	        });
	        e.preventDefault(); 
	    });
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>