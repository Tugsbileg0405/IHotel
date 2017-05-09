<div class="comment">
	<a class="avatar">
		<img src="{{ asset($comment->user->avatar) }}">
	</a>
	<div class="content">
		<a class="author">{{ $comment->user->name }}</a>
		<div class="metadata">
			<span class="date">{{ date('Y-m-d h:i:sa', strtotime($comment->created_at)) }}</span>
		</div>
		<div class="text">{{ $comment->content }}</div>
	</div>
</div>