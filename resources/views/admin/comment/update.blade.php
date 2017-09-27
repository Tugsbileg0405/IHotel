@extends('layouts.profile')

@section('title', 'Сэтгэгдэл')

@section('content')
<div class="eleven wide column">
	<form class="ui form green segment" action="{{ url('profile/comment', $comment->id) }}" method="POST">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<h4 class="ui header">Сэтгэгдэл засах</h4>
		<div class="ui divider"></div>
	    <div class="required field">
	    	<label>Нэр</label>
			<input type="text" name="name" value="{{ $comment->name }}">
		</div>
	    <div class="required field">
	    	<label>Нэр (Англи)</label>
			<input type="text" name="name_en" value="{{ $comment->name_en }}">
		</div>
	    <div class="required field">
	    	<label>Тайлбар</label>
			<input type="text" name="description" value="{{ $comment->description }}">
		</div>
	    <div class="required field">
	    	<label>Тайлбар (Англи)</label>
			<input type="text" name="description_en" value="{{ $comment->description_en }}">
		</div>
	    <div class="required field">
	    	<label>Агуулга</label>
			<textarea name="content">{{ $comment->content }}</textarea>
		</div>
	    <div class="required field">
	    	<label>Агуулга (Англи)</label>
			<textarea name="content_en">{{ $comment->content_en }}</textarea>
		</div>
        <div class="required field">
	    	<label>Зураг</label>
            <div class="ui segment">
                <a class="upload-browse">
                    <i class="plus icon"></i>
                </a>
                <div class="upload-zone">
		  			<div class="upload-zone-item">
		  				<img class="ui rounded image" src="{{ asset($comment->photo) }}">
		  			</div>
                </div>
                <input type="text" name="image" style="display: none" value="{{ $comment->photo }}" required>
                <input type="file" name="photo" style="display: none">
            </div>
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
	    $('.upload-browse').click(function() {
	        $(this).siblings('input[type=file]').click();
	    });
	    $('input[type=file]').change(function(){
	        var segment = $(this).closest('.segment');
	        var container = $(this).siblings('.upload-zone');
	        segment.addClass('loading disabled');
            formData = new FormData();
            formData.append('photo', $(this)[0].files[0]);
            formData.append('_token', '{{ csrf_token() }}');
	        $.ajax({
	            type: 'POST',
	            url: '{{ url("profile/comment/photo") }}',    
	            data: formData,
	            contentType: false,
	            processData: false,
	            context: this,
	        }).done(function(data) {
	            $('input[name=image]').val(data.image);
	            $(segment).removeClass('loading disabled');
	            $(this).val('');
	            $(container).empty();
	            $('<div class="upload-zone-item"><img class="ui rounded image" src="{{ asset("/") }}' + data.image + '"></div>').appendTo(container).transition('scale in');
	        }).fail(function() {
	            $(segment).removeClass('loading disabled');
	            $(this).val('');
	            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);

	        });
	    });
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
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
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
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        description: {
		            identifier: 'description',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Тайлбар оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        description_en: {
		            identifier: 'description_en',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Тайлбар оруулна уу'
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