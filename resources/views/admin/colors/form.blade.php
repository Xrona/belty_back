<?php
if (!isset($color) {
    $color = null;
}
?>
<div class="form-group {{ $errors->has('label') ? 'has-error' : ''}}">
    <div class="col-sm-4">
        <label for="label" class="control-label">Label</label>
        <input class="form-control" name="label" type="text" id="name" value="{{ $color?->label ?? ''}}">
    </div>
    {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <div class="col-sm-4">
        <label for="name" class="control-label">Name</label>
        <input class="form-control color-picker" name="name" type="text" id="name" value="{{ $color?->name }}">
    </div>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
