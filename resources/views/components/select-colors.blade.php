<div>
    <div class="form-group">
        <label>{{$label}}</label>
        <div class="row pl-3">
            @foreach($list as $item)
                <div class="mr-2">
                    <div
                           class="color-body {{in_array($item['id'], $currentValues ?? []) ? 'color-active' : ''}}"
                           title="{{$item['label'] ?? 'not set'}}"
                           style="width: 45px; height: 45px; background-color: {{$item['name']}}; cursor: pointer"></div>
                    <input type="checkbox" name="{{$name}}[]"
                           value="{{$item['id']}}"
                           {{in_array($item['id'], $currentValues ?? []) ? 'checked' : ''}}
                           style="display: none">
                </div>
            @endforeach
        </div>
    </div>
</div>
