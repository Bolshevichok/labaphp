<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChessGrandmastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chess_grandmasters', function (Blueprint $table) {
            $table->id(); // Уникальный идентификатор
            $table->string('name'); // Имя гроссмейстера
            $table->string('country'); // Страна
            $table->date('birth_date'); // Дата рождения
            $table->integer('max_rating'); // Максимальный рейтинг
            $table->string('image_path')->nullable(); // Ссылка на картинку, может быть пустой
            $table->text('info')->nullable();
            $table->timestamps(); // Поля created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chess_grandmasters');
    }
}
