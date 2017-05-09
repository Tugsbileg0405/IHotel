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
									<div class="four wide column">{{ date('Y-m-d') }}
										<h4 class="ui header">Үйлчлүүлэгчдийн сэтгэгдэл</h4>
									</div>
									<div class="eight wide column">
										<h4 class="ui left floated header">Зочид буудлын оноо - Нийт <label class="com-label">10</label> онооноос <label class="com-label">{{ $total }}</label> байна.
										</h4>
									</div>
								</div>
							</div>
							<div class="sixteen wide column">
								<div class="ui segment">
									@if ($rates->count() > 0)
										<div class="ui middle aligned divided list">
											<table class="ui very basic table">
												<tbody>
													<tr>
														<td class="collapsing"><h5 class="ui header">Буудлын ажилчид</h5></td>
														<td>
															<div class="ui small yellow progress" data-value="{{ $employees }}" data-total="10" id="example1">
																<div class="bar">
																	<div class="progress"></div>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td class="collapsing"><h5 class="ui header">Өрөөний цэвэр ахуй</h5></td>
														<td>
															<div class="ui small yellow progress" data-value="{{ $fresh }}" data-total="10" id="example3">
																<div class="bar">
																	<div class="progress"></div>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td class="collapsing"><h5 class="ui header">Тав тух</h5></td>
														<td>
															<div class="ui small yellow progress" data-value="{{ $comfort }}" data-total="10" id="example4">
																<div class="bar">
																	<div class="progress"></div>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td class="collapsing"><h5 class="ui header">Байршил</h5></td>
														<td>
															<div class="ui small yellow progress" data-value="{{ $location }}" data-total="10" id="example5">
																<div class="bar">
																	<div class="progress"></div>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td class="collapsing"><h5 class="ui header">Өрөөний үнэ</h5></td>
														<td>
															<div class="ui small yellow progress" data-value="{{ $price }}" data-total="10" id="example6">
																<div class="bar">
																	<div class="progress"></div>
																</div>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									@else
										Оноо өгсөн хэрэглэгч олдсонгүй.
									@endif
								</div>
							</div><br>
							<div class="ui stackable grid">
								@foreach ($rates as $rate)
									<div class="eight wide column">
										<div class="ui segment user-comment">
											{{ date('Y-m-d', strtotime($rate->created_at)) }}
											<div class="ui clearing">
												<h4 class="ui left floated header">
												<img class="ui avatar image" src="{{ asset($rate->user->avatar) }}">{{ $rate->user->name }}
												</h4>
												<h2 class="ui right floated header">
													{{ ($rate->employees + $rate->fresh + $rate->comfort + $rate->location + $rate->price) / 5 }}
												</h2>
											</div>
											<div class="ui middle aligned divided list">
												<table class="ui very basic table">
													<tbody>
														<tr>
															<td class="collapsing"><h5 class="ui header">Буудлын ажилчид</h5></td>
															<td>
																<div class="ui small yellow progress" data-value="{{ $rate->employees }}" data-total="10" id="example1">
																	<div class="bar">
																		<div class="progress"></div>
																	</div>
																</div>
															</td>
														</tr>
														<tr>
															<td class="collapsing"><h5 class="ui header">Өрөөний цэвэр ахуй</h5></td>
															<td>
																<div class="ui small yellow progress" data-value="{{ $rate->fresh }}" data-total="10" id="example3">
																	<div class="bar">
																		<div class="progress"></div>
																	</div>
																</div>
															</td>
														</tr>
														<tr>
															<td class="collapsing"><h5 class="ui header">Тав тух</h5></td>
															<td>
																<div class="ui small yellow progress" data-value="{{ $rate->comfort }}" data-total="10" id="example4">
																	<div class="bar">
																		<div class="progress"></div>
																	</div>
																</div>
															</td>
														</tr>
														<tr>
															<td class="collapsing"><h5 class="ui header">Байршил</h5></td>
															<td>
																<div class="ui small yellow progress" data-value="{{ $rate->location }}" data-total="10" id="example5">
																	<div class="bar">
																		<div class="progress"></div>
																	</div>
																</div>
															</td>
														</tr>
														<tr>
															<td class="collapsing">
																<h5 class="ui header">Өрөөний үнэ</h5>
															</td>
															<td>
																<div class="ui small yellow progress" data-value="{{ $rate->price }}" data-total="10" id="example6">
																	<div class="bar">
																		<div class="progress"></div>
																	</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection