@layout('admin.base')

@section('content')

{{ Form::open(URL::current(), 'POST', array('class' => 'form-horizontal')) }}
  @if (isset($page))
  {{ Form::hidden('id', $page->id) }}
  @endif

  <div class="control-group{{ $errors->has('reference') ? ' error' : '' }}">
    {{ Form::label('reference', 'Reference', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($page))
      {{ Form::text('reference', (Input::old('reference') ? Input::old('reference') : $page->reference), array('class' => 'input-xxlarge')) }}
      @else
      {{ Form::text('reference', Input::old('reference', ''), array('class' => 'input-xxlarge')) }}
      @endif
      {{ $errors->has('reference') ? '<p class="help-block">'. $errors->first('reference') .'</p>' : '' }}
      <p class="help-block">The Reference is used internally to help you understand what the Page is about.</p>
    </div>
  </div>

  <div class="control-group{{ $errors->has('title') ? ' error' : '' }}">
    {{ Form::label('title', 'Title', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($page))
      {{ Form::text('title', (Input::old('title') ? Input::old('title') : $page->title), array('class' => 'input-xxlarge')) }}
      @else
      {{ Form::text('title', Input::old('title', ''), array('class' => 'input-xxlarge')) }}
      @endif
      {{ $errors->has('title') ? '<p class="help-block">'. $errors->first('title') .'</p>' : '' }}
      <p class="help-block">This is the title of the Page, which the Public &amp; Search Engines will see.</p>
    </div>
  </div>

  <div class="control-group{{ $errors->has('description') ? ' error' : '' }}">
    {{ Form::label('description', 'Description', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($page))
      {{ Form::text('description', (Input::old('description') ? Input::old('description') : $page->description), array('class' => 'input-xxlarge')) }}
      @else
      {{ Form::text('description', Input::old('description', ''), array('class' => 'input-xxlarge')) }}
      @endif
      {{ $errors->has('description') ? '<p class="help-block">'. $errors->first('description') .'</p>' : '' }}
      <p class="help-block">This is the description of the Page which the Public &amp; Search Engines will see.</p>
    </div>
  </div>

  <div class="control-group{{ $errors->has('slug') ? ' error' : '' }}">
    {{ Form::label('slug', 'Slug', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($page))
      {{ Form::text('slug', (Input::old('slug') ? Input::old('slug') : $page->slug), array('class' => 'input-xxlarge')) }}
      @else
      {{ Form::text('slug', Input::old('slug', ''), array('class' => 'input-xxlarge')) }}
      @endif
      {{ $errors->has('slug') ? '<p class="help-block">'. $errors->first('slug') .'</p>' : '' }}
      <p class="help-block">This is the URL of the Page which the Public &amp; Search Engines will see.</p>
    </div>
  </div>

  <div class="control-group{{ $errors->has('status') ? ' error' : '' }}">
    {{ Form::label('status', 'Status', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($page))
      {{ Form::select('status', array('1' => 'Live', '0' => 'Hidden'), (Input::old('status') ? Input::old('status') : $page->status)) }}
      @else
      {{ Form::select('status', array('1' => 'Live', '0' => 'Hidden'), Input::old('status', '0')) }}
      @endif
      {{ $errors->has('status') ? '<p class="help-block">'. $errors->first('status') .'</p>' : '' }}
      <p class="help-block">This controls whether the Public &amp; Search Engines can see this Page.</p>
    </div>
  </div>

  <div class="control-group{{ $errors->has('content') ? ' error' : '' }}">
    {{ Form::label('content', 'Content', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($page))
      {{ Form::textarea('content', (Input::old('content') ? Input::old('content') : $page->content), array('class' => 'input-xxlarge')) }}
      @else
      {{ Form::textarea('content', Input::old('content', ''), array('class' => 'input-xxlarge')) }}
      @endif
      {{ $errors->has('content') ? '<p class="help-block">'. $errors->first('content') .'</p>' : '' }}
      <p class="help-block">This is the content of the Page which the Public &amp; Search Engines will see.</p>
    </div>
  </div>

  <div class="form-actions">
    {{ Form::button('Save', array('class' => 'btn btn-primary')) }}
    <a href='{{ URL::to_route('admin_page_list') }}' class='btn'>Cancel</a>
  </div>
{{ Form::close() }}
@endsection