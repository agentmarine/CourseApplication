@extends('layouts.admin')

@section('content')

<h1>Edit Users</h1>
<div class="col-sm-2">
<img src="{{$user->photo->file}}" class="img-responsive img-rounded">

</div>
<div class="col-sm-5">
	{!! Form::model($user, ['method'=>'PATCH','files'=>true, 'action' => ['AdminUsersController@update', $user->id]]) !!}
		<div class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email', 'Email Address:') !!}
			{!! Form::text('email', null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('is_Active', 'Status:') !!}
			{!! Form::select('is_Active', array(1 => 'Active', 0 => 'Not Active'), null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('role_id', 'Role:') !!}
			{!! Form::select('role_id', $roles, null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password', 'Password:') !!}
			{!! Form::password('password', ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('photo_id', 'Photo:') !!}
			{!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}

	{!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
	<div class="form-group">
		{!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}
	</div>
	{!! Form::close() !!}
	@include('includes.form_error')
</div>
@endsection