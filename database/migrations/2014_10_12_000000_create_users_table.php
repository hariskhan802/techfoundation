<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('is_super_admin')->default('0');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('secondary_email')->nullable()->unqiue();
            $table->string('phone')->unique();
            $table->string('secondary_phone')->nullable()->unqiue();
            $table->string('username')->unique();
            $table->string('cnic')->nullable()->unique();
            $table->text('address')->nullable();            
            $table->string('picture')->nullable();
            $table->string('dob');            
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
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
};
