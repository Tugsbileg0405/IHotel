@extends('layouts.profile')

@section('title', 'Онгоцны буудлаас тосох үйлчилгээ')

@section('content')
<div class="eleven wide column">
	<div class="ui green segment">
		<h4 class="ui header">Онгоцны буудлаас тосох үйлчилгээ</h4>
		<div class="ui divider"></div>
	    <a class="ui button primary" href="{{ url('profile/pickup/create') }}">
	    	<i class="plus icon"></i>Шинэ
	    </a><br><br>
		<div id="result">
			<table class="ui stackable selectable table">
				<thead>
					<tr>
						<th>#</th>
						<th>Нэр</th>
						<th>Үнэ</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($pickups as $pickup)
						<tr>
							<td>{{ $pickup->id }}</td>
							<td>{{ $pickup->name }}</td>
							<td>{{ $pickup->price }}</td>
							<td>
								<a class="ui icon button" href="{{ url('profile/pickup/'.$pickup->id.'/edit') }}">
									<i class="pencil icon"></i>
								</a>
								<a class="ui icon button open-DeleteModal" data-id="{{ $pickup->id }}">
									<i class="trash icon"></i>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ $pickups->links() }}
		</div>
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
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
		</form>
	</div>
</div>
@endsection

@push('script')
<script type="text/javascript">
	$(document).ready(function() {
	    $('#result').on('click', '.open-DeleteModal', function() {
			var id = $(this).data('id');
			$('#delete-modal').modal({
				onApprove : function() {
					$('#delete-modal').find('form').attr('action', "{{ url('profile/pickup')}}/" + id);
					$('#delete-modal').find('form').submit();
				}
			}).modal('show');
		});
	});
</script>
@endpush