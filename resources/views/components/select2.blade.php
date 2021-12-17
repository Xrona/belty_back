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

        @section('adminlte_js')
            <script>
                try {
                    $('.select2').select2();
                } catch (error) {
                    console.log(error)
                }
            </script>
        @endsection
    </div>
</div>
