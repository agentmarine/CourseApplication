@extends('layouts.admin')

@section('content')

<h1>Create Users</h1>
	{!! Form::open(['method'=>'POST','files'=>true, 'action' => 'AdminUsersController@store']) !!}
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
			{!! Form::select('is_Active', array(1 => 'Active', 0 => 'Not Active'), 0,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('role_id', 'Role:') !!}
			{!! Form::select('role_id', ['' => "Choose Role"] + $roles, null,['class'=>'form-control']) !!}
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
			{!! Form::submit('Create User', ['class'=>'btn-primary']) !!}
		</div>
	{!! Form::close() !!}
	
	@include('includes.form_error')

@endsection