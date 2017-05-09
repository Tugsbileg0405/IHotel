@if ($number > 0)
	<select class="ui dropdown" name="number">
		<option value="">Өрөөний тоо</option>
		@for ($i = 1; $i <= $number; $i++)
			<option value="{{ $i }}">{{ $i }} өрөө</option>
		@endfor
	</select>
@else
	<select class="ui dropdown disabled" name="number">
		<option value="">Өрөөний тоо</option>
	</select>
	<div class="ui visible warning message">
		<p>Сонгосон өдөр боломжит бүх өрөөг хаасан байна</p>
	</div>
@endif