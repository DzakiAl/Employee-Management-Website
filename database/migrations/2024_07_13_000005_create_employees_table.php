<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->text('photo');
            $table->text('first_name');
            $table->text('last_name');
            $table->date('date_of_birth');
            $table->text('gender');
            $table->text('email');
            $table->text('phone');
            $table->text('address');
            $table->date('date_hired');
            $table->foreignId('position_id')->nullable()->constrained('positions')->onDelete('set null');
            $table->foreignId('department_id')->nullable()->constrained('departments')->onDelete('set null');
            $table->text('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
