<div>
    <div class="form-group">
        <label>{{$label}}</label>
            <select class="select2" style="width: 100%;" name="{{$name}}[]" multiple>
                @foreach($list as $item)
                    <option
                        value="{{$item['id']}}" {{in_array($item['id'], $currentValues ?? []) ? 'selected' : ''}}>{{$item['name']}}</option>
                @endforeach
            </select>
    </div>
</div>
