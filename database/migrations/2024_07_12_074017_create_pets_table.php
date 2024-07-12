<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\PetSpecies;
use App\Constants\PetStatus;
use App\Models\User;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable(false);
            $table->integer('age')->nullable(true);
            $table->enum('species', PetSpecies::valuesToArray())->nullable(false);
            $table->string('breed')->nullable(true);
            $table->string('description')->nullable(true);
            $table->enum('status', PetStatus::valuesToArray())->nullable(false);

            $table->foreignIdFor(User::class)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
