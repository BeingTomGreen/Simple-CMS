@layout('admin.base')

@section('content')

{{ Form::open(URL::current(), 'POST', array('class' => 'form-horizontal')) }}
  @if (isset($category))
  {{ Form::hidden('id', $category->id) }}
  @endif

  <div class="control-group{{ $errors->has('title') ? ' error' : '' }}">
    {{ Form::label('title', 'Title', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($category))
      {{ Form::text('title', (Input::old('title') ? Input::old('title') : $category->title), array('class' => 'input-xxlarge')) }}
      @else
      {{ Form::text('title', Input::old('title', ''), array('class' => 'input-xxlarge')) }}
      @endif
      {{ $errors->has('title') ? '<p class="help-block">'. $errors->first('title') .'</p>' : '' }}
      <p class="help-block">This is the title of the Category, which the Public &amp; Search Engines will see.</p>
    </div>
  </div>

  <div class="control-group{{ $errors->has('slug') ? ' error' : '' }}">
    {{ Form::label('slug', 'Slug', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($category))
      {{ Form::text('slug', (Input::old('slug') ? Input::old('slug') : $category->slug), array('class' => 'input-xxlarge')) }}
      @else
      {{ Form::text('slug', Input::old('slug', ''), array('class' => 'input-xxlarge')) }}
      @endif
      {{ $errors->has('slug') ? '<p class="help-block">'. $errors->first('slug') .'</p>' : '' }}
      <p class="help-block">This is the URL of the Category which the Public &amp; Search Engines will see.</p>
    </div>
  </div>

  <div class="control-group{{ $errors->has('description') ? ' error' : '' }}">
    {{ Form::label('description', 'Description', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($category))
      {{ Form::textarea('description', (Input::old('description') ? Input::old('description') : $category->description), array('class' => 'input-xxlarge')) }}
      @else
      {{ Form::textarea('description', Input::old('description', ''), array('class' => 'input-xxlarge')) }}
      @endif
      {{ $errors->has('description') ? '<p class="help-block">'. $errors->first('description') .'</p>' : '' }}
      <p class="help-block">This is the description of the Category which the Public &amp; Search Engines will see.</p>
    </div>
  </div>

  <div class="form-actions">
    {{ Form::button('Save', array('class' => 'btn btn-primary')) }}
    <a href='{{ URL::to_route('admin_category_list') }}' class='btn'>Cancel</a>
  </div>
{{ Form::close() }}
@endsection