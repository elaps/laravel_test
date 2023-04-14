@extends('layouts.main')
@section('content')
    <h1>{{__('Список постов')}}</h1>

    <x-el-db-grid.table
        :query="$posts"

        :config="[
        'columns' => [
            'id'=>[
                'label',
                'filter',
                'headerValue',
                'headerOptions',

                'value',
                'format',
                'options',
            ],
            'title',
            'created_at'
        ]
    ]"
    >

    </x-el-db-grid.table>

@endsection
