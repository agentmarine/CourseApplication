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
	<h1> users </h1>
	<table class="table table-striped">
	    <thead>
	      <tr>
	        <th>Id</th>
	        <td>Profile Img</td>
	        <th>Name</th>
	        <th>Email</th>
	        <th>Role</th>
	        <th>Status</th>
	        <th>Created</th>
	        <th>Updated</th>
	      </tr>
	    </thead>
	    <tbody>
	      @foreach($users as $user)
	      <tr>
	        <td>{{$user->id}}</td>
	        
	        <td><a href="{{route('admin.users.edit', $user->id)}}"><img class="img-responsive img-rounded" src="{{$user->photo->file}}" width="64px" height="64px" /></a> </td>
	        <td>{{$user->name}}</td>
	        <td>{{$user->email}}</td>
			<td>{{$user->role->name}}</td>
			<td>{{$user->is_Active == 1 ? 'Active' : 'Inactive'}}</td>
	        <td>{{$user->created_at->diffForHumans()}}</td>
	        <td>{{$user->updated_at->diffForHumans()}}</td>
	      </tr>
	      @endforeach
	    </tbody>
	  </table>

@endsection