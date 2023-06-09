@props([ 'name'=>'name', 'value'=>old($name), 'type'=>'text', 'invalid'=>''])
@php
    $id = 's'.Str::uuid();
@endphp

@switch($type)
    @case('checkbox')
        <input class="form-check-input {{$invalid}}" type="checkbox" value="1"
               name="{{$name}}" {{$attributes}} id="{{$id}}"
            {{$value?'checked':''}}
        >
        </div>
        @break
    @case('textarea')
        <textarea class="form-control {{$invalid}}" name="{{$name}}" value="{{$value}}" rows="10"
                  id="{{$id}}"></textarea>
        @break
    @case('html')
        <div class="{{$invalid}}">
            <input id="{{$id}}" value="{{$value}}" type="hidden" name="{{$name}}">
            <trix-editor class="form-control {{$invalid}}" input="{{$id}}"></trix-editor>
        </div>
        @once
            @push('js')
                <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
            @endpush
            @push('css')
                <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
            @endpush
        @endonce
        @break
    @case('date')
        <input id="{{$id}}" value="{{$value}}" name="{{$name}}">
        @once
            @push('js')
                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            @endpush
            @push('css')
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
            @endpush
        @endonce
        @push('js')
            <script>
                flatpickr("#{{$id}}", {});
            </script>
        @endpush
        @break
    @default

        <input type="{{$type}}" class="form-control {{$invalid}}" name="{{$name}}" {{$attributes}} value="{{$value}}">

@endswitch



