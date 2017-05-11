<?php if($available): ?>
	<?php if($room->price_op): ?>
		<div class="two fields">
			<div class="field">
				<input type="text" name="price" placeholder="Үнэ (₮)">
			</div>
			<div class="field">
				<input type="text" name="price_op" placeholder="Үнэ - 1 Хүний (₮)">
			</div>
		</div>
	<?php else: ?>
		<div class="field">
			<input type="text" name="price" placeholder="Үнэ (₮)">
		</div>
		<div></div>
	<?php endif; ?>
<?php else: ?>
	<?php if($room->price_op): ?>
		<div class="two fields">
			<div class="field">
				<input type="text" name="price" placeholder="Үнэ (₮)" disabled="true">
			</div>
			<div class="field">
				<input type="text" name="price_op" placeholder="Үнэ - 1 Хүний (₮)" disabled="true">
			</div>
		</div>
		<div class="ui visible warning message">
			<p>Сонгосон өдөр өрөөний үнийг өөрчилсөн байна</p>
		</div><br>
	<?php else: ?>
		<div class="field">
			<input type="text" name="price" placeholder="Үнэ (₮)" disabled="true">
		</div>
		<div class="ui visible warning message">
			<p>Сонгосон өдөр өрөөний үнийг өөрчилсөн байна</p>
		</div><br>
	<?php endif; ?>
<?php endif; ?>