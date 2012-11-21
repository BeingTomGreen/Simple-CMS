@layout('public.base')

@section('content')
    @forelse ($posts->results as $post)
        <h2><a href="{{ URL::to_route('post_view', array($post->slug)) }}">{{ $post->title }}</a></h2>
        {{ $post->description }}
        <br />
    @empty
        <p>There are no posts!</p>
    @endforelse
    {{ $posts->links() }}
@endsection