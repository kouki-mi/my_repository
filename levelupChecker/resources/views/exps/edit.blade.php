@extends('template.exp_form')
@section('form_action')
<form action="{{ route('exps.edit',['id' => $current_exp->id, 'growth_id' => $growth_id]) }}" method="post">
@endsection

@section('form_title')
やる事の編集
@endsection

