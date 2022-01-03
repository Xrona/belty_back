@php
    $item = $product ?? null;
@endphp

<div class="form-group mt-4 d-flex align-items-center  {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label mr-2 mb-0">status</label>
    <input name="status" type="hidden" value="0">
    <input name="status" type="checkbox" id="status" value="1" {{$item?->status ? 'checked' : ''}}>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mt-4 d-flex align-items-center  {{ $errors->has('bestseller') ? 'has-error' : ''}}">
    <label for="bestseller" class="control-label mr-2 mb-0">Bestseller</label>
    <input name="bestseller" type="hidden" value="0">
    <input name="bestseller" type="checkbox" id="bestseller" value="1" {{$item?->bestseller ? 'checked' : ''}}>
    {!! $errors->first('bestseller', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">name</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ $item?->name ?? ''}}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('article') ? 'has-error' : ''}}">
    <label for="article" class="control-label">article</label>
    <input class="form-control" name="article" type="text" id="article" value="{{ $item?->article ?? ''}}">
    {!! $errors->first('article', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">price</label>
    <input class="form-control" name="price" type="text" id="price" value="{{ $item?->price ?? ''}}">
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('width') ? 'has-error' : ''}}">
    <label for="width" class="control-label">Width</label>
    <input class="form-control" name="width" type="text" id="width" value="{{ $item?->width ?? ''}}">
    {!! $errors->first('width', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('guarantee') ? 'has-error' : ''}}">
    <label for="guarantee" class="control-label">Guarantee</label>
    <input class="form-control" name="guarantee" type="text" id="guarantee" value="{{ $item?->guarantee ?? ''}}">
    {!! $errors->first('guarantee', '<p class="help-block">:message</p>') !!}
</div>

@if($item != null)

    <x-select2 name="category_id" :list="$categories" :currentValue="$item->category_id" label="Category"/>
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}

    <x-select2 name="material_id" :list="$materials" :currentValue="$item->material_id" label="Material"/>
    {!! $errors->first('material', '<p class="help-block">:message</p>') !!}

    <x-select2 name="country_id" :list="$countries" :currentValue="$item->country_id" label="Country"/>
    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}

    <x-multi-select name="sizes" :list="$sizes" :current-values="$item->sizes" label="Sizes"/>
    {!! $errors->first('Sizes', '<p class="help-block">:message</p>') !!}

    <x-select-colors name="colors" :list="$colors" :current-values="$item->colors" label="Colors"/>
    {!! $errors->first('Sizes', '<p class="help-block">:message</p>') !!}
@else

    <x-select2 name="category_id" :list="$categories" :currentValue="null" label="Category"/>
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}


    <x-select2 name="material_id" :list="$materials" :currentValue="null" label="Material"/>
    {!! $errors->first('material', '<p class="help-block">:message</p>') !!}


    <x-select2 name="country_id" :list="$countries" :currentValue="null" label="Country"/>
    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}

    <x-multi-select name="sizes" :list="$sizes" :currentValues="null" label="Sizes"/>
    {!! $errors->first('Sizes', '<p class="help-block">:message</p>') !!}

    <x-select-colors name="colors" :list="$colors" :currentValues="null" label="Colors"/>
    {!! $errors->first('Sizes', '<p class="help-block">:message</p>') !!}
@endif

<label>Images</label>
<ul id="image-area">
    @if($item?->productImages)
        @foreach($item?->productImages as $image)
            <li class="image" style="background-image: url({{$image->url}})" data-image-id="{{$image->id}}"
                data-image-name="{{$image->path}}">
                <input class="d-none" type="text" name="images[]" value="{{$image->url}}">
                <div class="remove-image">
                    <button>&times;</button>
                </div>
            </li>
        @endforeach
    @endif
    <li class="add-image">
        <button><span>&plus;</span></button>
        <input type="file" id="productFileInput" class="d-none" multiple>
    </li>
</ul>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
