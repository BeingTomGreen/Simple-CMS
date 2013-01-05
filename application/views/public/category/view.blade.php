@layout('public.base')

@section('content')
	<h3>{{ $pageTitle }}</h2>
	{{ $pageDescription }}

	@forelse ($categoryPosts->results as $post)
	<div class="row">
		<div class="span10">
			<h4><a href="{{ URL::to_route('post_view', array($post->slug)) }}">{{ $post->title }}</a></h2>
			{{ $post->description }}
		</div>
	</div>
	@empty
	<div class="row">
		<div class="span10">
			<p>There are no posts!</p>
		</div>
	</div>
	@endforelse

	{{ $categoryPosts->links() }}

@endsection