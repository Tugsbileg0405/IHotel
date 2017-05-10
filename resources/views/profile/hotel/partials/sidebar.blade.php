<div class="ui fluid vertical pointing menu">
    <a class="item{{ Request::is('admin/hotel/'.$hotel->id) ? ' active': '' }}{{ $hotel->step >= 2 ? '' : ' disabled'  }}" href="{{ url('admin/hotel', $hotel->id) }}">
        Үндсэн мэдээлэл
    </a>
    @if ($hotel->step >= 3)
	    <a class="item{{ Request::is('admin/hotel/service/'.$hotel->id) ? ' active': '' }}" href="{{ url('admin/hotel/service', $hotel->id) }}">
	        Буудлын мэдээлэл
	    </a>
    @else
	    <a class="item disabled">
	        Буудлын мэдээлэл
	    </a>
    @endif
    @if ($hotel->step >= 4)
	    <a class="item{{ Request::is('admin/hotel/photo/'.$hotel->id) ? ' active': '' }}" href="{{ url('admin/hotel/photo', $hotel->id) }}">
	        Буудлын зураг
	    </a>
    @else
	    <a class="item disabled">
	        Буудлын зураг
	    </a>
    @endif 
    @if ($hotel->co_day)
	    <a class="item{{ Request::is('admin/hotel/payment/'.$hotel->id) ? ' active': '' }}" href="{{ url('admin/hotel/payment', $hotel->id) }}">
	        Төлбөрийн нөхцөл
	    </a>
    @else
	    <a class="item disabled">
	        Төлбөрийн нөхцөл
	    </a>
    @endif
    @if ($hotel->co_day AND !$hotel->published)
		<a class="item" href="{{ url('hotel/contract', $hotel->id) }}">
	        Гэрээ хийх
	    </a>
    @elseif (!$hotel->co_day AND !$hotel->published)
		<a class="item disabled">
	        Гэрээ хийх
	    </a>
    @endif
</div>