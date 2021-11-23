<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            //relace pro uživatele
            $table->unsignedBigInteger('user_id');

            $table->string('nickname')->nullable();

            //personalizace profilu, ať si profil může uživatel udělat pěkný.
            $table->string('profile_image')->nullable();
            $table->string('background_image')->nullable();
            $table->string('motto')->nullable();
            $table->string('description')->nullable();

            $table->timestamps();

            //vždycky pěkné hodit index pro foreign keys
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
