@extends('layouts.profile')

@section('title', 'iHotel')

@section('content')
<div class="eleven wide column">
	<div class="ui green segment">
		<h4 class="ui header"> {{ __('messages.Edit profile') }}</h4>
		<div class="ui divider"></div>
	    @if (session('status'))
	        <div class="ui success message">
               <i class="check icon"></i>{{ session('status') }}
	        </div>
	    @endif
		<form class="ui form" action="{{ url('profile') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="two fields">
				<div class="field">
					<label>{{ __('messages.Surname') }}</label>
					<input type="text" name="surname" placeholder="{{ __('messages.Surname') }}" value="{{ Auth::user()->surname }}">
				</div>
				<div class="field">
					<label>{{ __('messages.Name') }}</label>
					<input type="text" name="name" placeholder="{{ __('messages.Name') }}" value="{{ Auth::user()->name }}">
				</div>
			</div>
            <div class="field">
				<label>{{ __('messages.Profile picture') }}</label>
                <div class="ui segment">
                    <a class="upload-browse">
                        <i class="image icon"></i>
                    </a>
                    <div class="upload-zone">
                        <div class="upload-zone-item">
                            <img class="ui rounded image" src="{{ asset(Auth::user()->avatar) }}">
                        </div>
                    </div>
                    <input type="text" name="image" style="display: none" value="{{ Auth::user()->avatar }}" required>
                    <input type="file" name="photo" style="display: none">
                </div>
            </div>
            <div class="two fields">
    		    <div class="field">
    		    	<label>{{ __('messages.Sex') }}</label>
    		    	<select class="ui fluid dropdown" name="gender">
    		    		<option value="">{{ __('messages.Choose a sex') }}!</option>
    	    			<option value="female" {{ Auth::user()->gender == 'female' ? 'selected':'' }}>{{ __('messages.Female') }}</option>
    	    			<option value="male" {{ Auth::user()->gender == 'male' ? 'selected':'' }}>{{ __('messages.Male') }}</option>
    		    	</select>
    			</div>
                <div class="field">
                    <label>Country</label>
                    <select class="ui fluid dropdown" name="country">
                            <option value="">Select country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country }}" {{ Auth::user()->country == $country ? 'selected' : '' }}>{{ $country }}</option>
                            @endforeach
                    </select>
                </div>
            </div>
			<div class="two fields">
				<div class="field">
					<label>{{ __('messages.Phone') }}</label>
					<input type="text" name="phone_number" placeholder="{{ __('messages.Phone') }}" value="{{ Auth::user()->phone_number }}">
				</div>
				<div class="required field">
					<label>{{ __('messages.Email') }}</label>
					<input type="text" name="email" placeholder="{{ __('messages.Email') }}" value="{{ Auth::user()->email }}">
				</div>
			</div>
			<button class="ui right floated primary button" type="submit">{{ __('messages.Save') }}</button>
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
    $('input[type=file]').change(function(){
        var segment = $(this).closest('.segment');
        var container = $(this).siblings('.upload-zone');
        segment.addClass('loading disabled');
        formData = new FormData();
        formData.append('photo', $(this)[0].files[0]);
        formData.append('_token', '{{ csrf_token() }}');
        $.ajax({
            type: 'POST',
            url: '{{ url("profile/update/photo") }}',     
            data: formData,
            contentType: false,
            processData: false,
            context: this,
        }).done(function(data) {
            $('input[name=image]').val(data.image);
            $(segment).removeClass('loading disabled');
            $(container).empty();
            $(this).val('');
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
                        type   : 'maxLength[191]',
                        prompt : '{{ __("form.Please enter at most 191 characters") }}'
                    }
                ]
            },
            surname: {
                identifier: 'surname',
                rules: [
                    {
                        type   : 'maxLength[191]',
                        prompt : '{{ __("form.Please enter at most 191 characters") }}'
                    }
                ]
            },
            email: {
                identifier: 'email',
                rules: [
                    {
                        type: 'email',
                        prompt: '{{ __("form.Please enter your email") }}'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '{{ __("form.Please enter at most 191 characters") }}'
                    }
                ]
            },
            phone_number: {
                identifier: 'phone_number',
                rules: [
                    {
                        type   : 'maxLength[191]',
                        prompt : '{{ __("form.Please enter at most 191 characters") }}'
                    }
                ]
            },
        },
        onSuccess: function() {
            $(this).find('button').addClass('loading disabled');
        }
    });
</script>
@endpush