{!! csrf_field() !!}

@if (!$errors->isEmpty())

	<div class="alert alert-danger">
		@foreach($errors->all() as $message)
			<li>{{$message}}</li>
		@endforeach
	</div>

@endif

<div class="form-group">
	<label for="title">Title</label>
	<input type="text" class="form-control" id="title" name="title" value="{{$model->title}}" />
</div>

<div class="form-group">
	<label for="slug">Slug</label>
	<input type="text" class="form-control" id="slug" name="slug" value="{{$model->slug}}" />
</div>

<div class="form-group">
	<label for="published_at">Published At</label>
	<input type="text" class="form-control" id="published_at" name="published_at" value="{{$model->published_at}}" />
</div>

<div class="form-group">
	<label for="excerpt">Excerpt</label>
	<textarea class="form-control" id="excerpt" name="excerpt">{{$model->excerpt}}</textarea>
</div>

<div class="form-group">
	<label for="content">Content</label>
	<textarea class="form-control" id="content" name="content">{{$model->content}}</textarea>
</div>

<div class="form-group">
	<input type="submit" class="btn" value="Submit" />
</div>