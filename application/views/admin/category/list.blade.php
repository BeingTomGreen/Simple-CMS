@layout('admin.base')

@section('content')
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($categories->results as $category)
    <tr>
      <td>{{ $category->id }}</td>
      <td><a href='{{ URL::to_route('admin_category_edit', array($category->slug)) }}'>{{ $category->title }}</td>
      <td class="action-td">
        <a href="{{ URL::to_route('admin_category_edit', array($category->slug)) }}" class="btn btn-small btn-warning">
          <i class="icon-pencil"></i>
        </a>
        <a href="{{ URL::to_route('admin_category_delete', array($category->slug)) }}" class="btn btn-small">
          <i class="icon-remove"></i>
        </a>
      </td>
    </tr>
    @empty
    <tr>
      <td>There are no Categories!</td>
    </tr>
    @endforelse
  </tbody>
</table>
<a href='{{ URL::to_route('admin_category_add') }}' class='btn'>Add Category</a>
{{ $categories->links() }}

@endsection