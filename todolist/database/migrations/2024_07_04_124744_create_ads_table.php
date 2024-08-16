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
        Schema::create('ads', function (Blueprint $table) { 
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('price')->nullable();
            $table->unsignedBigInteger('user_id')/* ->nullable() */;
            $table->foreign('user_id')->references('id')
                                        ->on('users')
                                        ->onUpdate('cascade')
                                        ->onDelete('cascade');

          /*   $table->unsignedBigInteger('condition_id');
            $table->foreign('condition_id')->references('id')
                                            ->on('conditions')
                                            ->onUpdate('cascade')
                                            ->onDelete('cascade'); */

            $table->unsignedBigInteger('location_id')/* ->nullable() */;
            $table->foreign('location_id')->references('id')
                                        ->on('locations')
                                        ->onUpdate('cascade')
                                        ->onDelete('cascade');

            $table->unsignedBigInteger('categorie_id')/* ->nullable() */;
            $table->foreign('categorie_id')->references('id')
                                            ->on('categories')
                                            ->onUpdate('cascade')
                                            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
