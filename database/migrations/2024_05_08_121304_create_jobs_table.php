<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('company_email');
            $table->string('company_website')->nullable();
            $table->integer('vacancy');
            $table->string('location');
            $table->foreignId('job_type_id')->constrained('job_types')->onDelete('cascade');
            $table->string('salary')->nullable();
            $table->string('experience');
            $table->text('job_description')->nullable();
            $table->text('benefits')->nullable();
            $table->text('responsibilty')->nullable();
            $table->text('qualification')->nullable();
            $table->integer('status')->default(1);
            $table->integer('isFeatured')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
