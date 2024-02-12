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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer("ordertype");
            $table->string("name");
            $table->integer("quantity");
            $table->integer('length')->nullable();
            $table->string("supplier")->nullable();
            $table->decimal("price")->nullable();
            $table->integer("materialid")->nullable();
            $table->integer("productid")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
