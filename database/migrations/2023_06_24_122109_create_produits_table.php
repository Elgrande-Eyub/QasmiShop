<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->string('type')->nullable(); // organique or not ..

            $table->unsignedBigInteger('category_id')->nullable(); // coffee , milk , animals food
            $table->foreign('category_id')->references('id')->on('produit_categories')->onDelete('restrict');

            $table->unsignedBigInteger('secteur_id')->nullable(); // coffee , milk , animals food
            $table->foreign('secteur_id')->references('id')->on('secteurs')->onDelete('restrict');

            $table->string('sku')->unique();
            $table->integer('expireDays'); // how many days after oppening - life
            $table->date('dateProduction')->nullable(); // date of production
            $table->date('dateExpired')->nullable(); // date of Expiration
            $table->boolean('variation');

            $table->boolean('isPublic')->nullable();
            $table->longText('preDescription')->nullable(); // simple Discription
            $table->longText('description')->nullable(); // details Description

            $table->string('packageType')->nullable(); // Carton , Package,Bottle ...
            $table->longText('PackagingDelivery')->nullable();  // Information about Packaging and delivery
            $table->longText('autres')->nullable();
            $table->longText('Usage')->nullable();
            $table->longText('Warnings')->nullable(); // Information about warning

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produits');
    }

};
