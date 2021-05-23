<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('users')->onDelete('cascade');
            $table->string('address')->nullable();
            $table->string('link')->nullable();
            $table->string('title')->nullable();
            $table->string('category')->nullable();
            $table->string('job_type')->nullable();
            $table->string('job_level')->nullable();
            $table->string('employee_type')->nullable();
            $table->string('experience')->nullable();
            $table->string('salary')->nullable();
            $table->string('posted_date')->nullable();
            $table->string('last_date')->nullable();

            $table->longText('description')->nullable();
            $table->boolean('status')->default(true);
            $table->string('slug')->nullable();
            $table->boolean('is_featured')->default(false);
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
        Schema::dropIfExists('jobs');
    }
}
