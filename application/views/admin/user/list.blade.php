@layout('admin.base')

@section('content')
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Username</th>
      <th>Email</th>
      <th>Activated</th>
      <th>Last Login</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($users->results as $user)
    <tr>
      <td><a href='{{ URL::to_route('admin_user_edit', array($user->username)) }}'>{{ $user->username }}</td>
      <td>{{ $user->email }}</td>
      @if ($user->activated == 1)
      <td>Yes</td>
      @else
      <td>No</td>
      @endif
      <td>{{ $user->last_login }}</td>
      <td class="action-td">
        <a href="{{ URL::to_route('admin_user_edit', array($user->slug)) }}" class="btn btn-small btn-warning">
          <i class="icon-pencil"></i>
        </a>
        <a href="{{ URL::to_route('admin_user_delete', array($user->slug)) }}" class="btn btn-small">
          <i class="icon-remove"></i>
        </a>
      </td>
    </tr>
    @empty
    <tr>
      <td>There are no Users!</td>
    </tr>
    @endforelse
  </tbody>
</table>
<a href='{{ URL::to_route('admin_post_add') }}' class='btn'>Add User</a>
{{ $users->links() }}

@endsection