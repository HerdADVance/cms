@extends('layouts.app')

@section('content')

<h1>Edit Post</h1>

<form action="{{ route ('blog.update', ['blog' => $model->id]) }}" method="POST">
	{{ method_field('PUT') }}
	@include('admin.blog.partials.fields')
</form>

@endsection

@include('admin.blog.partials.scripts')