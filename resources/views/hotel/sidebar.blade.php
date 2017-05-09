<div class="sixteen wide column ihotel-progress">
    <div class="ui tiny green progress" data-value="
    	{{ $hotel->step == 2 ? '20' : '' }}
    	{{ $hotel->step == 3 ? '30' : '' }}
    	{{ $hotel->step == 4 ? '40' : '' }}
    	{{ $hotel->step == 5 ? '50' : '' }}
    	{{ $hotel->step == 6 ? '60' : '' }}
    	{{ $hotel->step == 7 ? '80' : '' }}
    	{{ $hotel->co_day ? '90' : '' }}" data-total="100">
        <div class="bar"></div>
    </div>
</div>
<div class="four wide column">
    <div class="ui fluid vertical pointing menu">
        <a class="item{{ Request::is('hotel/update/'.$hotel->id) ? ' active': '' }}{{ $hotel->step >= 1 ? '' : ' disabled'  }}" href="{{ url('hotel/update', $hotel->id) }}">
            Үндсэн мэдээлэл
            @if ($hotel->step > 1)
				<i class="icon large green check circle"></i>
            @endif
        </a>
        <a class="item{{ Request::is('hotel/service/'.$hotel->id) ? ' active': '' }}{{ $hotel->step >= 2 ? '' : ' disabled'  }}" href="{{ url('hotel/service', $hotel->id) }}">
            Буудлын мэдээлэл
            @if ($hotel->step > 2)
				<i class="icon large green check circle"></i>
            @endif
        </a>
        <a class="item{{ Request::is('hotel/photo/'.$hotel->id) ? ' active': '' }}{{ $hotel->step >= 3 ? '' : ' disabled'  }}" href="{{ url('hotel/photo', $hotel->id) }}">
            Буудлын зураг
            @if ($hotel->step > 3)
				<i class="icon large green check circle"></i>
            @endif
        </a>
        <a class="item{{ Request::is('hotel/room/'.$hotel->id) ? ' active': '' }}{{ $hotel->step >= 4 ? '' : ' disabled'  }}" href="{{ url('hotel/room', $hotel->id) }}">
            Өрөөний товч мэдээлэл
            @if ($hotel->step > 4)
				<i class="icon large green check circle"></i>
            @endif
        </a>
        <a class="item{{ Request::is('hotel/room/service/'.$hotel->id) ? ' active': '' }}{{ $hotel->step >= 5 ? '' : ' disabled'  }}" href="{{ url('hotel/room/service', $hotel->id) }}">
            Өрөөний дэлгэрэнгүй
            @if ($hotel->step > 5)
				<i class="icon large green check circle"></i>
            @endif
        </a>
        <a class="item{{ Request::is('hotel/room/photo/'.$hotel->id) ? ' active': '' }}{{ $hotel->step >= 6 ? '' : ' disabled'  }}" href="{{ url('hotel/room/photo', $hotel->id) }}">
            Өрөөний зураг
            @if ($hotel->step > 6)
				<i class="icon large green check circle"></i>
            @endif
        </a>
        <a class="item{{ Request::is('hotel/payment/'.$hotel->id) ? ' active': '' }}
            @if ($hotel->step != 7 AND $hotel->co_day == null)
                disabled
            @endif" href="{{ url('hotel/payment', $hotel->id) }}">
            Төлбөрийн нөхцөл
            @if ($hotel->co_day)
				<i class="icon large green check circle"></i>
            @endif
        </a>
        @if (!$hotel->published)
            <a class="item{{ Request::is('hotel/contract/'.$hotel->id) ? ' active': '' }}{{ $hotel->co_day ? '' : ' disabled'  }}" href="{{ url('hotel/contract', $hotel->id) }}">
                Гэрээ хийх
                @if ($hotel->published)
                    <i class="icon large green check circle"></i>
                @endif
            </a>
        @endif
    </div>
</div>