@extends('layouts.profile')

@section('title', 'iHotel')

@section('content')
<div class="eleven wide column">
    <div class="ui green segment">
    	<h4 class="ui header">{{ $post->title }}</h4>
    	<div class="ui divider"></div>
    	<form class="ui form" action="{{ url('profile/posts', $post->id) }}" method="POST">
    		{{ csrf_field() }}
            {{ method_field('PUT') }}
    		<div class="two fields">
    			<div class="field  ">
    				<label>{{ __('messages.Title')}}</label>
    				<input type="text" name="title" value="{{ $post->title }}">
    			</div>
    		    <div class="required field">
    		    	<label>{{ __('messages.Category')}}</label>
    		    	<select class="ui fluid dropdown" name="category">
    		    		<option value="">{{ __('messages.Choose a category') }}!</option>
    		    		@foreach ($categories as $category)
                            @if(App::isLocale('en'))
    		    			<option value="{{ $category->id }}" {{ $post->category == $category ? 'selected':'' }}>{{ $category->name_en }}</option>
                            @elseif(App::isLocale('mn'))
                            <option value="{{ $category->id }}" {{ $post->category == $category ? 'selected':'' }}>{{ $category->name }}</option>
                            @endif
    		    		@endforeach
    		    	</select>
    			</div>
    		</div>
    	    <div class="required field">
    	    	<label>{{ __('messages.Description')}}</label>
    	    	<textarea name="content" id="editor">{{ $post->content }}</textarea>
    		</div>
    	    <div class="required field">
    	        <label>{{ __('messages.Short description')}}</label>
    	        <textarea name="excerpt">{{ $post->excerpt }}</textarea>
    	    </div>
            <div class="required field">
                <label>{{ __('messages.Cover photo')}}</label>
                <div class="ui segment">
                    <a class="upload-browse">
                        <i class="plus icon"></i>
                    </a>
                    <div class="upload-zone">
                        @foreach (unserialize($post->photos) as $photo)
                            <div class="upload-zone-item">
                                <img class="ui rounded image" src="{{ asset($photo) }}">
                                <input type="hidden" name="photos[]" value="{{ $photo }}">
                                <a class="upload-zone-button">
                                    <i class="close icon"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <input type="file" name="photo" style="display: none">
                </div>
            </div>
    		<button class="ui right floated primary button" type="submit">{{ __('messages.Save')}}</button>
    		<br></br>
    	</form>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    $('.upload-browse').click(function() {
        $(this).siblings('input[type=file]').click();
    });
    function isEmpty( el ){
        return !$.trim(el.html())
    }
    if (isEmpty($('.upload-zone'))) {
        $('.ui.form').find('button').addClass('disabled');
        if (isEmpty($('.upload-zone'))) {
            $('.ui.form').find('button').addClass('disabled');
        }
    }
    $('input[type=file]').change(function(){
        var segment = $(this).closest('.segment');
        var container = $(this).siblings('.upload-zone');
        segment.addClass('loading disabled');
        $.ajax({
            type: 'POST',
            url: '{{ url("profile/post/update/photo") }}',     
            data: new FormData($(this).closest('form')[0]),
            contentType: false,
            processData: false,
            context: this,
        }).done(function(data) {
            $(segment).removeClass('loading disabled');
            $(this).val('');
            $('<div class="upload-zone-item"><img class="ui rounded image" src="{{ asset("/") }}' + data.image + '"><input type="hidden" name="photos[]" value="' + data.image + '"><a class="upload-zone-button"><i class="close icon"></i></a></div>').appendTo(container).transition('scale in');
            $('.ui.form').find('button').removeClass('disabled');
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
                        prompt : '{{ __("form.Please enter a value") }}'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '{{ __("form.Please enter at most 191 characters") }}'
                    }
                ]
            },
            category: {
                identifier: 'category',
                rules: [
                    {
                        type   : 'empty',
                        prompt : '{{ __("form.Please enter a value") }}'
                    }
                ]
            },
            excerpt: {
                identifier: 'excerpt',
                rules: [
                    {
                        type   : 'empty',
                        prompt : '{{ __("form.Please enter a value") }}'
                    }
                ]
            },
        },
        onSuccess: function() {
            $(this).find('button').addClass('loading disabled');
        }
    });
    $(document).on('click', '.upload-zone-button', function() {
        $(this).closest('.upload-zone-item').remove();
    });
</script>
@endpush