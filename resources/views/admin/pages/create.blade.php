@extends('layouts.app')

@section('content')

<h1>Create Page</h1>

<form action="{{ route ('pages.store') }}" method="POST">
	@include('admin.pages.partials.fields')
</form>

@endsection