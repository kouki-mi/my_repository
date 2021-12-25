@extends('template.growth_form')

@section('form_title')
計画を入力しよう！
@endsection

@section('form_action')
<form action="{{ route('growths.create') }}" method="post">
@endsection

