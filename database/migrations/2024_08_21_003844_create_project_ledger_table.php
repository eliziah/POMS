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
        Schema::create('project_ledger', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('cost_component');
            $table->integer('cost_type');
            $table->string('description');
            $table->double('value');
            $table->text('link')->nullable();            
            $table->integer('status')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_ledger');
    }
};
