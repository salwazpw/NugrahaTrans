<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->string('nik', 16)->primary();
            $table->string('foto')->nullable();
            $table->string('nama');
            $table->string('level');
            $table->string('username',15)->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('no_hp',13);
            $table->enum('jenis_kelamin',['P','L']);
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
