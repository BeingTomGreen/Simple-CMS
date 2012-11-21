@layout('admin.base')

@section('content')
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Reference</th>
      <th>Modified</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($pages->results as $page)
    <tr>
      <td>{{ $page->id }}</td>
      <td><a href='{{ URL::to_route('admin_page_edit', array($page->slug)) }}'>{{ $page->reference }}</td>
      <td>{{ $page->updated_at }}</td>
      <td class="action-td">
        <a href="{{ URL::to_route('admin_page_edit', array($page->slug)) }}" class="btn btn-small btn-warning">
          <i class="icon-pencil"></i>
        </a>
        <a href="{{ URL::to_route('admin_page_delete', array($page->slug)) }}" class="btn btn-small">
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
<a href='{{ URL::to_route('admin_page_add') }}' class='btn'>Add Page</a>
{{ $pages->links() }}

@endsection