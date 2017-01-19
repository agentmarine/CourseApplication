@extends('layouts.admin')

@section('content')
	@if(Session::has('message'))
		<div class="alert alert-success alert-dismissible">{{session('message')}}
		</div>
	@endif

	@if(Session::has('error'))
		<div class="alert alert-danger alert-dismissible">{{session('error')}}
		</div>
	@endif
	<h1> Edit Post </h1>
	

@endsection