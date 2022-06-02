<div class="row">
    <div class="col-sm-2">
        <div class="form-group mt-4">
            <label>Status</label>
            <select class="select2" style="width: 100%;" name="status">
                @foreach($statusList as $key => $item)
                    <option value="{{$key}}" {{$order->status === $key ? 'selected' : ''}}>{{$item}}</option>
                @endforeach
            </select>
            {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-sm-3 col-12">
        <div class="border p-3 ">
            <h2>User info</h2>
            <div class="form-group mt-3 {{ $errors->has('surname') ? 'has-error' : ''}}">
                <label for="surname" class="control-label">surname</label>
                <input class="form-control" name="surname" type="text" value="{{ $order?->surname ?? ''}}">
                {!! $errors->first('surname', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                <label for="name" class="control-label">name</label>
                <input class="form-control" name="name" type="text" value="{{ $order?->name ?? ''}}">
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email" class="control-label">email</label>
                <input class="form-control" name="email" type="text" value="{{ $order?->email ?? ''}}">
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                <label for="phone" class="control-label">phone</label>
                <input class="form-control" name="phone" type="text" value="{{ $order?->phone ?? ''}}">
                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('post_index') ? 'has-error' : ''}}">
                <label for="post_index" class="control-label">Post index</label>
                <input class="form-control" name="post_index" type="text" value="{{ $order?->post_index ?? ''}}">
                {!! $errors->first('post_index', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                <label for="city" class="control-label">City</label>
                <input class="form-control" name="city" type="text" value="{{ $order?->city ?? ''}}">
                {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group {{ $errors->has('street') ? 'has-error' : ''}}">
                        <label for="street" class="control-label">Street</label>
                        <input class="form-control" name="street" type="text" value="{{ $order?->street ?? ''}}">
                        {!! $errors->first('street', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group {{ $errors->has('house') ? 'has-error' : ''}}">
                        <label for="house" class="control-label">House</label>
                        <input class="form-control" name="house" type="text" value="{{ $order?->house ?? ''}}">
                        {!! $errors->first('house', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group {{ $errors->has('flat') ? 'has-error' : ''}}">
                        <label for="flat" class="control-label">Flat</label>
                        <input class="form-control" name="flat" type="text" value="{{ $order?->flat ?? ''}}">
                        {!! $errors->first('flat', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-7 offset-sm-1 col-12">
        <div class="border p-3">
            <h2>Products</h2>
            @foreach($order->orderProducts as $key => $product)
                <div class="border p-3 mb-4">
                    @if($product->product_id)
                        <x-select2 name="products[{{$key}}][product_id]" :list="$products"
                                   :currentValue="$product->product_id" label="Product"/>
                    @else
                        <label>Product</label>
                        <p>product not found</p>
                    @endif
                    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
                    <div class="form-group {{ $errors->has('product_name') ? 'has-error' : ''}}">
                        <label for="product_name" class="control-label">Product name</label>
                        <input class="form-control" name="products[{{$key}}][product_name]" type="text"
                               value="{{ $product?->product_name ?? ''}}">
                        {!! $errors->first('product_name', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('buy_price') ? 'has-error' : ''}}">
                        <label for="buy_price" class="control-label">Buy price</label>
                        <input class="form-control" name="products[{{$key}}][buy_price]" type="text"
                               value="{{ $product?->buy_price ?? ''}}">
                        {!! $errors->first('buy_price', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('count') ? 'has-error' : ''}}">
                        <label for="count" class="control-label">Count</label>
                        <input class="form-control" name="products[{{$key}}][count]" type="text"
                               value="{{ $product?->count ?? ''}}">
                        {!! $errors->first('count', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
                        @php
                            if($product->product_id) {
                                $colorList = $product->product->colors->toArray();
                            } else {
                                $colorList = $colors;
                            }
                        @endphp
                        <x-select-color-for-order
                            name="products[{{$key}}][color]" :list="$colorList"
                            :current-value="$product->color" label="Color"
                        />
                        {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('size') ? 'has-error' : ''}}">
                        @php
                            if ($product->product_id) {
                                $sizeList = $product->product->sizes->toArray();
                            } else {
                                $sizeList = $sizes;
                            }
                        @endphp
                        <x-select2-for-order
                            name="products[{{$key}}][size]" :list="$sizeList"
                            :current-value="$product->size" label="Size"
                        />
                        {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
                    </div>
                    <label for="is_gift">Is gift</label>
                    <div class="form-group {{ $errors->has('is_gift') ? 'has-error' : ''}}">
                        <input type="checkbox"
                               name="products[{{$key}}][is_gift]" {{$product->is_gift ? 'checked' : ''}}>
                        {!! $errors->first('is_gift', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('engraving') ? 'has-error' : ''}}">
                        <label for="engraving" class="control-label">Engraving</label>
                        <input class="form-control" name="products[{{$key}}][engraving]" type="text"
                               value="{{ $product?->engraving ?? ''}}">
                        {!! $errors->first('engraving', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
