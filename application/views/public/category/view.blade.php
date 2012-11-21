@layout('public.base')

@section('content')

	<h2>{{ $pageTitle }}</h2>
	<p>{{ $pageDescription }}</p>

    @forelse ($categoryPosts->results as $post)
        <h2><a href="{{ URL::to_route('post_view', array($post->slug)) }}">{{ $post->title }}</a></h2>
        {{ $post->description }}
        <br />
    @empty
        <p>There are no posts!</p>
    @endforelse
    {{ $categoryPosts->links() }}
@endsection