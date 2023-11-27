<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->bigInteger('user_created')->unsigned()->nullable();
            $table->bigInteger('user_updated')->unsigned()->nullable();
            $table->string('arrivalDate');
            $table->string('roomNumber');
            $table->integer('ageOfGuest');
            $table->string('guestExempted')->nullable();
            $table->string('firstName');
            $table->string('lastName');
            $table->integer('numberOfNights');
            $table->string('color');
            $table->tinyInteger('lockRecord')->nullable();
            $table->timestamps();

            $table->foreign('user_created', 'user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accommodations');
    }
}
