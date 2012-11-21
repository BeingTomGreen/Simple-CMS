@layout('admin.base')

@section('content')
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Reference</th>
      <th>Author</th>
      <th>Category</th>
      <th>Modified</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($posts->results as $post)
    <tr>
      <td>{{ $post->id }}</td>
      <td><a href='{{ URL::to_route('admin_post_edit', array($post->slug)) }}'>{{ $post->reference }}</td>
      <td>{{ $post->author->username }}</td>
      <td>{{ $post->category->title }}</td>
      <td>{{ $post->updated_at }}</td>
      <td class="action-td">
        <a href="{{ URL::to_route('admin_post_edit', array($post->slug)) }}" class="btn btn-small btn-warning">
          <i class="icon-pencil"></i>
        </a>
        <a href="{{ URL::to_route('admin_post_delete', array($post->slug)) }}" class="btn btn-small">
          <i class="icon-remove"></i>
        </a>
      </td>
    </tr>
    @empty
    <tr>
      <td>There are no Pages!</td>
    </tr>
    @endforelse
  </tbody>
</table>
<a href='{{ URL::to_route('admin_post_add') }}' class='btn'>Add Blog Post</a>
{{ $posts->links() }}

@endsection