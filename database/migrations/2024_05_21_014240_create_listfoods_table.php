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
        Schema::create('listfoods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('name', 300);
            $table->decimal('price', 15, 3);
            $table->date('produced_on')->format('d-m-Y');
            $table->unsignedBigInteger('Tfood_id');
            $table->string('description', 999);
            $table->foreign('Tfood_id')->references('id')->on('t_foods')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listfoods');
    }
};
