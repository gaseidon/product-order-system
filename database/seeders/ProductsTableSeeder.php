<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Импортируем DB для отключения проверки внешних ключей

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Отключаем проверку внешних ключей
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Очистка таблицы перед заполнением
        Product::truncate();

        // Включаем проверку внешних ключей
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Получаем категории
        $categories = Category::all();

        // Тестовые данные для товаров
        $products = [
            [
                'name' => 'Ноутбук ASUS',
                'description' => 'Мощный ноутбук для работы и игр.',
                'price' => 75000.50,
                'category_id' => $categories->where('name', 'легкий')->first()->id,
            ],
            [
                'name' => 'Смартфон iPhone 14',
                'description' => 'Новый флагман от Apple.',
                'price' => 89999.99,
                'category_id' => $categories->where('name', 'хрупкий')->first()->id,
            ],
            [
                'name' => 'Холодильник Samsung',
                'description' => 'Большой холодильник с морозильной камерой.',
                'price' => 120000.00,
                'category_id' => $categories->where('name', 'тяжелый')->first()->id,
            ],
            [
                'name' => 'Наушники Sony',
                'description' => 'Беспроводные наушники с шумоподавлением.',
                'price' => 15000.00,
                'category_id' => $categories->where('name', 'легкий')->first()->id,
            ],
            [
                'name' => 'Телевизор LG',
                'description' => '4K телевизор с диагональю 55 дюймов.',
                'price' => 65000.00,
                'category_id' => $categories->where('name', 'хрупкий')->first()->id,
            ],
        ];

        // Добавляем товары в базу данных
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
