@if ($room->sales->count() > 0)
	<div class="ui divider"></div>
	<h4 class="ui header">Өрөөний үнэ</h4>
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>Өрөөний үнэ</th>
				@if ($room->price_op)
					<th>Өрөөний үнэ (1 хүний)</th>
				@endif
				<th>Эхлэх өдөр</th>
				<th>Дуусах өдөр</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($room->sales as $sale)
				<tr>
					<td>{{ $sale->price }}₮</td>
					@if ($room->price_op)
						<td>{{ $sale->price_op }}₮</td>
					@endif
					<td>{{ $sale->startdate }}</td>
					<td>{{ $sale->enddate }}</td>
					<td>
						<button class="ui red button" data-id="{{ $sale->id }}" type="button">Цуцлах</button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif