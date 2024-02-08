<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // уникальный идентификатор
            $table->string('title'); // название объекта или продукта
            $table->string('domain_name')->nullable(); // веб-адрес, если применимо
            $table->unsignedBigInteger('views')->default(0); // количество просмотров
            $table->unsignedBigInteger('likes')->default(0); // количество лайков
            $table->unsignedBigInteger('orders')->default(0); // количество заказов
            $table->integer('age')->nullable(); // возраст объекта или продукта
            $table->text('description')->nullable(); // описание или дополнительная информация
            $table->text('advantages')->nullable(); // описание или дополнительная информация
            $table->decimal('price', 10, 2); // цена объекта или продукта
            $table->decimal('discount', 5, 2)->default(0.00); // размер скидки, если применимо
            $table->timestamps(); // метки времени created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
