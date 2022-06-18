<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">Name</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($post->name) ? $post->name : ''}}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('head') ? 'has-error' : ''}}">
    <label for="head" class="control-label">Head</label>
    <textarea class="form-control" name="head" type="text"
              id="head">{{ isset($post->head) ? $post->head : ''}}</textarea>
    {!! $errors->first('head', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">Content</label>
    <textarea class="form-control" name="content" type="text"
              id="content">{{ isset($post->content) ? $post->content : ''}}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group" {{$errors->has('url') ? 'has-error' : ''}} >
    <label>Image</label>
    <div id="image-area" class="post-image">
        @if(isset($post) && $post->url)
            <div class="image" style="background-image: url({{$post->url}})"
                 data-image-name="{{$post->path}}">
                <input type="text" class="d-none" name="image" value="{{$post->url}}">
                <div class="remove-image">
                    <button>&times;</button>
                </div>
            </div>
        @endif
        <div class="add-image" style="display: {{isset($post) && $post->url ? 'none' : 'block'}}">
            <button><span>&plus;</span></button>
            <input type="file" id="postFileInput" class="d-none">
        </div>
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
