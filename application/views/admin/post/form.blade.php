@layout('admin.base')

@section('content')

{{ Form::open(URL::current(), 'POST', array('class' => 'form-horizontal')) }}
  @if (isset($post))
  {{ Form::hidden('id', $post->id) }}
  {{ Form::hidden('author_id', $post->author_id) }}
  @endif

  <div class="control-group{{ $errors->has('reference') ? ' error' : '' }}">
    {{ Form::label('reference', 'Reference', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($post))
      {{ Form::text('reference', (Input::old('reference') ? Input::old('reference') : $post->reference), array('class' => 'input-xxlarge')) }}
      @else
      {{ Form::text('reference', Input::old('reference', ''), array('class' => 'input-xxlarge')) }}
      @endif
      {{ $errors->has('reference') ? '<p class="help-block">'. $errors->first('reference') .'</p>' : '' }}
      <p class="help-block">The Reference is used internally to help you understand what the Blog Post is about.</p>
    </div>
  </div>

  <div class="control-group{{ $errors->has('title') ? ' error' : '' }}">
    {{ Form::label('title', 'Title', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($post))
      {{ Form::text('title', (Input::old('title') ? Input::old('title') : $post->title), array('class' => 'input-xxlarge')) }}
      @else
      {{ Form::text('title', Input::old('title', ''), array('class' => 'input-xxlarge')) }}
      @endif
      {{ $errors->has('title') ? '<p class="help-block">'. $errors->first('title') .'</p>' : '' }}
      <p class="help-block">This is the title of the Blog Post, which the Public &amp; Search Engines will see.</p>
    </div>
  </div>

  <div class="control-group{{ $errors->has('description') ? ' error' : '' }}">
    {{ Form::label('description', 'Description', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($post))
      {{ Form::text('description', (Input::old('description') ? Input::old('description') : $post->description), array('class' => 'input-xxlarge')) }}
      @else
      {{ Form::text('description', Input::old('description', ''), array('class' => 'input-xxlarge')) }}
      @endif
      {{ $errors->has('description') ? '<p class="help-block">'. $errors->first('description') .'</p>' : '' }}
      <p class="help-block">This is the description of the Blog Post which the Public &amp; Search Engines will see.</p>
    </div>
  </div>

  <div class="control-group{{ $errors->has('slug') ? ' error' : '' }}">
    {{ Form::label('slug', 'Slug', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($post))
      {{ Form::text('slug', (Input::old('slug') ? Input::old('slug') : $post->slug), array('class' => 'input-xxlarge')) }}
      @else
      {{ Form::text('slug', Input::old('slug', ''), array('class' => 'input-xxlarge')) }}
      @endif
      {{ $errors->has('slug') ? '<p class="help-block">'. $errors->first('slug') .'</p>' : '' }}
      <p class="help-block">This is the URL of the Blog Post which the Public &amp; Search Engines will see.</p>
    </div>
  </div>

  <div class="control-group{{ $errors->has('category') ? ' error' : '' }}">
    {{ Form::label('category', 'Category', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($post))
      {{ Form::select('category', $categories, (Input::old('category') ? Input::old('category') : $post->category_id)) }}
      @else
      {{ Form::select('category', $categories) }}
      @endif
      {{ $errors->has('category') ? '<p class="help-block">'. $errors->first('category') .'</p>' : '' }}
      <p class="help-block">This controls whether users and search engines can see this Blog Post.</p>
    </div>
  </div>


  <div class="control-group{{ $errors->has('status') ? ' error' : '' }}">
    {{ Form::label('status', 'Status', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($post))
      {{ Form::select('status', array('1' => 'Live', '0' => 'Hidden'), (Input::old('status') ? Input::old('status') : $post->status)) }}
      @else
      {{ Form::select('status', array('1' => 'Live', '0' => 'Hidden'), Input::old('status', '0')) }}
      @endif
      {{ $errors->has('status') ? '<p class="help-block">'. $errors->first('status') .'</p>' : '' }}
      <p class="help-block">This controls whether users and search engines can see this Blog Post.</p>
    </div>
  </div>

  <div class="control-group{{ $errors->has('content') ? ' error' : '' }}">
    {{ Form::label('content', 'Content', array('class' => 'control-label')) }}
    <div class="controls">
      @if (isset($post))
      {{ Form::textarea('content', (Input::old('content') ? Input::old('content') : $post->content), array('class' => 'input-xxlarge')) }}
      @else
      {{ Form::textarea('content', Input::old('content', ''), array('class' => 'input-xxlarge')) }}
      @endif
      {{ $errors->has('content') ? '<p class="help-block">'. $errors->first('content') .'</p>' : '' }}
      <p class="help-block">This is the content of the Blog Post which the Public &amp; Search Engines will see.</p>
    </div>
  </div>

  <div class="form-actions">
    {{ Form::button('Save', array('class' => 'btn btn-primary')) }}
    <a href='{{ URL::to_route('admin_post_list') }}' class='btn'>Cancel</a>
  </div>
{{ Form::close() }}
@endsection