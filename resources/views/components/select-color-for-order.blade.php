<div>
    <div class="form-group">
        <label>{{$label}}</label>
        <div class="row pl-3">
            @foreach($list as $item)
                <div class="mr-2">
                    <div
                        class="color-radio-body {{$item['name'] === $currentValue ? 'color-active' : ''}}"
                        title="{{$item['label'] ?? 'deleted element'}}"
                        style="width: 45px; height: 45px; background-color: {{$item['name']}}; cursor: pointer;"></div>
                    <input type="radio" name="{{$name}}"
                           value="{{$item['name']}}"
                           {{$item['name'] === $currentValue ? 'checked' : ''}}
                           style="display: none"
                    >
                </div>
            @endforeach
        </div>
    </div>
</div>
