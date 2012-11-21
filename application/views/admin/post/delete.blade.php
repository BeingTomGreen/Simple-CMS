@layout('admin.base')

@section('content')
{{ Form::open(URL::current(), 'POST', array('class' => 'form-horizontal')) }}
  <div class="form-actions">
  	{{ Form::button('Confirm', array('class' => 'btn btn-danger')) }}
  	<a href='{{ URL::to_route('admin_post_edit', array($post->slug)) }}' class='btn'>Cancel</a>
	</div>
{{ Form::close() }}
@endsection