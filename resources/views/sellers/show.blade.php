@extends('layouts.app')
@section('content')

    <div class="mb-3">
        <a href="{{ route('sellers.index') }}" class="btn btn-primary">Voltar</a>
    </div>

    <div class="card p-3">
        <h1>#{{ $seller->id }} - {{ $seller->name }}</h1>

        <p>{{ $seller->mail }}</p>

        <div class="d-flex justify-content-evenly">

            <div class="mb-3">
                <a href="{{ route('sales.show', $seller->id) }}" class="btn btn-primary">Vendas</a>
            </div>

            <div class="mb-3">
                <a href="{{ route('sellers.edit', $seller->id) }}" class="btn btn-primary">Editar</a>
            </div>

            <div class="mb-3">
                <form action="{{ route('sellers.destroy', $seller->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </div>

        </div>
    </div>
@endsection
