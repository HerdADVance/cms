@extends('layouts.app')

@section('content')

<h1>Create Post</h1>

<form action="{{ route ('blog.store') }}" method="POST">
	@include('admin.blog.partials.fields')
</form>

@endsection

@include('admin.blog.partials.scripts')