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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Владелец файла
            $table->string('file_name'); // Название файла
            $table->string('file_path'); // Путь к файлу
            $table->bigInteger('file_size'); // Размер файла в байтах
            $table->string('file_extension'); // MIME-тип файла
            $table->text('description')->nullable(); // Описание файла
            $table->string('status')->default('active'); // Статус файла
            $table->timestamps(); // created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
