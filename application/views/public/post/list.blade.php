@layout('public.base')

@section('content')
	@forelse ($posts->results as $post)
	<div class="row">
		<div class="span10">
			<h3><a href="{{ URL::to_route('post_view', array($post->slug)) }}">{{ $post->title }}</a></h2>
			{{ $post->description }}
		</div>
	</div>
	@empty
	<p>There are no posts!</p>
	@endforelse

	{{ $posts->links() }}

@endsection