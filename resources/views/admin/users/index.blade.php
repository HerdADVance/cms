@extends('layouts.app')

@section('content')

@if(session('status'))
	<div class="alert alert-info">
		{{session('status')}}
	</div>
@endif

<h1>Users</h1>

<table>
	<tr>
		<th>Name</th>
		<th>E-Mail</th>
		<th>Roles</th>
	</tr>

	@foreach($model as $user)
		<tr>
			<td><a href="{{ route ('users.edit', ['user' => $user->id]) }}">{{$user->name}}</a></td>
			<td>{{$user->email}}</td>
			<td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
		</tr>
	@endforeach

</table>

{{$model->links()}}

@endsection