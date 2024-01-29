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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string("company");
            $table->string("street");
            $table->integer("housenumber");
            $table->string('addition');
            $table->string("postalcode");
            $table->string("country");
            $table->string("city");
            $table->string("contact");
            $table->string("gender");
            $table->string("phonenumber");
            $table->string("mail");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
