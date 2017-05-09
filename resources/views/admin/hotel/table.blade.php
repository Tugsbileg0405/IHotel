@extends('layouts.app')

@section('title', 'Буудал')

@section('content')
<div class="main-page">
	<div class="ui segment com-service">
		<div class="ui container">
			<div class="ui stackable grid">
				<div class="eight wide column">{{ date('Y-m-d') }}
					<h4 class="ui header">Буудлын мэдээлэл</h4>
				</div>
			</div>
		</div>
	</div>
    <div class="ui container">
		<div class="ui green segment">
			<h4 class="ui header">Буудал</h4>
			<div class="ui divider"></div>
		    <form id="search-form" class="ui form" action="{{ url('profile/hotel/search') }}" method="POST">
	    		{{ csrf_field() }}
				<div class="field">
					<div class="ui fluid left icon input">
						<input type="text" name="search" placeholder="Буудлын нэр">
						<i class="search icon"></i>
					</div>
					<div class="results"></div>
				</div>
			    <a class="ui button primary" href="{{ url('hotel/create') }}">
			    	<i class="plus icon"></i>Шинэ
			    </a>
				<button class="ui red right floated button">Хайх</button>
			</form><br>		
			<div id="result">	
				<table class="ui stackable selectable table">
					<thead>
						<tr>
							<th>#</th>
							<th>Нэр</th>
							<th>Ангилал</th>
							<th>Өрөөний тоо</th>
							<th>Од</th>
							<th>Эрэмбэ</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($hotels as $hotel)
							<tr>
								<td>{{ $hotel->id }}</td>
								<td>{{ $hotel->name }}</td>
								<td>{{ $hotel->category->name }}</td>
								<td>{{ $hotel->room_number }}</td>
								<td>
									@for ($i=0; $i<$hotel->star; $i++)
										<i class="icon yellow star"></i>
									@endfor
								</td>
								<td>{{ $hotel->priority }}</td>
								<td>
									<a class="ui icon button" href="{{ url('profile/hotel/'.$hotel->id.'/edit') }}">
										<i class="pencil icon"></i>
									</a>
								</td>
								<td>
									<a class="ui icon button open-DeleteModal" data-id="{{ $hotel->id }}">
										<i class="trash icon"></i>
									</a>
								</td>
								<td>
									<a class="ui icon button" href="{{ url('admin/hotel', $hotel->id) }}">
										<i class="eye icon"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{{ $hotels->links() }}
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
	</div>
</div>
@endsection

@push('script')
<script type="text/javascript">
	$(document).ready(function() {
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
	    $('#result').on('click', '.open-DeleteModal', function() {
			var id = $(this).data('id');
			$('#delete-modal').modal({
				onApprove : function() {
					$('#delete-modal').find('form').attr('action', "{{ url('profile/hotel')}}/" + id);
					$('#delete-modal').find('form').submit();
				}
			}).modal('show');
		});
	});
</script>
@endpush