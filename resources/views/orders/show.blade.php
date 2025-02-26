@extends('layouts.app')

@section('content')
    <h1>Заказ #{{ $order->id }}</h1>
    <p><strong>ФИО покупателя:</strong> {{ $order->user_fio }}</p>
    <p><strong>Товар:</strong> {{ $order->product->name }}</p>
    <p><strong>Количество:</strong> {{ $order->quantity }}</p>
    <p><strong>Цена за единицу:</strong> {{ number_format($order->price_per_unit, 2) }} руб.</p>
    <p><strong>Итоговая цена:</strong> {{ number_format($order->quantity * $order->price_per_unit, 2) }} руб.</p>
    <p><strong>Статус:</strong> {{ $order->status }}</p>
    <p><strong>Комментарий:</strong> {{ $order->comment }}</p>

    @if($order->status === 'new')
        <form action="{{ route('orders.complete', $order) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Отметить как выполненный</button>
        </form>
    @endif

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад</a>
@endsection
