@extends('layouts.imprimir')

@section('conteudo')
    @include('listagem.listagem', ['imprimir' => true])
@endsection