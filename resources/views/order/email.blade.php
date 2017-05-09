<html>

<head>
    <style>
        .column {
            float: left;
            width: 50%;
        }
    </style>
</head>

<body>
    <div class="column">
        <h4>{{ __('messages.Order information') }}</h4>
        <table border="0" cellspacing="0" cellpadding="5">
            <tbody>
                <tr>
                    <td colspan="2">
                        <p style="text-align:left">
                            <strong>
                             @if (App::isLocale('mn')) 
							 	{{ $order->hotel->name }}
							 @elseif (App::isLocale('en'))
                                @if($order->hotel->name_en)
									{{ $order->hotel->name_en }}
								@else
									{{$order->hotel->name}}
								@endif
							 @endif
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>{{ __('messages.The order number') }}:</td>
                    <td><strong>{{$order->number}}</strong></td>
                </tr>
                <tr>
                    <td>{{ __('messages.Phone') }}:</td>
                    <td><strong>{{$order->hotel->phone_number}}</strong></td>
                </tr>
                @if ($order->hotel->website)
                    <tr>
                        <td>{{ __('messages.Website') }}:</td>
                        <td><strong>{{$order->hotel->website}}</strong></td>
                    </tr>
                @endif
                <tr>
                    <td>{{ __('messages.Check-in') }}:</td>
                    <td><strong>{{$order->startdate}}</strong></td>
                </tr>
                <tr>
                    <td>{{ __('messages.Check-out') }}:</td>
                    <td><strong>{{$order->enddate}}</strong></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="column">
        <h4>{{ __('messages.Ordered rooms') }}</h4>
        <table border="1" cellspacing="0" cellpadding="8">
            <thead>
                <tr>
                    <th>{{ __('messages.Room name') }}</th>
                    <th>{{ __('messages.Rooms') }}</th>
                    <th>{{ __('messages.Cost of per night') }}</th>
                    <th>{{ __('messages.Day') }}</th>
                    <th>{{ __('messages.Total') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                    <tr>
                        <td>{{$room->name}}</td>
                        <td>{{$room->ordered_number}}</td>
                        @if (App::isLocale('mn')) 
                            @if($room->saled_room)
                                <td>{{number_format($room->saled_room->price)}} ₮</td>
                            @else
                                <td>{{number_format($room->price)}} ₮</td>
                            @endif
                        @elseif (App::isLocale('en'))
                            @if($room->saled_room)
                                <td>{{number_format($room->saled_room->price/$order->dollar_rate,2)}} ₮</td>
                            @else
                                <td>{{number_format($room->price/$order->dollar_rate,2)}} $</td>
                            @endif
                        @endif
                        <td>{{ $order->day }}</td>
                        @if (App::isLocale('mn')) 
                            @if($room->saled_room)
                                <td>{{number_format($room->saled_room->price * $room->ordered_number * $order->day)}} ₮</td>
                            @else
                                <td>{{number_format($room->price * $room->ordered_number * $order->day)}} ₮</td>
                            @endif
                        @elseif (App::isLocale('en'))
                            @if($room->saled_room)
                                <td>{{number_format($room->saled_room->price * $room->ordered_number * $order->day/$order->dollar_rate,2)}} $</td>
                            @else
                                <td>{{number_format($room->price * $room->ordered_number * $order->day/$order->dollar_rate,2)}} $</td>
                            @endif
                        @endif
                    </tr>
                @endforeach
                @if (unserialize($order->pickup))
                    <tr>
                        <td colspan="2">{{ __('messages.Pickup service') }}</td>
                        @if (App::isLocale('mn'))
                            <td colspan="3">{{ unserialize($order->pickup)['name'] }}</td>
                        @elseif (App::isLocale('en'))
                            <td colspan="3">{{ unserialize($order->pickup)['name_en'] }}</td>
                        @endif
                    </tr>
                @endif
                <!--<tr>
                    <td colspan="2">{{ __('messages.Price before tax') }} ({{ __('messages.Tax') }} 10%)</td>
                    @if ($order->dollar_rate) 
                        <td colspan="3">{{number_format($price/$order->dollar_rate,2)}} $ ({{number_format($price*0.1/$order->dollar_rate,2)}} $)</td>
                    @else
                        <td colspan="3">{{number_format($price)}} ₮ ({{number_format($price*0.1)}} ₮)</td>
                    @endif
                </tr>-->
                <tr>
                    <td colspan="2">{{ __('messages.Price after tax') }}</td>
                    @if ($order->price_dollar) 
                        <td colspan="3">{{number_format($order->price_dollar)}} $</td>
                    @else
                        <td colspan="3">{{number_format($order->price)}} ₮</td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>