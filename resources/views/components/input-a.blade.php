@props([ 'model', 'field', 'type'=>'text','hint', 'visible' => true])
@php
    $invalid = '';
    $error = '';
    if($errors->has($field)){

        $invalid = 'is-invalid';
        $error = "
            <div  class=\"invalid-feedback \">
                {$errors->first($field)}
            </div>
        ";
    }
    $label = $model->attributeLabel($field);
@endphp

@if($visible)

    <div class="mb-3">
        <label class="form-label mb-1 d-block">{{$label}}</label>
        <x-input
            :type="$type"
            :name="$field"
            :value="$model->$field??null"
            :invalid="$invalid"
        >
        </x-input>
        {!! $error !!}
    </div>
@endif
