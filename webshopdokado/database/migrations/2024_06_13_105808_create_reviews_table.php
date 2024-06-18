<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // Unieke ID voor elke review
            $table->unsignedBigInteger('user_id'); // Verwijzing naar de gebruikers-ID
            $table->string('name'); // Naam van de gebruiker die de review plaatst
            $table->text('review'); // Tekst van de review
            $table->integer('rating'); // Rating van de review
            $table->timestamps(); // Timestamp kolommen (created_at en updated_at)

            // Buitenlandse sleutelrelatie met de users-tabel
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews'); // Dropt de reviews-tabel indien deze bestaat
    }
}
