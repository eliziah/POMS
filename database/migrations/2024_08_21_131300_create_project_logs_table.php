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
        Schema::create('project_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('action'); //1-created  2-updated  3-approved   4-deleted
            $table->integer('item'); //1-project    2-budget(cr)  3-sched(cr)   4-weekly report   5-progress(wr)  6-gate(wr)  7-phase(wr) 8-rag(wr)
            $table->String('from')->nullable();
            $table->String('to')->nullable();
            $table->String('remarks')->nullable(); //remarks of the action "Approved by PMO Head"
            $table->integer('user_id'); //who performed the action
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_logs');
    }
};
