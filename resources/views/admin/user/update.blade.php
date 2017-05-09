@extends('layouts.profile')

@section('title', 'Хэрэглэгч')

@section('content')
<div class="eleven wide column">
	<div class="ui green segment">
		<table class="ui very basic collapsing celled table">
			<thead>
				<tr>
					<th>Хэрэглэгч</th>
					<th>Эрх</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<h4 class="ui image header">
							<img src="{{ asset($user->avatar) }}" class="ui mini rounded image">
							<div class="content">
								{{ $user->name }}
								<div class="sub header">{{ $user->email }}</div>
							</div>
						</h4>
					</td>
					<td>
						<span class="editable-role">
							{{ $user->is_admin ? 'Админ' : 'Хэрэглэгч' }}
						</span>
					</td>
				</tr>
			</tbody>
		</table>
		<h4 class="ui header">Хэрэглэгчийн эрх</h4>
		<div class="ui divider"></div>
		<form id="user-form" class="ui form">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="inline field">
				<div class="ui slider checkbox">
					<input type="checkbox" name="admin" tabindex="0" class="hidden" {{ $user->is_admin ? 'checked' : '' }}>
					<label class="editable-role">{{ $user->is_admin ? 'Админ' : 'Хэрэглэгч' }}</label>
				</div>
			</div>
		</form><br>
		<div id="message"></div>
	</div>
</div>
@endsection

@push('script')
<script type="text/javascript">
	$(document).ready(function() {
	    $('.checkbox').find('input[type=checkbox]').change(function() {
	    	$('.checkbox').addClass('disabled');
		    $.ajax({
				type: "POST",
				url: "{{ url('profile/user', $user->id) }}",
		       	data: $('#user-form').serialize(),
		       	success: function(data) {
	    			$('.checkbox').removeClass('disabled');
					$('.editable-role').html(data.status);
		   		},
				error: function(data){
	    			$('.checkbox').removeClass('disabled');
					var errors = data.responseJSON;
					var errorhtml = '<div class="ui warning message"><ul>';
			        $.each(errors, function( key, value ) {
			            errorhtml += '<li>' + value[0] + '</li>';
			        });
			        errorhtml += '</div></ul>';
		       		$('#message').html(errorhtml);
				}
			});
	    });
	});
</script>
@endpush