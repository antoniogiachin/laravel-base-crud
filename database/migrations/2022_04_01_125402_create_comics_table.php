<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            
            //titolo
            $table->string('title', 200);
            // descrizione
            $table->text('description');
            //link img
            $table->text('thumb');
            //prezzo
            $table->decimal('price', 4,2);
            //serie
            $table->string('series', 150);
            //data vendita
            $table->date('sale_date');
            //tipo
            $table->string('type', 100); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
}
