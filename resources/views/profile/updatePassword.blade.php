@extends('layouts.profile')

@section('title', 'iHotel')

@section('content')
<div class="eleven wide column">
    <div class="ui green segment">
    	<h4 class="ui header">{{ __('messages.Change password')}}</h4>
    	<div class="ui divider"></div>
        @if (session('status'))
            <div class="ui success message">
                <i class="check icon"></i>{{ session('status') }}
            </div>
        @endif
    	<form class="ui form" action="{{ url('profile/password') }}" method="POST">
    		{{ csrf_field() }}
            {{ method_field('PUT') }}
    		<div class="two fields">
    	        <div class="requried field">
    	            <input type="password" name="password" placeholder="{{ __('messages.Password')}}">
    	        </div>
    	        <div class="requried field">
    	            <input type="password" name="password_confirmation" placeholder="{{ __('messages.Confirm Password')}}">
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
    $('.ui.form').form({
        inline : true,
        fields: {
            password: {
                identifier: 'password',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Нууц үг оруулна уу'
                        prompt : '{{ __("form.Please enter your password") }}'
                    },
                    {
                        type   : 'minLength[6]',
                        prompt : '{{ __("form.Please enter at least 6 characters") }}'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '{{ __("form.Please enter at most 191 characters") }}'
                    }
                ]
            },
            password_confirmation: {
                identifier: 'password_confirmation',
                rules: [
                    {
                        type   : 'match[password]',
                        prompt : 'Нууц үг буруу байна'
                        prompt : '{{ __("form.Password doesnt match") }}'

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