<h1>Pages</h1>

<a href="{{ route('pages.create') }}">Create New Page</a>

@foreach($pages as $page)
	<p><a href="{{$page->url}}">{{$page->title}}</a></p>
@endforeach