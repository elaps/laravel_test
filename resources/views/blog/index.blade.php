@extends('layouts.main')

@section('content')
    <h1>{{__('Список постов')}}</h1>
    <div class="row">
        @forelse($posts as $post)

            <div class="col-12 col-md-4 mb-3">
                <x-card>
                    <a href="{{route('blog.show',$loop->index)}}">{{$post->title}}</a>
                </x-card>
            </div>

        @empty
            {{__('Пусто')}}
        @endforelse
    </div>
@endsection
