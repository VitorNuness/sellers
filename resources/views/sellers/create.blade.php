@extends('layouts.app')
@section('content')
    <div class="mb-3">
        <a href="{{ route('sellers.index') }}" class="btn btn-primary">Voltar</a>
    </div>
    <div class="mx-auto">
        <h1 class="container mb-3">Adicionar Vendedor</h1>
    </div>

    <form action="{{ route('sellers.store') }}" method="POST" class="container w-75">
        <x-seller-form />
    </form>
@endsection
