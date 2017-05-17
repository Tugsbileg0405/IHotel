@extends('layouts.app')

@section('title', 'Захиалга')

@section('content')
<div class="main-page">
	<div class="ui segment com-service">
		<div class="ui container">
			<div class="ui stackable grid">
				<div class="eight wide column">{{ date('Y-m-d') }}
					<h4 class="ui header">Захиалгын мэдээлэл</h4>
				</div>
			</div>
		</div>
	</div>
    <div class="ui container">
		<div class="ui green segment">
			<h4 class="ui header">Захиалга</h4>
			<div class="ui divider"></div>
		    <form id="search-form" class="ui form" action="{{ url('profile/order/search') }}" method="POST">
	    		{{ csrf_field() }}
				<div class="field">
					<div class="ui fluid left icon input">
						<input type="text" name="search" placeholder="Захиалгын дугаар, Захиалагчийн нэр, Захиалагчийн и-мэйл, Буудлын нэр">
						<i class="search icon"></i>
					</div>
					<div class="results"></div>
				</div>
				<button class="ui red right floated button">Хайх</button>
			</form><br><br><br>
			<div id="result">
				<table class="ui stackable selectable table">
					<thead>
						<tr>
							<th>#</th>
							<th>Захиалагчийн нэр</th>
							<th>Буудлын нэр</th>
							<th>Ирэх өдөр</th>
							<th>Гарах өдөр</th>
							<th>Нийт төлбөр</th>
							<th>Төлөв</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($orders as $order)
							<tr>
								<td>{{ $order->number }}</td>
								<td>{{ json_decode($order->userdata)->name }}</td>
								<td>{{ $order->hotel_name }}</td>
								<td>{{ $order->startdate }}</td>
								<td>{{ $order->enddate }}</td>
								<td>
									@if ($order->price_dollar)
										{{ number_format($order->price_dollar) }}$
									@else
										{{ number_format($order->price) }}₮
									@endif
								</td>
								<td>
									@if ($order->status == 1)
										<span class="ui teal label">Баталгаажаагүй</span>
									@elseif ($order->status == 2)
										<span class="ui green label">Баталгаажсан</span>
									@elseif ($order->status == 3)
										<span class="ui red label">Цуцлагдсан</span>
									@endif
								</td>
								<td>
									<a class="ui icon button" href="{{ url('profile/order/'.$order->id.'/edit') }}">
										<i class="eye icon"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{{ $orders->links() }}
			</div>
		</div>
	</div>
</div>
@endsection

@push('script')
<script type="text/javascript">
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
	$('.open-DeleteModal').click(function() {
		var id = $(this).data('id');
		$('#delete-modal').modal({
			onApprove : function() {
				$('#delete-modal').find('form').attr('action', "{{ url('profile/order')}}/" + id);
				$('#delete-modal').find('form').submit();
			}
		}).modal('show');
	});
</script>
@endpush