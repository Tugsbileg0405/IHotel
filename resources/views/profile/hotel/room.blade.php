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
										<h4 class="ui header">Өрөөний мэдээлэл</h4>
									</div>
								</div>
							</div>
							<div class="ui stackable grid">
								@if ($rooms->count() > 0)
									@foreach ($rooms as $room)
										<div class="sixteen wide column">
											<div class="ui segment">
												<div class="ui stackable column grid">
													<div class="four wide column">
														<img class="ui image" src="{{asset(unserialize($room->photos)[0])}}">
													</div>
													<div class="six wide column">
														<div class="ui large header">{{ $room->name }} - {{ number_format($room->price) }}₮/хоног</div>
														<p class="ui justify">{{ $room->introduction }}</p>
														<div class="ui horizontal list">
															<div class="item">
																<i class="circular user icon"></i>
																<div class="middle aligned content">x{{ $room->people_number }}</div>
															</div>
															<div class="item">
																<i class="circular hotel icon"></i>
																<div class="middle aligned content">x{{ $room->bed_number }}</div>
															</div>
															<div class="item">
																<i class="circular expand icon"></i>
																<div class="middle aligned content">{{ $room->size }} m2</div>
															</div>
														</div>
														<div class="ui hidden divider">
															<a class="ui primary button" href="{{ url('hotel/room/service', $hotel->id) }}">Засах</a>
														</div>
													</div>
													<div class="six wide column">
														<h4 class="ui header">Өрөө хаах</h4>
														<form class="close-room-form ui form" action="{{ url('admin/hotel/room/close', $room->id) }}" method="POST">
															{{ csrf_field() }}
															<div class="field">
																<div class="ui fluid left icon input">
																	<input type="text" class="close" placeholder="mm/dd/yyyy - mm/dd/yyyy" name="closedate" value="" data-id="{{ $room->id }}">
																	<i class="calendar icon"></i>
																	<input type="hidden" name="startdate">
																	<input type="hidden" name="enddate">
																</div>
															</div>
															<div class="field" id="checked-select-{{ $room->id }}">
																<select class="ui dropdown disabled" name="number">
																	<option value="">Өрөөний тоо</option>
																</select>
															</div>
															<div class="field">
																<button class="ui red button" type="submit">Хадгалах</button>
															</div>
														</form>
														<h4 class="ui header">Өрөөний үнэ өөрчлөх</h4>
														<form class="sale-room-form ui form" action="{{ url('admin/hotel/room/sale', $room->id) }}" method="POST">
															{{ csrf_field() }}
															<div class="field">
																<div class="ui fluid left icon input">
																	<input type="text" class="sale" name="saledate" placeholder="mm/dd/yyyy - mm/dd/yyyy" value="" data-id="{{ $room->id }}">
																	<i class="calendar icon"></i>
																	<input type="hidden" name="startdate">
																	<input type="hidden" name="enddate">
																</div>
															</div>
															@if ($room->price_op)
																<div class="two fields">
																	<div class="field" id="checked-input-{{ $room->id }}">
																		<input type="text" name="price" placeholder="Үнэ (₮)" disabled="true">
																	</div>
																	<div class="field" id="checked-input-{{ $room->id }}">
																		<input type="text" name="price_op" placeholder="Үнэ - 1 Хүний (₮)" disabled="true">
																	</div>
																</div>
															@else
																<div class="field" id="checked-input-{{ $room->id }}">
																	<input type="text" name="price" placeholder="Үнэ (₮)" disabled="true">
																</div>
															@endif
															<div class="field">
																<button class="ui red button" type="submit">Хадгалах</button>
															</div>
														</form>
													</div>
												</div>
												<div class="closedRooms">
													@if ($room->closes->count() > 0)
														<div class="ui divider"></div>
														<h4 class="ui header">Өрөөний хаалт</h4>
														<table class="ui stackable selectable table">
															<thead>
																<tr>
																	<th>Өрөөний тоо</th>
																	<th>Эхлэх өдөр</th>
																	<th>Дуусах өдөр</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
																@foreach ($room->closes as $close)
																	<tr>
																		<td>{{ $close->number }} өрөө</td>
																		<td>{{ $close->startdate }}</td>
																		<td>{{ $close->enddate }}</td>
																		<td>
																			<button class="ui red button" data-id="{{ $close->id }}" type="button">Цуцлах</button>
																		</td>
																	</tr>
																@endforeach
															</tbody>
														</table>
													@endif
												</div>
												<div class="saledRooms">
													@if ($room->sales->count() > 0)
														<div class="ui divider"></div>
														<h4 class="ui header">Өрөөний үнэ</h4>
														<table class="ui stackable selectable table">
															<thead>
																<tr>
																	<th>Өрөөний үнэ</th>
																	<th>Эхлэх өдөр</th>
																	<th>Дуусах өдөр</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
																@foreach ($room->sales as $sale)
																	<tr>
																		<td>{{ $sale->price }}₮</td>
																		<td>{{ $sale->startdate }}</td>
																		<td>{{ $sale->enddate }}</td>
																		<td>
																			<button class="ui red button" data-id="{{ $sale->id }}" type="button">Цуцлах</button>
																		</td>
																	</tr>
																@endforeach
															</tbody>
														</table>
													@endif
												</div>
											</div>
										</div>
									@endforeach
								@else
									<div class="sixteen wide column">
										<div class="ui segment">
											Та өрөө бүртгүүлээгүй байна. <a href="{{ url('hotel/room', $hotel->id) }}">Энд</a> дарж бүртгүүлнэ үү.
										</div>
									</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="cancel-modal" class="ui modal">
	<div class="header">Цуцлах</div>
	<div class="content">
		<p>Та үүнийг цуцлахыг зөвшөөрч байна уу?</p>
	</div>
	<div class="actions">
		<a class="ui red negative button">Үгүй</a>
		<a class="ui positive right labeled icon button">
			<i class="checkmark icon"></i>Тийм
		</a>
		<form action="" method="POST">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
		</form>
	</div>
</div>
@endsection

@push('script')
<script type="text/javascript">
	$(document).ready(function() {
	    $('.close').daterangepicker({
			autoApply: true,
			autoUpdateInput: false,
	    });
	    $('.sale').daterangepicker({
			autoApply: true,
			autoUpdateInput: false,
	    });
		$('.close').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
			id = $(this).data('id');
			$('#checked-select-' + id).find('select').addClass('disabled');
			var startdate = picker.startDate.format('YYYY-MM-DD');
			var enddate = picker.endDate.format('YYYY-MM-DD');
			$(this).siblings('input[name=startdate]').val(startdate);
			$(this).siblings('input[name=enddate]').val(enddate);
			$.ajax({
				method: 'POST',
				url: '{{ url("admin/hotel/room/close/check") }}/' + id,
				data: $(this).closest('form').serialize(),
			}).done(function(data) {
				$('#checked-select-' + id).html(data);
				$('.ui.dropdown').dropdown('refresh');
				$('.ui.form').form('refresh');
			}).fail(function() {
				$('#checked-select-' + id).append('<div class="ui visible warning message"><p>Алдаа гарлаа</p></div>');
			});
		});
		$('.sale').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
			id = $(this).data('id');
			$('#checked-input-' + id).find('input').attr('disabled', true);
			var startdate = picker.startDate.format('YYYY-MM-DD');
			var enddate = picker.endDate.format('YYYY-MM-DD');
			$(this).siblings('input[name=startdate]').val(startdate);
			$(this).siblings('input[name=enddate]').val(enddate);
			$.ajax({
				method: 'POST',
				url: '{{ url("admin/hotel/room/sale/check") }}/' + id,
				data: $(this).closest('form').serialize(),
			}).done(function(data) {
				$('#checked-input-' + id).html(data);
				$('.ui.form').form('refresh');
			}).fail(function() {
				$('#checked-input-' + id).append('<div class="ui visible warning message"><p>Алдаа гарлаа</p></div>');
			});
		});
		$('.close-room-form').form({
		    inline : true,
		    fields: {
		        number: {
		            identifier: 'number',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Өрөөний тоо сонгоно уу'
		                }
		            ]
		        },
		        closedate: {
		            identifier: 'closedate',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Огноо сонгоно уу'
		                },
		            ]
		        },
		    },
		    onSuccess: function(e) {
		    	$(this).find('button').addClass('loading disabled');
			    $.ajax({
					type: $(this).attr('method'),
					url: $(this).attr('action'),
		           	data: $(this).serialize(),
	            	context: this,
		           	success: function(data) {
		           		$(this).closest('.ui.grid').siblings('.closedRooms').html(data);
		    			$(this).find('button').removeClass('loading disabled');
		       		},
					error: function(){
		    			$(this).find('button').removeClass('loading disabled');
					}
				});
		    	e.preventDefault();
		    }
		});
		$('.sale-room-form').form({
		    inline : true,
		    fields: {
		        price: {
		            identifier: 'price',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Өрөөний үнэ оруулна уу'
		                },
		                {
		                    type   : 'number',
		                    prompt : 'Өрөөний үнэ оруулна уу'
		                }
		            ]
		        },
		        saledate: {
		            identifier: 'saledate',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Огноо сонгоно уу'
		                },
		            ]
		        },
		    },
		    onSuccess: function(e) {
		    	$(this).find('button').addClass('loading disabled');
			    $.ajax({
					type: $(this).attr('method'),
					url: $(this).attr('action'),
		           	data: $(this).serialize(),
	            	context: this,
		           	success: function(data) {
		           		$(this).closest('.ui.grid').siblings('.saledRooms').html(data);
		    			$(this).find('button').removeClass('loading disabled');
		       		},
					error: function(){
		    			$(this).find('button').removeClass('loading disabled');
					}
				});
		    	e.preventDefault();
		    }
		});
	    $('.closedRooms').on('click', '.red.button', function() {
			cancelButton = $(this);
			var id = cancelButton.data('id');
			$('#cancel-modal').modal({
				onApprove : function() {
					$('#cancel-modal').find('form').attr('action', "{{ url('admin/hotel/room/close') }}/" + id);
				    $.ajax({
						type: $('#cancel-modal').find('form').attr('method'),
						url: $('#cancel-modal').find('form').attr('action'),
			           	data: $('#cancel-modal').find('form').serialize(),
			           	success: function(data) {
			           		cancelButton.closest('.closedRooms').html(data);
			       		},
					});
				}
			}).modal('show');
		});
	    $('.saledRooms').on('click', '.red.button', function() {
			cancelButton = $(this);
			var id = cancelButton.data('id');
			$('#cancel-modal').modal({
				onApprove : function() {
					$('#cancel-modal').find('form').attr('action', "{{ url('admin/hotel/room/sale') }}/" + id);
				    $.ajax({
						type: $('#cancel-modal').find('form').attr('method'),
						url: $('#cancel-modal').find('form').attr('action'),
			           	data: $('#cancel-modal').find('form').serialize(),
			           	success: function(data) {
			           		cancelButton.closest('.saledRooms').html(data);
			       		},
					});
				}
			}).modal('show');
		});
	});
</script>
@endpush