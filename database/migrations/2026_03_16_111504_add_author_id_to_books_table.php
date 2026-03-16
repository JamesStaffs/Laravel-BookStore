<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('author');
            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id')->references('id')->on('authors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('books', 'author_id')) {
            Schema::table('books', function (Blueprint $table) {
                $table->dropForeign(['author_id']);
                $table->dropColumn('author_id');
            });
        }
        Schema::table('books', function (Blueprint $table) {
            $table->string('author')->nullable();
        });
    }
};
