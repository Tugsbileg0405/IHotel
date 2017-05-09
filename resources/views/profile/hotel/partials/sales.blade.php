@if ($sales->count() > 0)
	<div class="ui divider"></div>
	<h4 class="ui header">Өрөөний үнэ</h4>
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>Өрөөний үнэ</th>
				<th>Эхлэх өдөр</th>
				<th>Дуусах өдөр</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($sales as $sale)
				<tr>
					<td>{{ $sale->price }}₮</td>
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