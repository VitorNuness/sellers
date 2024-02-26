@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between">
        <div class="mb-3">
            <a href="{{ route('sellers.create') }}" class="btn btn-success">Adicionar Vendedor</a>
        </div>
        <div>
            <a class="btn btn-success" href="{{ route('sales.create') }}">Nova Venda</a>
        </div>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sellers as $seller)
                    <tr>
                        <th>{{ $seller->id }}</th>
                        <td>{{ $seller->name }}</td>
                        <td>{{ $seller->mail }}</td>
                        <td><a href="{{ route('sellers.show', $seller->id) }}" class="btn btn-primary">Ver</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Nenhum vendedor cadastrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
