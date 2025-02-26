<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Определяет, авторизован ли пользователь для выполнения запроса.
     */
    public function authorize()
    {
        return true; // Разрешаем всем пользователям выполнять этот запрос
    }

    /**
     * Правила валидации.
     */
    public function rules()
    {
        return [
            'user_fio' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'comment' => 'nullable|string',
        ];
    }
}
