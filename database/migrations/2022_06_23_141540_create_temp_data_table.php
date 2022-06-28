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
        Schema::create('temp_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('phase')->default('Not Started')->nullable();
            $table->string('priority')->default('Low')->nullable();
            $table->integer('status')->default(0);
            $table->integer('assigned')->default(0);
            $table->longText('due_date')->nullable();
            $table->string('user_id')->references('id')->on('users');
            $table->timestamp('assigned_date')->nullable();
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
        Schema::dropIfExists('temp_data');
    }
};
