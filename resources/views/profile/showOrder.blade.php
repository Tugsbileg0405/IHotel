@extends('layouts.profile')

@section('title', 'iHotel')

@section('content')
<div class="eleven wide column">
	@if ($orders->count() > 0)
		@foreach ($orders as $order)
			<div class="ui segment">					 
				<div class="ui divided items">
					<div class="item">
						<div class="image">
							<img class="ui top aligned medium image" src="{{ asset($order->hotel->cover_photo) }}">
						</div>
						<div class="content">
							<h4 class="header">
								@if (App::isLocale('en'))
									@if ($order->hotel->name_en)
										{{ $order->hotel->name_en }}
									@else
										{{ $order->hotel->name}}
									@endif
								@elseif (App::isLocale('mn'))
									{{ $order->hotel->name }}
								@endif
							</h4>
							<div class="meta">
								<div class="ui blue header">
									<i class="icon check"></i>
									{{ __('messages.The order number')}} - {{ $order->number }}
								</div>
							</div>
							<div class="extra">
								<div class="ui label">{{ __('messages.Check-in') }} - {{ $order->startdate }}</div>
								<div class="ui label">{{ __('messages.Check-out') }} - {{ $order->enddate }}</div>
							</div>
							<div class="extra">
								@if ($order->status == 1)
									<div class="ui left floated teal label">{{ __('messages.Checking') }}</div>
									<button class="ui primary right floated button open-CancelModal" data-id="{{ $order->id }}">{{ __('messages.Cancel')}}</button>
								@elseif ($order->status == 2)
									<div class="ui left floated green label">{{ __('messages.Approved') }}</div>
								@elseif ($order->status == 3)
									<div class="ui left floated red label">{{ __('messages.Canceled') }}</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
		{{ $orders->links() }}
	@else
		<div class="ui segment">{{ __('messages.You havent ordered yet') }}</div>
	@endif
</div>
<div id="cancel-modal" class="ui modal">
	<div class="header">{{ __('messages.Cancel order') }}</div>
	<div class="content">
		<p>{{ __('Are you sure to cancel the order?') }}</p>
	</div>
	<div class="actions">
		<a class="ui red negative button">{{ __('messages.No') }}</a>
		<a class="ui positive right labeled icon button">
			<i class="checkmark icon"></i>{{ __('messages.Yes') }}
		</a>
		<form action="" method="POST">
			{{ csrf_field() }}
		</form>
	</div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    $('.open-CancelModal').click(function() {
    	var button = $(this);
		var id = $(this).data('id');
		$('#cancel-modal').modal({
			onApprove : function() {
				button.addClass('loading disabled');
				$('#cancel-modal').find('form').attr('action', "{{ url('profile/orders/cancel')}}/" + id);
				$('#cancel-modal').find('form').submit();
			}
		}).modal('show');
	});
</script>
@endpush