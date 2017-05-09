<?php if($available): ?>
	<input type="text" name="price" placeholder="Үнэ (₮)">
<?php else: ?>
	<input type="text" name="price" placeholder="Үнэ (₮)" disabled="true">
	<div class="ui visible warning message">
		<p>Сонгосон өдөр өрөөний үнийг өөрчилсөн байна</p>
	</div>
<?php endif; ?>