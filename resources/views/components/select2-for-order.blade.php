<div>
    <div>
        <div class="form-group">
            <label>{{$label}}</label>
            <select class="select2" style="width: 100%;" name="{{$name}}"
            >
                @foreach($list as $item)
                    <option
                        value="{{$item['name']}}" {{$currentValue === $item['name'] ? 'selected' : ''}}>{{$item['name']}}</option>
                @endforeach
            </select>

        </div>
    </div>
</div>
