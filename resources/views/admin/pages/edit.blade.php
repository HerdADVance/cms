<h1>Edit Page</h1>

<form action="{{ route ('pages.update', ['page' => $model->id]) }}" method="POST">
	{{ method_field('PUT') }}
	@include('admin.pages.partials.fields')
</form>