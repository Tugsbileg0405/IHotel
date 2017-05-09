@if ($closes->count() > 0)
	<div class="ui divider"></div>
	<h4 class="ui header">Өрөөний хаалт</h4>
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>Өрөөний тоо</th>
				<th>Эхлэх өдөр</th>
				<th>Дуусах өдөр</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($closes as $close)
				<tr>
					<td>{{ $close->number }} өрөө</td>
					<td>{{ $close->startdate }}</td>
					<td>{{ $close->enddate }}</td>
					<td>
						<button class="ui red button" data-id="{{ $close->id }}" type="button">Цуцлах</button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif