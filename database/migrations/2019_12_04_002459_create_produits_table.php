<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_produit');
            $table->string('photo_produit');
            $table->string('prix_produit');
            $table->text('descr_produit');
            $table->integer('status')->default(0);
            $table->integer('reduction');
            $table->unsignedBigInteger('souscategorie_id');
            $table->foreign('souscategorie_id')->references('id')->on('sous_categories');
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
        Schema::dropIfExists('produits');
    }
}
