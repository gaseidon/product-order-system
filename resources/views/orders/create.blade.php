@extends('layouts.app')

@section('title', 'Создание заказа')

@section('content')
    <h1>Создание заказа</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_fio" class="form-label">ФИО покупателя</label>
            <input type="text" class="form-control" id="user_fio" name="user_fio" required>
        </div>
        <div class="mb-3">
            <label for="product_id" class="form-label">Товар</label>
            <select class="form-control" id="product_id" name="product_id" required>
                <option value="">Выберите товар</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} ({{ number_format($product->price, 2) }} руб.)</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Количество</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Комментарий</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Создать заказ</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
