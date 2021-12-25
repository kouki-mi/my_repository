@extends('template.exp_form')
@section('form_action')
<form action="{{ route('exps.create',['id' => $growth_id]) }}" method="post">
@endsection

@section('form_title')
やる事を追加しよう！
@endsection

