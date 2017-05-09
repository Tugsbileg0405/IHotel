@extends('layouts.profile')

@section('title', 'Ханш')

@section('content')
<div class="eleven wide column">
	<form class="ui form green segment" action="{{ url('profile/option') }}" method="POST">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<h4 class="ui header">Ханш</h4>
		<div class="ui divider"></div>
    	<div class="required field">
    		<label>Долларын ханш (₮)</label>
			<input type="text" value="{{ $option->value }}" name="option-7">
		</div>
		<div class="field">
			<button class="ui button primary" type="submit">Хадгалах</button>
		</div>
	</form>
</div>
@endsection

@push('script')
<script type="text/javascript">
	$('.ui.form').form({
	    inline : true,
	    fields: {
	        option7: {
	            identifier: 'option-7',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Утга оруулна уу'
	                },
	                {
		                type   : 'number',
		                prompt : 'Тоо оруулна уу'
	                }
	            ]
	        },
	    },
	    onSuccess: function() {
	    	$('.ui.form button').addClass('loading disabled');
	    }
	});
</script>
@endpush