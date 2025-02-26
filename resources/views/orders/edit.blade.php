@extends('layouts.app')

@section('content')
    <h1>Редактирование заказа #{{ $order->id }}</h1>
    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT') <!-- Указываем метод PUT для обновления -->

        <!-- ФИО покупателя -->
        <div class="mb-3">
            <label for="user_fio" class="form-label">ФИО покупателя</label>
            <input type="text" class="form-control" id="user_fio" name="user_fio" value="{{ $order->user_fio }}" required>
        </div>

        <!-- Товар -->
        <div class="mb-3">
            <label for="product_id" class="form-label">Товар</label>
            <select class="form-control" id="product_id" name="product_id" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $order->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} ({{ number_format($product->price, 2) }} руб.)
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Количество -->
        <div class="mb-3">
            <label for="quantity" class="form-label">Количество</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $order->quantity }}" min="1" required>
        </div>

        <!-- Комментарий -->
        <div class="mb-3">
            <label for="comment" class="form-label">Комментарий</label>
            <textarea class="form-control" id="comment" name="comment" rows="3">{{ $order->comment }}</textarea>
        </div>

        <!-- Статус -->
        <div class="mb-3">
            <label for="status" class="form-label">Статус</label>
            <select class="form-control" id="status" name="status" required>
                <option value="new" {{ $order->status == 'new' ? 'selected' : '' }}>Новый</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Выполнен</option>
            </select>
        </div>

        <!-- Кнопки -->
        <button type="submit" class="btn btn-primary">Обновить</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
