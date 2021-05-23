<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('users')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->string('date')->nullable();
            $table->string('address')->nullable();
            $table->boolean('is_free')->default(false);
            $table->enum('status',['active','disable'])->default('active');
            $table->string('interested_num')->default(0);
            $table->string('organized_by')->nullable();
            $table->string('link')->nullable();
            $table->boolean('is_physical')->default(false);
            $table->string('slug')->unique();

            $table->string('tags')->nullable();
            $table->text('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

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
        Schema::dropIfExists('events');
    }
}
