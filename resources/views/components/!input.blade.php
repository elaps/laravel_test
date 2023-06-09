@props([ 'name'=>'name', 'value'=>old($name),'label'=>'Заголовок', 'type'=>'text', 'description'])
@php
$id = 's'.Str::uuid();
$invalid = '';
$error = '';
if($errors->has($name)){

    $invalid = 'is-invalid';
    $error = "
        <div  class=\"invalid-feedback is-invalid \">
            {$errors->first($name)}
        </div>
    ";
}

@endphp
<div class="mb-3" >
    @switch($type)
        @case('checkbox')

            <div class="form-check">
                <input class="form-check-input {{$invalid}}"  type="checkbox" value="1"
                       name="{{$name}}" {{$attributes}} id="{{$id}}"
                       {{$value?'checked':''}}
                >
                <label class="form-check-label" for="{{$id}}">
                    {{$label}}
                </label>
                {!! $error !!}
            </div>
            @break
        @case('textarea')
            <div>
                <textarea class="form-control {{$invalid}}" name="{{$name}}" value="{{$value}}"  rows="10" id="{{$id}}"></textarea>
                {!! $error !!}
            </div>
            @break
        @case('html')
            <div>
                <label for="exampleFormControlInput1" class="form-label mb-1">{{$label}}</label>
                <input id="{{$id}}" value="{{$value}}" type="hidden" name="{{$name}}">
                <trix-editor class="form-control {{$invalid}}" input="{{$id}}"></trix-editor>

                {!! $error !!}
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
            <div>
                <label for="exampleFormControlInput1" class="form-label mb-1">{{$label}}</label>
                <input id="{{$id}}" value="{{$value}}" name="{{$name}}">
                {!! $error !!}
            </div>

            @once
                @push('js')
                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                @endpush
                @push('css')
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                @endpush
            @endonce
            @push('js')
                <script >
                    flatpickr("#{{$id}}", {});
                </script>
            @endpush
            @break
        @default
            <div>
                <label for="exampleFormControlInput1" class="form-label mb-1">{{$label}}</label>
                <input type="{{$type}}" class="form-control {{$invalid}}" name="{{$name}}" {{$attributes}} value="{{$value}}">
                {!! $error !!}
            </div>
    @endswitch
</div>


