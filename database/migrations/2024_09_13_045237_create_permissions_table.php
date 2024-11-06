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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_permission_id');
            $table->unsignedBigInteger('statut_permision_id');
            $table->string('user_email');
            $table->unsignedBigInteger('personnel_id');
            $table->string('description');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->foreign('type_permission_id')->references('id')->on('type_permissions')->onDelete('cascade');
            $table->foreign('statut_permision_id')->references('id')->on('statut_permisions')->onDelete('cascade');
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
