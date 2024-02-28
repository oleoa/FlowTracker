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
    Schema::create('goals', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user');
      $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
      $table->string('name');
      $table->integer('amount');
      $table->unsignedBigInteger('category');
      $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
      $table->boolean('recurring')->default(true);
      $table->date('start_date')->nullable();
      $table->date('end_date')->nullable();
      $table->enum('frequency', ['day', 'week', 'month', 'quarter', 'halfyear', 'year', 'biennial'])->default('month')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('goals');
  }
};
