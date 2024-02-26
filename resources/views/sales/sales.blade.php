@extends('layouts.app')
@section('content')
    <div class="mb-3">
        <a href="{{ route('sellers.show', $sellerId) }}" class="btn btn-primary">Voltar</a>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Comissão</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sales as $sale)
                    <tr>
                        <th>{{ $sale->sellerId }}</th>
                        <td>{{ $sale->sellerName }}</td>
                        <td>{{ $sale->sellerMail }}</td>
                        <td>{{ $sale->commission }}</td>
                        <td>{{ $sale->saleValue }}</td>
                        <td>{{ $sale->saleDate }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Nenhuma venda registrada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
