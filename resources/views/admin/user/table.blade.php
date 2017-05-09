@extends('layouts.profile')

@section('title', 'Хэрэглэгч')

@section('content')
<div class="eleven wide column">
	<div class="ui green segment">
		<h4 class="ui header">Хэрэглэгч</h4>
		<div class="ui divider"></div>
	    <form id="search-form" class="ui form" action="{{ url('profile/user/search') }}" method="POST">
    		{{ csrf_field() }}
			<div class="field">
				<div class="ui fluid left icon input">
					<input type="text" name="search" placeholder="Хайх">
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
						<th>Нэр</th>
						<th>И-мэйл</th>
						<th>Эрх</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>
								@if ($user->isAdmin())
									Админ
								@else 
									Хэрэглэгч
								@endif
							</td>
							<td>
								<a class="ui icon button" href="{{ url('profile/user/'.$user->id.'/edit') }}">
									<i class="pencil icon"></i>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ $users->links() }}
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
	});
</script>
@endpush