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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->text('description');
            $table->string('image_uri')->nullable();
            $table->string('content_uri');
            $table->string('pdf_uri',255);
            //relaciones
            //La entidad Lesson, definomos la relacion Lesson (1) => Levels (m)

            $table->bigInteger('level_id')->unsigned();
            //si borro un registro de Lesson por efecto de cascada tambien se borra el registo vinculado con Levels
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
