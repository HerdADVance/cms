@extends('layouts.frontend')

@section('content')

<h1>Blog</h1>

@foreach($published as $post)
	<article>
		<h2><a href="{{ route('blog.view', ['slug' => $post->slug]) }}">{{$post->title}}</a></h2>
		<p class="excerpt">{{$post->excerpt}}</p>
	</article>
@endforeach

{{$published->render()}}

@endsection