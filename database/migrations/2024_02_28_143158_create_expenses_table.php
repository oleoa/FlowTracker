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
    Schema::create('expenses', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user');
      $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
      $table->string('name');
      $table->unsignedBigInteger('category');
      $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
      $table->integer('amount');
      $table->date('date');
      $table->boolean('recurring')->default(false);
      $table->boolean('it_ends')->nullable()->default(false);
      $table->date('end_date')->nullable();
      $table->enum('frequency', ['day', 'week', 'month', 'quarter', 'halfyear', 'year', 'biennial'])->default('month')->nullable();
      $table->boolean('primary')->default(true);
      $table->unsignedBigInteger('expense')->nullable();
      $table->foreign('expense')->references('id')->on('expenses')->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('expenses');
  }
};
