<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Показывает форму для создания нового заказа.
     */
    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    /**
     * Сохраняет новый заказ в базе данных.
     */
    public function store(StoreOrderRequest $request)
    {
        $product = Product::findOrFail($request->product_id);

        Order::create([
            'user_fio' => $request->user_fio,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price_per_unit' => $product->price,
            'comment' => $request->comment,
            'status' => 'new',
        ]);

        return redirect()->route('orders.index')->with('success', 'Заказ успешно создан!');
    }

    /**
     * Отображает информацию о конкретном заказе.
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Показывает форму для редактирования заказа.
     */
    public function edit(Order $order)
{
    $products = Product::all(); // Получаем все товары для выпадающего списка
    return view('orders.edit', compact('order', 'products'));
}

/**
 * Обновляет заказ в базе данных.
 */
public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());
        return redirect()->route('orders.index')->with('success', 'Заказ успешно обновлен!');
    }

    /**
     * Удаляет заказ из базы данных.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Заказ успешно удален!');
    }

    /**
     * Изменяет статус заказа на "выполнен".
     */
    public function complete(Order $order)
    {
        $order->update(['status' => 'completed']);
        return redirect()->route('orders.show', $order)->with('success', 'Статус заказа изменен на "выполнен"!');
    }
}
