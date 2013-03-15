@layout('admin.base')

@section('content')

{{ Form::open(URL::current(), 'POST', array('class' => 'form-horizontal')) }}
  @if (isset($user))
  {{ Form::hidden('id', $user->id) }}
  @endif

  <div class="control-group{{ $errors->has('reference') ? ' error' : '' }}">
    {{ Form::label('email', 'Reference', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($user))
      {{ Form::text('email', (Input::old('email') ? Input::old('email') : $user->email), array('class' => 'input-xxlarge')) }}
      @else
      {{ Form::text('email', Input::old('email', ''), array('class' => 'input-xxlarge')) }}
      @endif
      {{ $errors->has('email') ? '<p class="help-block">'. $errors->first('email') .'</p>' : '' }}
      <p class="help-block">This is the User's Email Address.</p>
    </div>
  </div>

  <div class="form-actions">
    {{ Form::button('Save', array('class' => 'btn btn-primary')) }}
    <a href='{{ URL::to_route('admin_post_list') }}' class='btn'>Cancel</a>
  </div>
{{ Form::close() }}
@endsection