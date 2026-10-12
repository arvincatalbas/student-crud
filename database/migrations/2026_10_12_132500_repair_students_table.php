<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('students')) {
            Schema::create('students', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('course');
                $table->timestamps();
            });

            return;
        }

        $hasName = Schema::hasColumn('students', 'name');
        $hasEmail = Schema::hasColumn('students', 'email');
        $hasCourse = Schema::hasColumn('students', 'course');

        if (!$hasName || !$hasEmail || !$hasCourse) {
            Schema::table('students', function (Blueprint $table) use ($hasName, $hasEmail, $hasCourse) {
                if (!$hasName) {
                    $table->string('name')->nullable();
                }

                if (!$hasEmail) {
                    $table->string('email')->nullable()->unique();
                }

                if (!$hasCourse) {
                    $table->string('course')->nullable();
                }
            });
        }
    }

    public function down(): void
    {
        // Keep repaired columns to avoid removing existing student data.
    }
};
