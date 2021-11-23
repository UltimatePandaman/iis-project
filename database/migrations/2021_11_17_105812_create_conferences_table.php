<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conferences', function (Blueprint $table) {
            $table->id();
            //relace pro uživatele
            $table->unsignedBigInteger('user_id');
            
            $table->string('name');
            $table->tinyText('description')->nullable();
            $table->string('image')->nullable();
            //začátek a konec konference
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();

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
        Schema::dropIfExists('conferences');
    }
}
