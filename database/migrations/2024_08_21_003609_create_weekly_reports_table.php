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
        Schema::create('weekly_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('workweek');
            $table->date('start');
            $table->date('end');
            $table->double('progress')->default(0);
            $table->integer('gate')->default(1);
            $table->integer('phase')->default(1);
            $table->integer('project_status')->default(1);
            $table->integer('rag')->default(1);
            $table->text('executive');
            $table->text('highlights')->nullable();
            $table->text('help')->nullable();
            $table->text('nextsteps')->nullable();
            $table->text('risks')->nullable();
            $table->integer('status')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weekly_reports');
    }
};
