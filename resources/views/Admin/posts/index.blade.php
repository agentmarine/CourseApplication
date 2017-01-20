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
	<h1> Posts </h1>
	
	<table class="table table-striped">
	    <thead>
	    @if($posts)
	      <tr>
	        <th></th>
	        <th>Owner</th>
	        <th>Post Title</th>
	        <th>Created Date</th>
	        <th>Updated Date</th>
	      </tr>
	    </thead>
	    <tbody>
	      @foreach( $posts as $post)
	      <tr>
	      	<td><a href="{{route('admin.posts.edit', $post->id)}}"><img class="img-responsive img-rounded" src="{{$post->photo->file}}" width="64px" height="64px" /></a> </td>
	        <td>{{$post->user->name}}</td>
	        <a href="{{route('admin.posts.edit', $post->id)}}"> <td>{{$post->title}}</td></a>
	        <td>{{$post->created_at->diffForhumans()}}</td>
	        <td>{{$post->updated_at->diffForhumans()}}</td>
	      </tr>
	      @endforeach
	      @endif
	    </tbody>
	  </table>

	  
@endsection