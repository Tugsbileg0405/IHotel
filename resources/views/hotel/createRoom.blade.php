@extends('layouts.hotel')

@section('title', 'iHotel')

@section('content')
@include('hotel.sidebar')
<div class="twelve wide column">
	<div class="ui segment">
		<img class="ui centered tiny image hotel-add" src="{{ asset('img/marker.png') }}">
		@if ($total_room_number != $room_number)
			<form class="ui form" id="create-room-form" action="{{ url('hotel/room', $hotel->id) }}" method="POST">
				{{ csrf_field() }}
				<h6 class="ui horizontal header divider ihotel-title">Өрөөний товч мэдээлэл</h6>
				@if ($total_room_number > $room_number)
					<div class="ui yellow message">Та {{ $total_room_number -  $room_number }} өрөө бүртгэх шаарлагатай</div>
				@elseif ($total_room_number < $room_number)
					<div class="ui yellow message">Та {{ $room_number - $total_room_number }} өрөө илүү бүртгэсэн байна</div>
				@endif
				<div class="two fields">
					<div class="required field">
						<label>Өрөөний төрөл</label>
						<input type="text" name="name">
					</div>
					<div class="required field">
						<label>Өрөөний тоо</label>
						<input type="text" name="number">
					</div>
				</div>
				<div class="two fields">
					<div class="required field">
						<label>Орны төрөл</label>
						<select name="category" class="ui fluid dropdown">
							<option value="">Ороо сонгоно уу</option>
							@foreach ($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="required field">
						<label>Орны тоо</label>
						<input type="text" name="bed_number">
					</div>
				</div>
				<div class="two fields">
					<div class="required field">
						<label>Хүний тоо</label>
						<input type="text" name="people_number">
					</div>
					<div class="field">
						<div class="required field">
							<label>Өрөөний үнэ</label>
							<input type="text" name="price" placeholder="₮">
						</div>
						<div class="disabled field">
							<label>Өрөөний үнэ (1 хүний)</label>
							<input type="text" name="price_op" placeholder="₮">
						</div>
					</div>
				</div>
				<div class="ui right floated buttons">
					<button class="ui primary button" type="submit">Нэмэх</button>
				</div><br><br><br>
			</form>
		@endif
		@if ($rooms->count() > 0)
			<h6 class="ui horizontal header divider ihotel-title">Өрөөний мэдээлэл</h6>
			<table class="ui table">
				<thead>
					<tr>
						<th>Өрөөний төрөл</th>
						<th>Өрөөний тоо</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($rooms as $key => $room)
						<tr>
							<td>{{ $room->name }}</td>
							<td>{{ $room->number }}</td>
							<td>
								<a class="ui icon button open-EditModal" data-key="{{ $key }}">
									<i class="pencil icon"></i>
								</a>
								<a class="ui icon button" href="{{ url('hotel/room', $room->id) }}" 
									onclick="event.preventDefault();
             						document.getElementById('room-{{ $room->id }}').submit();">
									<i class="trash icon"></i>
								</a>
								<form id="room-{{ $room->id }}" action="{{ url('hotel/room', $room->id) }}" method="POST">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			@if ($total_room_number == $room_number)
				<div class="ui right floated buttons">
					<a class="ui ihotel-back button" href="{{ url('hotel/photo', $hotel->id) }}">Буцах</a>
					<div class="or"></div>
					<a class="ui primary button" 
						href="{{ url('hotel/room/service', $hotel->id) }}"
						onclick="$(this).addClass('loading disabled')">
						Дараах<i class="right chevron icon"></i>
					</a>
				</div>
			@else
				<div class="ui right floated buttons">
					<a class="ui ihotel-back button" href="{{ url('hotel/photo', $hotel->id) }}">Буцах</a>
					<div class="or"></div>
					<a class="ui primary disabled button">
						Дараах<i class="right chevron icon"></i>
					</a>
				</div>
			@endif<br><br>
		@endif
	</div>
</div>
<div class="ui modal" id="editModal">
	<i class="close icon"></i>
	<div class="header">Өрөөний мэдээлэл засах</div>
	<div class="content">
		<form class="ui form" id="edit-room-form" action="" method="POST">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="two fields">
				<div class="required field">
					<label>Өрөөний төрөл</label>
					<input type="text" name="name">
				</div>
				<div class="required field">
					<label>Өрөөний тоо</label>
					<input type="text" name="number">
				</div>
			</div>
			<div class="two fields">
				<div class="required field">
					<label>Орны төрөл</label>
					<select name="category" class="ui fluid dropdown">
						<option value="">Ороо сонгоно уу</option>
						@foreach ($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="required field">
					<label>Орны тоо</label>
					<input type="text" name="bed_number">
				</div>
			</div>
			<div class="two fields">
				<div class="required field">
					<label>Хүний тоо</label>
					<input type="text" name="people_number">
				</div>
				<div class="field">
					<div class="required field">
						<label>Өрөөний үнэ</label>
						<input type="text" name="price" placeholder="₮">
					</div>
					<div class="field">
						<label>Өрөөний үнэ (1 хүний)</label>
						<input type="text" name="price_op" placeholder="₮">
					</div>
				</div>
			</div>
			<div class="ui right floated buttons">
				<button class="ui primary button" type="submit">Хадгалах</button>
			</div><br><br><br>
		</form>
	</div>
</div>
@endsection

@push('script')
<script type="text/javascript">
	$('[name=people_number]').keyup(function() {
		if ($(this).val() > 1) {
			$('[name=price_op]').closest('.field').removeClass('disabled');
		}
		else {
			$('[name=price_op]').closest('.field').addClass('disabled');
		}
	});
	$('.open-EditModal').click(function(e) {
		var rooms = <?php echo json_encode($rooms) ?>;
		var key = $(this).data('key');
		$('#editModal').modal('show');
		if (rooms[key].people_number <= 1) {
			$('#edit-room-form').find('[name=price_op]').closest('.field').addClass('disabled');
		}
		else {
			$('#edit-room-form').find('[name=price_op]').closest('.field').removeClass('disabled');
		}
		$('#edit-room-form').attr('action', '{{ url("hotel/room") }}/' + rooms[key].id + '/{{ $hotel->id }}');
		$('#edit-room-form').find('[name=name]').val(rooms[key].name);
		$('#edit-room-form').find('[name=number]').val(rooms[key].number);
		$('#edit-room-form').find('[name=category]').dropdown('set selected', rooms[key].room_category_id);
		$('#edit-room-form').find('[name=bed_number]').val(rooms[key].bed_number);
		$('#edit-room-form').find('[name=people_number]').val(rooms[key].people_number);
		$('#edit-room-form').find('[name=price]').val(rooms[key].price);
		$('#edit-room-form').find('[name=price_op]').val(rooms[key].price_op);
		e.preventDefault();
	});
	$.fn.form.settings.rules.positive = function(value) {
		if (value == '') {
			return true;
		}
		else {
			if (value > 0) {
				return true;
			}
			return false;
		}
	}
	$('#create-room-form').form({
	    inline : true,
	    fields: {
	        name: {
	            identifier: 'name',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Өрөөний төрөл оруулна уу'
	                },
	                {
	                    type   : 'maxLength[191]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        number: {
	            identifier: 'number',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Өрөөний тоо оруулна уу'
	                },
	                {
		                type   : 'positive',
		                prompt : 'Өрөөний тоо оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        category: {
	            identifier: 'category',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Орны төрөл сонгоно уу'
	                }
	            ]
	        },
	        bed_number: {
	            identifier: 'bed_number',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Орны тоо оруулна уу'
	                },
	                {
		                type   : 'positive',
		                prompt : 'Орны тоо оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        people_number: {
	            identifier: 'people_number',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Хүний тоо оруулна уу'
	                },
	                {
		                type   : 'positive',
		                prompt : 'Хүний тоо оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        price: {
	            identifier: 'price',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Өрөөний үнэ оруулна уу'
	                },
	                {
		                type   : 'positive',
		                prompt : 'Өрөөний үнэ оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        price_op: {
	            identifier: 'price_op',
	            rules: [
	                {
		                type   : 'number',
		                prompt : 'Өрөөний үнэ оруулна уу'
	                },
	                {
		                type   : 'positive',
		                prompt : 'Өрөөний үнэ оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
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
	$('#edit-room-form').form({
	    inline : true,
	    fields: {
	        name: {
	            identifier: 'name',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Өрөөний төрөл оруулна уу'
	                },
	                {
	                    type   : 'maxLength[191]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        number: {
	            identifier: 'number',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Өрөөний тоо оруулна уу'
	                },
	                {
		                type   : 'positive',
		                prompt : 'Өрөөний тоо оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        category: {
	            identifier: 'category',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Орны төрөл сонгоно уу'
	                }
	            ]
	        },
	        bed_number: {
	            identifier: 'bed_number',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Орны тоо оруулна уу'
	                },
	                {
		                type   : 'positive',
		                prompt : 'Орны тоо оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        people_number: {
	            identifier: 'people_number',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Хүний тоо оруулна уу'
	                },
	                {
		                type   : 'positive',
		                prompt : 'Хүний тоо оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        price: {
	            identifier: 'price',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Өрөөний үнэ оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        price_op: {
	            identifier: 'price_op',
	            rules: [
	                {
		                type   : 'positive',
		                prompt : 'Өрөөний үнэ оруулна уу'
	                },
	                {
	                    type   : 'maxLength[10]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
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