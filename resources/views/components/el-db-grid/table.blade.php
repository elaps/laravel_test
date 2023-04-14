<div>
    {{--
    @json($rows)
    --}}
    <table class="table">
        <thead>
        <tr>
            @foreach($config['columns'] as $key => $column)
                @json($column)
            @endforeach
        </tr>
        </thead>

        <tbody>
        @foreach($rows as $row)
            <tr>
            <tr>
                @foreach($config['columns'] as $column)
                    {{--<td>{{$row->$column}}</td>--}}
                @endforeach
            </tr>
        @endforeach
        </tbody>

    </table>
</div>
