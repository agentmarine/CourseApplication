@extends('layouts.admin')

@section('content')

<h1>Edit Post</h1>
<div class="col-sm-2">
<img src="{{$post->photo->file}}" class="img-responsive img-rounded">

</div>
<div class="col-sm-5">
	{!! Form::model($post, ['method'=>'PATCH','files'=>true, 'action' => ['AdminPostsController@update', $post->id]]) !!}
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

	{!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
	<div class="form-group">
		{!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
	</div>
	{!! Form::close() !!}
	@include('includes.form_error')


<script type="text/javascript">
	$(document).ready(function() {
		$('#body').summernote({
			height:300,
		});
});
</script>
</div>
@endsection