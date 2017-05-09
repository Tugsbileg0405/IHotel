@extends('layouts.hotel')

@section('title', 'iHotel')

@section('content')
@include('hotel.sidebar')
<div class="twelve wide column">
	<form class="ui form segment" id="create-payment-form" action="{{ url('hotel/payment', $hotel->id) }}" method="POST">
		{{ csrf_field() }}
		<img class="ui centered tiny image hotel-add" src="{{ asset('img/marker.png') }}">
		<h6 class="ui horizontal header divider ihotel-title">Төлбөрийн нөхцөл</h6>
		<label>Үйлчлүүлэгчид кредит картаар тооцоо хийх боломжтой юу?</label>
		<div class="ui stackable grid">
			<div class="six column row">
				<div class="column">
					<div class="ui checkbox">
						<input type="checkbox" value="1" name="payments[]" class="hidden" {{ collect(unserialize($hotel->payment))->contains(1) ? 'checked' : '' }}>
						<label>
							<img class="ui  image" src="{{ asset('img/card1.svg') }}">
						</label>
					</div>
				</div>
				<div class="column">
					<div class="ui checkbox">
						<input type="checkbox" value="2" name="payments[]" class="hidden" {{ collect(unserialize($hotel->payment))->contains(2) ? 'checked' : '' }}>
						<label>
							<img class="ui  image" src="{{ asset('img/card2.svg') }}">
						</label>
					</div>
				</div>
				<div class="column">
					<div class="ui checkbox">
						<input type="checkbox" value="3" name="payments[]" class="hidden" {{ collect(unserialize($hotel->payment))->contains(3) ? 'checked' : '' }}>
						<label>
							<img class="ui  image" src="{{ asset('img/card3.svg') }}">
						</label>
					</div>
				</div>
				<div class="column">
					<div class="ui checkbox">
						<input type="checkbox" value="4" name="payments[]" class="hidden" {{ collect(unserialize($hotel->payment))->contains(4) ? 'checked' : '' }}>
						<label>
							<img class="ui  image" src="{{ asset('img/card4.svg') }}">
						</label>
					</div>
				</div>
				<div class="column">
					<div class="ui checkbox">
						<input type="checkbox" value="5" name="payments[]" class="hidden" {{ collect(unserialize($hotel->payment))->contains(5) ? 'checked' : '' }}>
						<label>
							<img class="ui  image" src="{{ asset('img/card5.svg') }}">
						</label>
					</div>
				</div>
				<div class="column">
					<div class="ui checkbox">
						<input type="checkbox" value="6" name="payments[]" class="hidden" {{ collect(unserialize($hotel->payment))->contains(6) ? 'checked' : '' }}>
						<label>
							<img class="ui  image" src="{{ asset('img/card6.svg') }}">
						</label>
					</div>
				</div>
			</div>
		</div>
		<h6 class="ui horizontal header divider ihotel-title">Урьдчилгаа төлбөр ба</h6>
		<div class="three fields">
			<div class="required field">
				<label>Ирэх өдрийн 18:00 цагаас өмнө</label>
				<select class="ui dropdown" name="co_day">
					<option value="">Сонгох</option>
					<option value="1" {{ $hotel->co_day == 1 ? 'selected' : '' }}>1 өдрийн өмнө</option>
					<option value="2" {{ $hotel->co_day == 2 ? 'selected' : '' }}>2 өдрийн өмнө</option>
					<option value="3" {{ $hotel->co_day == 3 ? 'selected' : '' }}>3 өдрийн өмнө</option>
					<option value="7" {{ $hotel->co_day == 7 ? 'selected' : '' }}>7 өдрийн өмнө</option>
					<option value="14" {{ $hotel->co_day == 14 ? 'selected' : '' }}>14 өдрийн өмнө</option>
				</select>
			</div>
			<div class="required field">
				<label>Цуцлаагүй бол</label>
				<select class="ui dropdown" name="co_payment">
					<option value="">Сонгох</option>
					<option value="Эхний шөнийн төлбөр" {{ $hotel->co_payment == 'Эхний шөнийн төлбөр' ? 'selected' : '' }}>Эхний шөнийн төлбөр</option>
					<option value="Бүтэн төлбөр" {{ $hotel->co_payment == 'Бүтэн төлбөр' ? 'selected' : '' }}>Бүтэн төлбөр</option>
				</select>
			</div>
			<div class="required field">
				<label>НӨАТ</label>
				<input type="text" value="10%" disabled>
			</div>
		</div>
		<div class="ui right floated buttons">
			<a class="ui ihotel-back button" href="{{ url('hotel/room/photo', $hotel->id) }}">Буцах</a>
			<div class="or"></div>
			<button class="ui primary button" type="submit">
				Дараах<i class="right chevron icon"></i>
			</button>
		</div><br><br>
	</form>
</div>
@endsection

@push('script')
<script type="text/javascript">
	$('#create-payment-form').form({
	    inline : true,
	    fields: {
	        co_day: {
	            identifier: 'co_day',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Утга сонгоно уу'
	                }
	            ]
	        },
	        co_payment: {
	            identifier: 'co_payment',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Утга сонгоно уу'
	                }
	            ]
	        },
	    },
	    onSuccess: function() {
	    	$(this).find('button').addClass('loading disabled');
	    },
		onFailure: function(formErrors, fields) {
			var element;
			$.each(fields, function(e) {
				element = $('[name=' + e + ']');
				if(element.closest('.field').hasClass('error')) {
					if (element.parent().hasClass('dropdown')) {
						$(window).scrollTop(element.parent().offset().top - $(window).height() / 2);
					}
					else {
						element.focus();
					}
					return false;
				}
			});
			return false;
		},
	});
</script>
@endpush