<?php $__env->startSection('title', 'Сэтгэгдэл'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
	<div class="ui green segment">
		<h4 class="ui header">Сэтгэгдэл нэмэх</h4>
		<div class="ui divider"></div>
	    <form id="search-form" class="ui form" action="<?php echo e(url('profile/comment/search')); ?>" method="POST">
    		<?php echo e(csrf_field()); ?>

			<div class="field">
				<div class="ui fluid left icon input">
					<input type="text" name="search" placeholder="Хайх">
					<i class="search icon"></i>
				</div>
				<div class="results"></div>
			</div>
		    <a class="ui button primary" href="<?php echo e(url('profile/comment/create')); ?>">
		    	<i class="plus icon"></i>Шинэ
		    </a>
			<button class="ui red right floated button">Хайх</button>
		</form><br>
		<div id="result">
			<table class="ui stackable selectable table">
				<thead>
					<tr>
						<th>#</th>
						<th>Нэр</th>
						<th>Тайлбар</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($comment->id); ?></td>
							<td><?php echo e($comment->name); ?></td>
							<td><?php echo e($comment->description); ?></td>
							<td>
								<a class="ui icon button" href="<?php echo e(url('profile/comment/'.$comment->id.'/edit')); ?>">
									<i class="pencil icon"></i>
								</a>
								<a class="ui icon button open-DeleteModal" data-id="<?php echo e($comment->id); ?>">
									<i class="trash icon"></i>
								</a>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<?php echo e($comments->links()); ?>

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
	    $('#result').on('click', '.open-DeleteModal', function() {
			var id = $(this).data('id');
			$('#delete-modal').modal({
				onApprove : function() {
					$('#delete-modal').find('form').attr('action', "<?php echo e(url('profile/comment')); ?>/" + id);
					$('#delete-modal').find('form').submit();
				}
			}).modal('show');
		});
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>