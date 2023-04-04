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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->text('message');
            $table->enum('type', ['Complaint','Suggestion']);
            $table->string('student_university_id',20);
            $table->string('student_name',45);
            $table->string('student_email',45);
            $table->enum('status', ['Open','Closed'])->default('Open');
            $table->string('image',150)->nullable();
            $table->boolean('urgent')->default(false);
            $table->timestamp('closed_date')->nullable();
            $table->text('response')->nullable();
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
        Schema::dropIfExists('complaints');
    }
};
