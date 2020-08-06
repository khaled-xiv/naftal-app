<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->unsignedBigInteger('center_id')->nullable();
            $table->foreign('center_id')->references('id')->on('centers');
            $table->integer('is_active')->default(1);
            $table->string('name');
            $table->string('fb_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('gmail_link')->nullable();
            $table->string('photo')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->unique()->nullable();
            $table->boolean('isVerified')->default(false);
            $table->string('address')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });


        DB::table('users')->insert([
            ['role_id' => '1', 'is_active' => 1,
                'name' => 'administrator',
                'email' => 'a.hachemi@esi-sba.dz',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
