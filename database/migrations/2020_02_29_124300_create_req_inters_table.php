<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReqIntersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('req_inters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('equipement_id')->index()->unsigned()->nullable();
            $table->string('number')->unique();
            $table->string('description');
            $table->enum('degree_urgency',array('1','2','3'));
            $table->timestamp('received_at_1')->nullable();
            $table->string('description_2')->nullable();
            $table->timestamp('received_at_2')->nullable();
            $table->string('description_3')->nullable();
            $table->boolean('need_district')->default(0);
            $table->boolean('valide')->default(0);
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
        Schema::dropIfExists('req_inters');
    }
}
