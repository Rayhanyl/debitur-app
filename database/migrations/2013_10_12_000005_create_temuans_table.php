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
        Schema::create('temuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('no')->default('');
            $table->string('object_pemeriksaan');
            $table->string('jenis_audit');
            $table->string('auditor');
            $table->string('risk');
            $table->string('issue_summary');
            $table->string('issue_detail');
            $table->string('recomendation');
            $table->string('corrective_action_plan');
            $table->string('status');
            $table->date('due_date');
            $table->date('overtime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temuans');
    }
};
