@extends('layouts.admin')

@section('content')

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
	        <td><img src="{{$user->photo->file}}" width="64px" height="64px" /> </td>
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