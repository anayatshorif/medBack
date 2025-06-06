<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_email');
            $table->string('customer_name');
            $table->string('customer_phone')->nullable();
            $table->string('status')->default('completed');
            $table->decimal('total_amount', 10, 2)->default(0.00);
            $table->timestamps();

            $table->foreign('user_email')->references('email')->on('users')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
