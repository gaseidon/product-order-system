@extends('layouts.app')

@section('content')
    <h1>Продукт: {{ $product->name }}</h1>
    <p><strong>Описание:</strong> {{ $product->description }}</p>
    <p><strong>Цена:</strong> {{ number_format($product->price, 2) }} руб.</p>
    <p><strong>Категория:</strong> {{ $product->category->name }}</p>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад</a>
@endsection
