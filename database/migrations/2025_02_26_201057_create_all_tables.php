<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        /*         Schema::create('types', function (Blueprint $table) {
                    $table->id();
                    $table->string('name', 100);
                    $table->string('slug', 100)->unique();
                    $table->softDeletes();
                    $table->timestamps();
                }); */
        /*         Schema::create('levels', function (Blueprint $table) {
                    $table->id();
                    $table->string('name', 100);
                    $table->string('slug', 100)->unique();
                    $table->softDeletes();
                    $table->timestamps();
                }); */
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->enum('status', ['draft', 'publish', 'unpublish'])->default('draft');
            $table->timestamp('finished_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams')->onDelete('cascade');
            $table->longText('question');
            $table->longText('image')->nullable();
            $table->string('select1', 100);
            $table->string('select2', 100);
            $table->string('select3', 100);
            $table->string('select4', 100);
            $table->string('select5', 100);
            $table->enum('correct_answer', ['select1', 'select2', 'select3', 'select4', 'select5']);
            $table->softDeletes();
            $table->timestamps();
        });
        /*         Schema::create('settings', function (Blueprint $table) {
                    $table->id();
                    $table->string('title');
                    $table->string('logo_path');
                    $table->string('favicon_path');
                    $table->string('instagram');
                    $table->string('youtube');
                    $table->string('facebook');
                    $table->string('x');
                    $table->timestamps();
                }); */
        /*         Schema::create('pages', function (Blueprint $table) {
                    $table->id();
                    $table->string('name', 100);
                    $table->string('slug', 100)->unique();
                    $table->string('logo_path');
                    $table->longText('content');
                    $table->integer('queue')->default(0);
                    $table->softDeletes();
                    $table->timestamps();
                }); */
        /*         Schema::create('admins', function (Blueprint $table) {
                    $table->id();
                    $table->string('name');
                    $table->string('email');
                    $table->string('password');
                    $table->timestamps();
                }); */
        /*         Schema::create('messages', function (Blueprint $table) {
                    $table->id();
                    $table->string('fullname');
                    $table->string('email');
                    $table->string('telephone');
                    $table->string('subject');
                    $table->longText('message');
                    $table->timestamps();
                }); */
    }
    public function down(): void
    {
        /*         Schema::dropIfExists('types');
                Schema::dropIfExists('levels'); */
        Schema::dropIfExists('exams');
        Schema::dropIfExists('questions');
        /*         Schema::dropIfExists('settings');
                Schema::dropIfExists('pages');
                Schema::dropIfExists('admins');
                Schema::dropIfExists('messages'); */
    }
};
