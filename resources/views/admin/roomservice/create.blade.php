@extends('layouts.profile')

@section('title', 'Өрөөний үйлчилгээ')

@section('content')
<div class="eleven wide column">
	<form class="ui form green segment" action="{{ url('profile/roomservice') }}" method="POST">
		{{ csrf_field() }}
		<h4 class="ui header">Өрөөний үйлчилгээ нэмэх</h4>
		<div class="ui divider"></div>
	    <div class="required field">
			<select class="ui disabled fluid dropdown error" name="category">
				<option value="{{ $category->id }}">{{ $category->name }}</option>
			</select>
		</div>
	    <div class="requried field">
	    	<label>Нэр</label>
			<input type="text" name="name">
		</div>
	    <div class="requried field">
	    	<label>Нэр (Англи)</label>
			<input type="text" name="name_en">
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
			                prompt : 'Үйлчилгээ оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        name_en: {
		            identifier: 'name_en',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Үйлчилгээ оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
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