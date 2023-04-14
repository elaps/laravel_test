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
        <x-input type="text" name="title" :value="$post->title??null"></x-input>
        <x-input type="html" name="content" :value="$post->content??null"></x-input>
    </x-form>

@endsection
