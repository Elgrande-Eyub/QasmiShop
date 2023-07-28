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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->string('status')->default('En attente');
            $table->string('orderNumber')->nullable();

            $table->string('payment_status')->default('Non payé');

            $table->string('shipping_address')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();

            $table->float('total',10,2)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
