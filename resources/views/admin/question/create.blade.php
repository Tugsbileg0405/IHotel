@extends('layouts.profile')

@section('title', 'Түгээмэл асуулт')

@section('content')
<div class="eleven wide column">
	<form class="ui form green segment" action="{{ url('profile/question') }}" method="POST">
		{{ csrf_field() }}
		<h4 class="ui header">Түгээмэл асуулт нэмэх</h4>
		<div class="ui divider"></div>
	    <div class="required field">
	    	<label>Асуулт</label>
			<textarea name="question"></textarea>
		</div>
	    <div class="required field">
	    	<label>Асуулт (Англи)</label>
			<textarea name="question_en"></textarea>
		</div>
	    <div class="required field">
	    	<label>Хариулт</label>
			<textarea name="answer"></textarea>
		</div>
	    <div class="required field">
	    	<label>Хариулт (Англи)</label>
			<textarea name="answer_en"></textarea>
		</div>
		<div class="field">
			<button class="ui button primary" type="submit">Хадгалах</button>
		</div>
	</form>
</div>
@endsection

@push('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('.ui.form').form({
		    inline : true,
		    fields: {
		        question: {
		            identifier: 'question',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Асуулт оруулна уу'
		                }
		            ]
		        },
		        question_en: {
		            identifier: 'question_en',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Асуулт оруулна уу'
		                }
		            ]
		        },
		        answer: {
		            identifier: 'answer',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Хариулт оруулна уу'
		                }
		            ]
		        },
		        answer_en: {
		            identifier: 'answer_en',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Хариулт оруулна уу'
		                }
		            ]
		        },
		    },
		    onSuccess: function() {
		    	$('.ui.form button').addClass('loading disabled');
		    }
		});
	});
</script>
@endpush