@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <div>
            <x-alert />
        </div>
    @endif
    <form action="{{ route('sales.store') }}" method="POST" class="container w-75">
        @csrf
        <div class="form-group mb-3">
            <label for="seller" class="form-label">Código Vendedor:</label>
            <input type="number" class="form-control" name="seller" id="seller" value="{{ old('seller') }}">
        </div>

        <div class="form-group mb-3">
            <label for="value" class="form-label">Valor da venda:</label>
            <input type="number" step="0.01" class="form-control" name="value" id="value"
                value="{{ old('value') }}">
        </div>
        <div class="mb-3">
            <button type="submit" class="w-100 btn btn-success">Adicionar</button>
        </div>
    </form>
@endsection
