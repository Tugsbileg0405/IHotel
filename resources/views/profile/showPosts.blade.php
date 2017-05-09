@extends('layouts.profile')

@section('title', 'iHotel')

@section('content')
<div class="eleven wide column">
	@if ($posts->count() > 0)
		@foreach ($posts as $post)
			<div class="ui segment">
				<h4 class="ui header">
					<a href="{{ url('post', $post->id) }}">{{ $post->title }}</a>
				</h4>
				<div class="ui mini horizontal divided list">
					<div class="item">
						<i class="icon calendar"></i>{{ date('Y-m-d', strtotime($post->created_at)) }}
					</div>
					<div class="item">
						<a href="{{ url('category', $post->category->id) }}">
							<i class="icon folder"></i>
							@if(App::isLocale('en'))
								{{ $post->category->name_en }}
							@elseif(App::isLocale('mn'))
								{{ $post->category->name }}
							@endif
						</a>
					</div>
					<div class="item">
						<i class="icon eye"></i>{{ $post->views }}
					</div>
				</div>
				<a class="ui right floated negative icon button open-DeleteModal" data-id="{{ $post->id }}">
					<i class="trash icon"></i>
				</a>
				<a class="ui right floated icon button" href="{{ url('profile/posts/'.$post->id.'/edit') }}">
					<i class="pencil icon"></i>
				</a>
			</div>
			{{ $posts->links() }}
		@endforeach
	@else
		<div class="ui segment">{{ __('messages.Have not Post') }}</div>
	@endif
</div>
<div id="delete-modal" class="ui modal">
	<div class="header">{{ __('messages.Delete') }}</div>
	<div class="content">
		<p>{{ __('messages.Are you sure to delete?') }}</p>
	</div>
	<div class="actions">
		<a class="ui red negative button">{{ __('messages.No') }}</a>
		<a class="ui positive right labeled icon button">
			<i class="checkmark icon"></i>{{ __('messages.Yes') }}
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
	$('.open-DeleteModal').click(function() {
		var id = $(this).data('id');
		$('#delete-modal').modal({
			onApprove : function() {
				$('#delete-modal').find('form').attr('action', "{{ url('profile/posts')}}/" + id);
				$('#delete-modal').find('form').submit();
			}
		}).modal('show');
	});
</script>
@endpush