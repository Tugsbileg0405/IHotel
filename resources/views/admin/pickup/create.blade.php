@extends('layouts.profile')

@section('title', 'Онгоцны буудлаас тосох үйлчилгээ')

@section('content')
<div class="eleven wide column">
	<form class="ui form green segment" action="{{ url('profile/pickup') }}" method="POST">
		{{ csrf_field() }}
		<h4 class="ui header">Онгоцны буудлаас тосох үйлчилгээ нэмэх</h4>
		<div class="ui divider"></div>
	    <div class="required field">
	    	<label>Нэр</label>
			<input type="text" name="name">
		</div>
	    <div class="required field">
	    	<label>Нэр (Англи)</label>
			<input type="text" name="name_en">
		</div>
	    <div class="required field">
	    	<label>Үнэ</label>
			<input type="number" name="price">
		</div>
		<div class="field">
			<button class="ui button primary" type="submit">Хадгалах</button>
		</div>
	</form>
</div>
@endsection

@push('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('.ui.form').form({
		    inline : true,
		    fields: {
		        name: {
		            identifier: 'name',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Нэр оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байна'
		                }
		            ]
		        },
		        name_en: {
		            identifier: 'name_en',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Нэр оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байна'
		                }
		            ]
		        },
		        price: {
		            identifier: 'price',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Үнэ оруулна уу'
		                },
		                {
		                    type   : 'number',
			                prompt : 'Үнэ оруулна уу'
		                }
		            ]
		        },
		    },
		    onSuccess: function() {
		    	$('.ui.form button').addClass('loading disabled');
		    }
		});
	});
</script>
@endpush