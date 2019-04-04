@extends('layouts.app')

@section('content')

@if(session('status'))
	<div class="alert alert-info">
		{{session('status')}}
	</div>
@endif

<h1>Pages</h1>

<a href="{{ route('pages.create') }}">Create New Page</a>

@foreach($pages as $page)
	<p><a href="{{ route ('pages.edit', ['page' => $page->id]) }}">{{$page->title}}</a></p>
@endforeach

@endsection