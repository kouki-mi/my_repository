@extends('template.growth_form')

@section('form_title')
計画の編集
@endsection

@section('form_action')
<form action="{{ route('growths.edit',['id' => $current_growth->id]) }}" method="post">
@endsection