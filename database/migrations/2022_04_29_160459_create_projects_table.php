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
            $table->string('name');
            $table->longText('description')->nullable();
            $table->set('phase', [
                'Not Started',
                'In Progress',
                'On Hold',
                'Pending Customer',
                'Pending Supplier',
                'Pending Other',
                'Completed',
                'Cancelled',
                'Resolved',
                'Delayed',
                'On Time'
            ]);
            $table->set('priority', [
                'Low',
                'Medium',
                'High'

            ]);
            $table->integer('status')->default(0);
            $table->integer('assigned')->default(0);
            $table->timestamp('due_date')->nullable();
            $table->integer('has_documents')->default(0);
            $table->integer('has_images')->default(0);
            $table->string('assinged_to')->references('id')->on('users');
            $table->string('reassigned_by')->references('id')->on('users');
            $table->timestamp('assigned_date')->nullable();
            $table->timestamp('reassigned_date')->nullable();
            $table->string('created_by')->references('id')->on('users');
            $table->string('modified_by')->references('id')->on('users');
            $table->string('deleted_by')->references('id')->on('users');
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
