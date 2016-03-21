@extends('__layouts.pages.datatable.index')

@section('css')
		@parent
		<link rel="stylesheet" href="{!! asset('vendor\file-input\css\fileinput.min.css') !!}">
		<link rel="stylesheet" href="{!! asset('custom/css/file-icons.css') !!}">
@stop

@section('custom-javascript-files')
	@parent
	<!-- includ js-ul pentru datatable creat dinamic -->
	{!! 
	App\Comptechsoft\Ui\Html\Scripts::make([
		'custom/js/director-files/grid',
		'custom/js/director-files/index',
		'custom/js/director-files/file',
	])->render()
	!!}
@stop

@section('jquery-document-ready')
	@parent
	var grid  = new gridDirectorFiles();
	var index = new indexGrid({
		grid       : grid,
		toolbar    : '{!! $toolbar !!}',
		_token     : '{{ csrf_token() }}',
		form_width : 4
	}).init();
	console.log(index);
	index.afterShowform = function(impact){
		(new App.File(impact)).init();
	}
@stop
