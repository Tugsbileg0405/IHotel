@extends('layouts.profile')

@section('title', 'Үйлчилгээний нөхцөл')

@section('content')
<div class="eleven wide column">
	<form class="ui form green segment" action="{{ url('profile/term') }}" method="POST">
		{{ csrf_field() }}
		
		<h4 class="ui header">Үйлчилгээний нөхцөл нэмэх</h4>
		<div class="ui divider"></div>
	    <div class="required field">
	    	<label>Гарчиг</label>
			<input type="text" name="title">
		</div>
	    <div class="required field">
	    	<label>Гарчиг (Англи)</label>
			<input type="text" name="title_en">
		</div>
	    <div class="required field">
	    	<label>Агуулга</label>
	    	<textarea name="content"></textarea>
		</div>
	    <div class="required field">
	    	<label>Агуулга (Англи)</label>
	    	<textarea name="content_en"></textarea>
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
		        title: {
		            identifier: 'title',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Гарчиг оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        title_en: {
		            identifier: 'title_en',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Гарчиг оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        content: {
		            identifier: 'content',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Агуулга оруулна уу'
		                }
		            ]
		        },
		        content_en: {
		            identifier: 'content_en',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Агуулга оруулна уу'
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