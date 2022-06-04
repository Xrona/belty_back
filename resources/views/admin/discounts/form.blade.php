<div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
    <label for="value" class="control-label">discount value</label>
    <input class="form-control" name="value" type="text" id="value" value="{{ isset($discount?->value) ? $discount->value : ''}}">
    {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group d-flex align-items-center" {{ $errors->has('value') ? 'has-error' : ''}}>
    <label for="isPercent" class="mb-0 mr-2">Discount in percents</label>
    <input type="checkbox" name="is_percent" value="1" id="isPercent">
</div>
<div class="form-group">
    <label>Products for discount</label>
    <div class="row">
        <div class="col-sm-2">
            <input type="text" name="search" class="form-control" id="productSearchInput">
        </div>
        <div class="col-sm-1">
            <button class="btn btn-success" id="productSearchClear">Clear</button>
        </div>
    </div>
    <div class="row mt-3 mb-3">
        <div class="col-sm-7">
            <div class="product-discount-list">
                @foreach($products as $product)
                    <div class="card">
                        <div class="card-body">
                            <div class="product-discount d-flex justify-content-between align-items-center">
                                <div>{{ $loop->iteration }}</div>
                                <div class="name text-left">
                                    <span class="text-bold">Название: </span>
                                    <span>{{$product->name}}</span>
                                </div>
                                <div class="price text-left">
                                    <span class="text-bold">Цена: </span>
                                    <span>{{$product->price}}</span>
                                </div>
                                <input
                                    type="checkbox"
                                    name="products[]"
                                    value="{{$product->id}}"
                                    {{isset($discount) && $discount?->id === $product->discount_id ? 'checked' : '' }}
                                >
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
