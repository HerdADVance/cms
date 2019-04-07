@extends('layouts.frontend')

@section('content')

<article>
	<h1>{{$post->title}}</h1>
	<p class="author">By {{$post->user->name}}</p>
	<p class="date">Published at: {{$post->present()->publishedDate}}</p>
	{{$post->content}}
</article>

@endsection