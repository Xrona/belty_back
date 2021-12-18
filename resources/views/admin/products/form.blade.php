@php
    $item = $product ?? null;
@endphp


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

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">status</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ $product->status ?? ''}}">
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

{{--@section('adminlte_js')--}}
{{--    <script>--}}
{{--        try {--}}
{{--            $('.select2').select2();--}}
{{--        } catch (error) {--}}
{{--            console.log(error)--}}
{{--        }--}}

{{--        $('.color-body').on('click', function (e) {--}}
{{--            $(this).toggleClass('active')--}}

{{--            let checkbox =  $(this).next('input')[0]--}}

{{--            checkbox.toggleAttribute('checked')--}}

{{--        })--}}
{{--    </script>--}}
{{--@endsection--}}
