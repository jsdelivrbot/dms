@section('js')
    @parent
    <script>
        _config['file_structure_store'] = "{!! route('file_structure_store') !!}";
        _config['file_structure_get'] = "{!! route('file_structure_get') !!}";

    </script>
@stop