@extends('layouts.admin')

@section('content')
	<h1> Create Post </h1>
		{!! Form::open(['method'=>'POST', 'action' => 'AdminPostsController@store']) !!}
			<div class="form-group">
				{!! Form::label('title', 'Title:') !!}
				{!! Form::text('title', null,['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('category_id', 'Category:') !!}
				{!! Form::select('category_id', array(''=>'options'), ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('photo_id', 'Display Icon:') !!}
				{!! Form::file('photo_id',  ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('body', 'Body:') !!}
				{!! Form::textarea('body',  null ,['class'=>'form-control', 'rows'=>3]) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Create Post', '', ['class'=>'btn-primary']) !!}
			</div>

		{!! Form::close() !!}

		


<script type="text/javascript">
	$(document).ready(function() {
		$('#body').summernote({
			height:300,
		});
});
</script>


@endsection