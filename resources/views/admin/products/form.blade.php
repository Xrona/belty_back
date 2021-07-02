<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">name</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($product->name) ? $product->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('article') ? 'has-error' : ''}}">
    <label for="article" class="control-label">article</label>
    <input class="form-control" name="article" type="text" id="article" value="{{ isset($product->article) ? $product->article : ''}}" >
    {!! $errors->first('article', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">price</label>
    <input class="form-control" name="price" type="text" id="price" value="{{ isset($product->price) ? $product->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">category</label>
    <input class="form-control" name="category_id" type="text" id="category" value="{{ isset($product->category_id) ? $product->category_id : ''}}" >
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('material_id') ? 'has-error' : ''}}">
    <label for="material" class="control-label">material</label>
    <input class="form-control" name="material" type="text" id="material" value="{{ isset($product->material_id) ? $product->material_id : ''}}" >
    {!! $errors->first('material', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('country_id') ? 'has-error' : ''}}">
    <label for="country" class="control-label">country</label>
    <input class="form-control" name="country" type="text" id="country" value="{{ isset($product->country_id) ? $product->country_id : ''}}" >
    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">status</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($product->status) ? $product->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>