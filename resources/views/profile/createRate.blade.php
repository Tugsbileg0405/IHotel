@extends('layouts.profile')

@section('title', 'iHotel')

@section('content')
<div class="six wide column">
	<form class="ui form segment" id="rate-form">
		{{ csrf_field() }}
		<table class="ui very basic celled table">
			<thead>
				<tr>
					<th>
						@if (App::isLocale('en'))
							@if ($hotel->name_en)
								{{ $hotel->name_en }}
							@else
								{{ $hotel->name}}
							@endif
						@elseif (App::isLocale('mn'))
							{{ $hotel->name }}
						@endif
					</th>
					<th>{{ __('messages.Give a rating') }}</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<h4 class="ui image header">
							<div class="content">
								<div class="sub header">{{ __('messages.Hotel employees')}}</div>
							</div>
						</h4>
					</td>
					<td>
						<div class="field">
							<select class="ui dropdown" name="employees">
								<option value="">{{ __('messages.Choose a score')}}!</option>
								@for ($i=1; $i<=10; $i++)
									<option value="{{ $i }}"
										@if ($rate)
											{{ $rate->employees == $i ? 'selected' : '' }}
										@endif
									>{{ $i }}</option>
								@endfor
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<h4 class="ui image header">
							<div class="content">
								<div class="sub header">{{ __('messages.Room clarity')}}</div>
							</div>
						</h4>
					</td>
					<td>
						<div class="field">
							<select class="ui dropdown" name="fresh">
								<option value="">{{ __('messages.Choose a score')}}!</option>
								@for ($i=1; $i<=10; $i++)
									<option value="{{ $i }}"
										@if ($rate)
											{{ $rate->fresh == $i ? 'selected' : '' }}
										@endif
									>{{ $i }}</option>
								@endfor
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<h4 class="ui image header">
							<div class="content">
								<div class="sub header">{{ __('messages.Comfortable')}}</div>
							</div>
						</h4>
					</td>
					<td>
						<div class="field">
							<select class="ui dropdown" name="comfort">
								<option value="">{{ __('messages.Choose a score')}}!</option>
								@for ($i=1; $i<=10; $i++)
									<option value="{{ $i }}"
										@if ($rate)
											{{ $rate->comfort == $i ? 'selected' : '' }}
										@endif
									>{{ $i }}</option>
								@endfor
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<h4 class="ui image header">
							<div class="content">
								<div class="sub header">{{ __('messages.Location')}}</div>
							</div>
						</h4>
					</td>
					<td>
						<div class="field">
							<select class="ui dropdown" name="location">
								<option value="">{{ __('messages.Choose a score')}}!</option>
								@for ($i=1; $i<=10; $i++)
									<option value="{{ $i }}"
										@if ($rate)
											{{ $rate->location == $i ? 'selected' : '' }}
										@endif
									>{{ $i }}</option>
								@endfor
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<h4 class="ui image header">
							<div class="content">
								<div class="sub header">{{ __('messages.Room price')}}</div>
							</div>
						</h4>
					</td>
					<td>
						<div class="field">
							<select class="ui dropdown" name="price">
								<option value="">{{ __('messages.Choose a score')}}!</option>
								@for ($i=1; $i<=10; $i++)
									<option value="{{ $i }}"
										@if ($rate)
											{{ $rate->price == $i ? 'selected' : '' }}
										@endif
									>{{ $i }}</option>
								@endfor
							</select>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<button class="ui right floated primary button" type="submit">{{ __('messages.Send')}}</button>
		<br><br><br>
	</form>
</div>
<div class="five wide column">
	<form class="ui form segment" id="review-form">
		{{ csrf_field() }}
		<h4 class="ui header">{{ __('messages.Write a comment')}}</h4>
		<div class="field">
			<textarea name="content" rows="3">{{ $review ? $review->content : ''}}</textarea>
		</div>
		<button class="ui right floated primary button" type="submit">{{ __('messages.Send')}}</button>
		<br><br><br>
	</form>
</div>
<div class="ui basic modal" id="success-message">
	<div class="ui icon header">
		<i class="green check icon"></i>
		{{ __('messages.Successfully sent')}}
	</div>
</div>
<div class="ui basic modal" id="error-message">
	<div class="ui icon header">
		<i class="red close icon"></i>
		{{ __('messages.Error occured')}}
	</div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    $('#rate-form').submit(function(e) {
        e.preventDefault(); 
    }).form({
        inline: true,
        fields: {
            employees: {
                identifier: 'employees',
                rules: [
	                {
	                    type: 'empty',
                        prompt : '{{ __("form.Please select a score") }}'
	                }
                ]
            },
            fresh: {
                identifier: 'fresh',
                rules: [
	                {
	                    type: 'empty',
                        prompt : '{{ __("form.Please select a score") }}'
	                }
                ]
            },
            comfort: {
                identifier: 'comfort',
                rules: [
	                {
	                    type: 'empty',
                        prompt : '{{ __("form.Please select a score") }}'
	                }
                ]
            },
            location: {
                identifier: 'location',
                rules: [
	                {
	                    type: 'empty',
                        prompt : '{{ __("form.Please select a score") }}'
	                }
                ]
            },
            price: {
                identifier: 'price',
                rules: [
	                {
	                    type: 'empty',
                        prompt : '{{ __("form.Please select a score") }}'
	                }
                ]
            },
        },
        onSuccess: function() {
            $('#rate-form button').addClass('loading disabled');
            $.ajax({
                type: 'POST',
                url: '{{ url("profile/rate", $hotel->id) }}',
                data: $('#rate-form').serialize(),
                success: function() {
                    $('#rate-form button').removeClass('loading disabled');
                    $('#success-message').modal('show');
                },
                error: function(){
                    $('#rate-form button').removeClass('loading disabled');
                    $('#error-message').modal('show');
                }
            });
        }
    });
    $('#review-form').submit(function(e) {
        e.preventDefault(); 
    }).form({
        inline: true,
        fields: {
            content: {
                identifier: 'content',
                rules: [{
                    type: 'empty',
                    prompt: 'Сэтгэгдэл оруулна уу'
                }]
            },
        },
        onSuccess: function() {
            $('#review-form button').addClass('loading disabled');
            $.ajax({
                type: 'POST',
                url: '{{ url('profile/review', $hotel->id) }}',
                data: $('#review-form').serialize(),
                success: function() {
                    $('#review-form button').removeClass('loading disabled');
                    $('#success-message').modal('show');
                },
                error: function(){
                    $('#review-form button').removeClass('loading disabled');
                    $('#error-message').modal('show');
                }
            });
        }
    });
</script>
@endpush