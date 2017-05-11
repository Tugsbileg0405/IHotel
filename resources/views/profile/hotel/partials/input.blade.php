@if ($available)
	@if ($room->price_op)
		<div class="two fields">
			<div class="field">
				<input type="text" name="price" placeholder="Үнэ (₮)">
			</div>
			<div class="field">
				<input type="text" name="price_op" placeholder="Үнэ - 1 Хүний (₮)">
			</div>
		</div>
	@else
		<div class="field">
			<input type="text" name="price" placeholder="Үнэ (₮)">
		</div>
		<div></div>
	@endif
@else
	@if ($room->price_op)
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
	@else
		<div class="field">
			<input type="text" name="price" placeholder="Үнэ (₮)" disabled="true">
		</div>
		<div class="ui visible warning message">
			<p>Сонгосон өдөр өрөөний үнийг өөрчилсөн байна</p>
		</div><br>
	@endif
@endif