<?php if($number > 0): ?>
	<select class="ui dropdown" name="number">
		<option value="">Өрөөний тоо</option>
		<?php for($i = 1; $i <= $number; $i++): ?>
			<option value="<?php echo e($i); ?>"><?php echo e($i); ?> өрөө</option>
		<?php endfor; ?>
	</select>
<?php else: ?>
	<select class="ui dropdown disabled" name="number">
		<option value="">Өрөөний тоо</option>
	</select>
	<div class="ui visible warning message">
		<p>Сонгосон өдөр боломжит бүх өрөөг хаасан байна</p>
	</div>
<?php endif; ?>