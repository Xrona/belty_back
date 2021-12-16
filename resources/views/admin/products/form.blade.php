<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">name</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ $product->name ?? ''}}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('article') ? 'has-error' : ''}}">
    <label for="article" class="control-label">article</label>
    <input class="form-control" name="article" type="text" id="article" value="{{ $product->article ?? ''}}">
    {!! $errors->first('article', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">price</label>
    <input class="form-control" name="price" type="text" id="price" value="{{ $product->price ?? ''}}">
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>

<x-select2  name="category_id" :list="$categories" :currentValue="$product->category_id" label="Category"/>
{!! $errors->first('category', '<p class="help-block">:message</p>') !!}


<x-select2  name="material_id" :list="$materials" :currentValue="$product->material_id" label="Material"/>
{!! $errors->first('material', '<p class="help-block">:message</p>') !!}


<x-select2  name="country_id" :list="$countries" :currentValue="$product->country_id" label="Country"/>
{!! $errors->first('country', '<p class="help-block">:message</p>') !!}

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">status</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ $product->status ?? ''}}">
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label>Minimal</label>
    <div class="select2-purple">
        <select class="js-example-basic-single" style="width: 100%;">
            <option selected="selected">Alabama</option>
            <option>Alaska</option>
            <option>California</option>
            <option>Delaware</option>
            <option>Tennessee</option>
            <option>Texas</option>
            <option>Washington</option>
        </select>
    </div>

</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
