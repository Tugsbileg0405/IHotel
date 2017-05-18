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
										<h4 class="ui header">Англи танилцуулга оруулах</h4>
									</div>
								</div>
							</div>
							<div class="ui stackable grid">
								<div class="sixteen wide column">
									<div class="ui segment">
										<form id="hotel-form-en" class="ui form" action="{{ url('admin/hotel/en', $hotel->id) }}" method="POST">
											{{ csrf_field() }}
											<h6 class="ui horizontal header divider ihotel-title">Буудлын мэдээлэл</h6>
											<div class="fields">
												<div class="required eight wide field">
													<label>Буудлын нэр</label>
													<input type="text" name="name" value="{{ $hotel->name_en }}">
												</div>
												<div class="required eight wide field">
													<label>Холбоо барих ажилтны нэр</label>
													<input type="text" name="contact" value="{{ $hotel->contact_en }}">
												</div>
											</div>
											<div class="required field">
												<label>Хаяг</label>
												<textarea name="address">{{ $hotel->address_en }}</textarea>
											</div>
											<h6 class="ui horizontal header divider ihotel-title">Буудлын нэмэлт мэдээлэл</h6>
											<div class="required field">
												<label>Танилцуулга</label>
												<textarea name="introduction" class="editor">{{ $hotel->introduction_en }}</textarea>
											</div>
											<div class="field">
												<label>Бусад нэмэлт мэдээллүүд</label>
												<textarea name="other_service" class="editor">{{ $hotel->other_service_en }}</textarea>
											</div>
											<h6 class="ui horizontal header divider ihotel-title">Өрөөний танилцуулга</h6>
											@foreach ($hotel->rooms as $room)
												<div class="required field">
													<label>{{ $room->name }}</label>
													<textarea name="room-introduction-{{ $room->id }}" class="editor">{{ $room->introduction_en }}</textarea>
												</div>
											@endforeach
											<h6 class="ui horizontal header divider ihotel-title">Бусад мэдээлэл</h6>
											<div class="field">
												<textarea name="other_info" placeholder="Нэмэлт мэдээлэл" class="editor">{{ $hotel->other_info_en }}</textarea>
											</div>
											<div class="field">
												<button class="ui right floated primary button" type="submit">Хадгалах</button>
											</div><br><br>
										</form>
									</div>
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
		$('#hotel-form-en').form({
		    inline : true,
		    fields: {
		        name: {
		            identifier  : 'name',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Please enter a name'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Please enter at most 191 characters'
		                }
		            ]
		        },
		        contact: {
		            identifier  : 'contact',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Please enter a contact name'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Please enter at most 191 characters'
		                }
		            ]
		        },
		        address: {
		            identifier  : 'address',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Please enter an address'
		                },
		                {
		                    type   : 'minLength[6]',
		                    prompt : 'Please enter at least 6 characters'
		                }
		            ]
		        },
		        introduction: {
		            identifier  : 'introduction',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Please enter an introduction'
		                },
		                {
		                    type   : 'minLength[6]',
		                    prompt : 'Please enter at least 6 characters'
		                }
		            ]
		        },
				@foreach ($hotel->rooms as $room)
			        introduction{{ $room->id }}: {
			            identifier  : 'room-introduction-{{ $room->id }}',
			            rules: [
			                {
			                    type   : 'empty',
			                    prompt : 'Please enter an introduction'
			                }
			            ]
			        },
		        @endforeach
		    },
		    onSuccess: function(e) {
		    	$(this).find('button').addClass('loading disabled');
		    }
		});
	});
</script>
@endpush