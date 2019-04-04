@extends('layouts.app')

@section('content')

@if(session('status'))
	<div class="alert alert-info">
		{{session('status')}}
	</div>
@endif

<h1>Posts</h1>

<a href="{{ route('blog.create') }}">Create New Post</a>

<table>
	<tr>
		<th>Title</th>
		<th>Author</th>
		<th>Status</th>
		<th></th>
	</tr>

	@foreach($model as $post)
		<tr>
			<td><a href="{{ route ('blog.edit', ['blog' => $post->id]) }}">{{$post->title}}</a></td>
			<td>{{$post->user->name}}</td>
			<td>{{$post->published_at}}</td>
			<!--td>
				<a 
					href="{{ route ('blog.destroy', ['blog' => $post->id])}}"
					class="btn btn-danger delete-link"
					data-message="Are you sure you want to delete this post?"
					data-form="delete-form"
				>Delete</a>
			</td-->
		</tr>
	@endforeach

</table>

<form id="delete-form" action="" method="POST">
	{{ method_field('DELETE') }}
	{!! csrf_field() !!}
</form>

@endsection