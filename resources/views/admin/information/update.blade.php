@extends('layouts.profile')

@section('title', 'Слайд')

@section('content')
<div class="eleven wide column">
	<form class="ui form green segment" action="{{ url('profile/information', $information->id) }}" method="POST">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<h4 class="ui header">Слайд засах</h4>
		<div class="ui divider"></div>
	    <div class="required field">
	    	<label>Гарчиг</label>
			<input type="text" name="title" value="{{ $information->title }}">
		</div>
	    <div class="required field">
	    	<label>Гарчиг (Англи)</label>
			<input type="text" name="title_en" value="{{ $information->title_en }}">
		</div>
	    <div class="required field">
	    	<label>Дэд гарчиг</label>
			<input type="text" name="subtitle" value="{{ $information->subtitle }}">
		</div>
	    <div class="required field">
	    	<label>Дэд гарчиг (Англи)</label>
			<input type="text" name="subtitle_en" value="{{ $information->subtitle_en }}">
		</div>
	    <div class="field">
	    	<label>Агуулга</label>
	    	<textarea name="content" id="editor">{{ $information->content }}</textarea>
		</div>
	    <div class="field">
	    	<label>Агуулга (Англи)</label>
	    	<textarea name="content_en" id="editor">{{ $information->content_en }}</textarea>
		</div>
        <div class="required field">
	    	<label>Зураг</label>
            <div class="ui segment">
                <a class="upload-browse">
                    <i class="plus icon"></i>
                </a>
                <div class="upload-zone">
		  			<div class="upload-zone-item">
		  				<img class="ui rounded image" src="{{ asset($information->image) }}">
		  			</div>
                </div>
                <input type="text" name="image" style="display: none" value="{{ $information->image }}" required>
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
	        $.ajax({
	            type: 'POST',
	            url: '{{ url("profile/information/photo") }}',    
	            data: new FormData($(this).closest('form')[0]),
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
		        subtitle: {
		            identifier: 'subtitle',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Дэд гарчиг оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        subtitle_en: {
		            identifier: 'subtitle_en',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Дэд гарчиг оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        }
		    },
		    onSuccess: function() {
		    	$('.ui.form button').addClass('loading disabled');
		    }
		});
	});
</script>
@endpush