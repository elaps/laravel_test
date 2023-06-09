@extends('layouts.main')

@section('content')

    @php
        if(isset($id)){
            $action = route('user.posts.update', $id);
            $method = 'PUT';
        }else{
            $action = route('user.posts.store');
            $method = 'POST';
        }
    @endphp

    <h1>{{__('Редактирование поста')}}</h1>

    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <x-form :method="$method" :action="$action">
        <x-input-a type="text" :model="$post" field="title"></x-input-a>
        <x-input-a type="html" :model="$post" field="content"></x-input-a>
        <x-input-a type="date" :model="$post" field="created_at"></x-input-a>
        <x-input-a type="checkbox" :model="$post" field="published" :visible="true"></x-input-a>
    </x-form>

@endsection
