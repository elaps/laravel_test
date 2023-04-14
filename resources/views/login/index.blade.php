@extends('layouts.main')
@section('content')
    <div class="row justify-content-md-center mt-5">
        <div class="col-12 col-md-6 col-md-offset-3 ">
            <x-card>
                <x-slot name="header">
                    <h1>safdsadf</h1>
                </x-slot>
                <x-form button-text="Войти" method="post" :action="route('login')">
                    <x-input label="Проверка" placeholder="{{__('Введите текст')}}" name="email"></x-input>
                    <x-input type="password" placeholder="{{__('Введите пароль')}}"
                             label="{{__('Пароль')}}"
                             name="password"></x-input>
                    <x-input type="checkbox"></x-input>
                </x-form>
            </x-card>
        </div>
    </div>
@endsection
