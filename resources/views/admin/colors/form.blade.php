<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <div class="col-sm-4">
        <label for="name" class="control-label">name</label>
        <input class="form-control color-picker" name="name" type="text" id="name" value="{{ isset($color->name) ? $color->name : ''}}" >
    </div>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

@section('adminlte_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $('.color-picker').colorpicker()
    </script>
@endsection
