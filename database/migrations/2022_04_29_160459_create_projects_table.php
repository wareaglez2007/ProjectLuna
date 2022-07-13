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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('phase')->default('Not Started')->nullable();
            $table->string('priority')->default('Low')->nullable();
            $table->integer('status')->default(0);
            $table->integer('assigned')->default(0);
            $table->timestamp('due_date')->nullable();
            $table->integer('has_documents')->default(0);
            $table->integer('has_images')->default(0);

            $table->string('assinged_to')->references('id')->on('users');
            $table->string('reassigned_by')->references('id')->on('users')->nullabel();
            $table->timestamp('assigned_date')->nullable();
            $table->timestamp('reassigned_date')->nullable();
            $table->string('created_by')->references('id')->on('users');
            $table->string('modified_by')->references('id')->on('users')->nullable();
            $table->string('deleted_by')->references('id')->on('users')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('projects');
    }
};
