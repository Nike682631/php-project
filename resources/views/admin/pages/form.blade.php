@extends('twill::layouts.form')

@section('contentFields')
    @formField('wysiwyg', [
    'name' => 'description',
    'label' => 'Description',
    'toolbarOptions' => [
    ["font" => ["serif", "sans-serif", "monospace"]],
    ['header' => [2, 3, 4, 5, 6, false]],
    'bold',
    'italic',
    'underline',
    'strike',
    ]])

    @formField('block_editor')
@stop
