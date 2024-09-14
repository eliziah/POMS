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
        Schema::create('cr_sched', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('crs_id');
            $table->integer('type')->default(1);
            $table->string('old_live');
            $table->string('new_live');
            $table->string('old_close');
            $table->string('new_close');
            $table->text('remarks');
            $table->text('link');
            $table->integer('status')->default(0);
            $table->text('reason')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cr_sched');
    }
};
