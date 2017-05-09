@extends('layouts.hoteladmin')

@section('title', 'iHotel')

@section('content')
@include('profile.hotel.partials.header')
<div class="main-page">
	<div class="admin-header">
		<div class="admin-body">
			<div class="ui fluid stackable container">
				<div class="ui stackable column grid">
					<div class="sixteen wide column">
						<div id="context1">
							@include('profile.hotel.partials.menu')
							<div class="ui segment com-service">
								<div class="ui stackable grid search-form">
									<div class="eight wide column">{{ date('Y-m-d') }}
										<h4 class="ui header">Буудлын мэдээлэл</h4>
									</div>
								</div>
							</div>
							<div class="ui stackable grid">
								<div class="three wide column">
									@include('profile.hotel.partials.sidebar')
								</div>
								<div class="thirteen wide column">
									<table class="ui selectable table">
										<tbody>
											<tr>
												<td class="collapsing">
													<h5 class="ui header">Үндсэн зураг</h5>
												</td>
												<td>
													<div class="ui small images">
														<img class="ui rounded image" src="{{ asset($hotel->cover_photo) }}">
													</div>
												</td>
											</tr>
											<tr class="ihotel-blue">
												<td class="collapsing">
													<h5 class="ui header">Бусад зураг</h5>
												</td>
												<td>
													<div class="ui small images">
														@foreach (unserialize($hotel->other_photos) as $photo)
															<img class="ui rounded image" src="{{ asset($photo) }}">
														@endforeach
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<a class="ui primary right floated button" href="{{ url('hotel/photo', $hotel->id) }}">Засах</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@if (session()->has('status'))
	<div class="ui basic modal" id="success-message">
		<div class="ui icon header">
			<i class="green check icon"></i>
			{{ session('status') }}
		</div>
	</div>
@endif
@endsection

@push('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#success-message').modal('show');
	});
</script>
@endpush