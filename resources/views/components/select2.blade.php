<div>
    <div>
        <div class="form-group">
            <label>{{$label}}</label>
            <select class="select2" style="width: 100%;" name="{{$name}}"
            >
                @foreach($list as $item)
                    <option
                        value="{{$item['id']}}" {{$currentValue === $item['id'] ? 'selected' : ''}}>{{$item['name']}}</option>
                @endforeach
            </select>

        </div>
    </div>
</div>
