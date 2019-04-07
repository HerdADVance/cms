@foreach($pages as $page)

	<li>
		<a href="{{$page->url}}">{{$page->title}}</a>
	
		@if(count($page->children))
			<ul>
				@include('partials.nav', ['pages' => $page->children])
			</ul>
		@endif

	</li>

@endforeach