@extends('layouts.base')
@section('pageTitle', 'HomePage')

@section('content')
    <h1 class="text-primary">Fumetteria</h1>
    <h3>Per visualizzare i nostri fumetti -> <a href="{{ route('comics.index') }}" class="text-danger">Clicca qui</a></h3>
@endsection