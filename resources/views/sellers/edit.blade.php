@extends('layouts.app')
@section('content')
    <div class="mb-3">
        <a href="{{ route('sellers.show', $seller->id) }}" class="btn btn-primary">Voltar</a>
    </div>
    <form action="{{ route('sellers.update', $seller->id) }}" method="POST" class="container w-75">
        @method('PUT')
        <x-seller-form :seller='$seller' />
    </form>
@endsection
