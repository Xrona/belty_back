<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ trans('users.name') }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ $user->name ?? ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ trans('users.email') }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ $user->email ?? ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ trans('users.password') }}</label>
    <input class="form-control" name="password" type="text" id="password" value="{{ $user->password ?? ''}}" >
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
