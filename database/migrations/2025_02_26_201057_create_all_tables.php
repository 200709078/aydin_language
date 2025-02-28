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
            $table->enum('status', ['draft','publish','unpublish'])->default('draft');
            $table->timestamp('finished_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
/*         Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('q_type', 100);
            $table->longText('content');
            $table->longText('answer');
            $table->string('select_1', 100);
            $table->string('select_2', 100);
            $table->string('select_3', 100);
            $table->string('select_4', 100);
            $table->string('select_5', 100);
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
            $table->foreignId('level_id')->constrained('levels')->onDelete('cascade');
            $table->foreignId('exam_id')->constrained('exams')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        }); */
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
/*         Schema::dropIfExists('questions'); */
/*         Schema::dropIfExists('settings');
        Schema::dropIfExists('pages');
        Schema::dropIfExists('admins');
        Schema::dropIfExists('messages'); */
    }
};
