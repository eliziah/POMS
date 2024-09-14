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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('proj_id');
            $table->string('name');
            $table->string('short_name');
            $table->text('description');
            $table->string('area_type');
            $table->string('initiative_type');
            $table->string('sponsor_name');
            $table->string('sponsor_dept');
            $table->string('sponsor_sub')->default('ABSI');
            $table->double('progress')->default(0);
            $table->string('platform')->nullable();
            $table->integer('gate')->default(1);
            $table->integer('phase')->default(1);
            $table->integer('status')->default(1);
            $table->integer('rag')->default(1);
            $table->date('p_start');
            $table->date('p_live');
            $table->date('p_close');
            $table->date('a_live')->nullable();
            $table->date('a_close')->nullable();
            $table->double('budget');
            $table->string('pm');
            $table->text('artifact')->nullable();
            $table->double('cpi')->default(0);
            $table->double('spi')->default(0);
            $table->double('fw')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
