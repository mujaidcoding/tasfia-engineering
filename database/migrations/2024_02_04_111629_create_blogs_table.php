<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('blogcat_id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->longText('desc');
            $table->text('tags');
            $table->string('author');
            $table->string('meta_title');
            $table->text('meta_desc');
            $table->text('meta_keywords');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
