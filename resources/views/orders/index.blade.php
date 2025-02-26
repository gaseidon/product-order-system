@extends('layouts.app')

@section('content')
    <h1>Список заказов</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Создать заказ</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ФИО покупателя</th>
                <th>Дата создания</th>
                <th>Статус</th>
                <th>Итоговая цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user_fio }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ number_format($order->quantity * $order->price_per_unit, 2) }} руб.</td>
                    <td>
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-info">Просмотр</a>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">Редактировать</a>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
