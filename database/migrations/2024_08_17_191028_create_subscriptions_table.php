<?php

use App\Models\User;
use App\Models\Offer;
use App\Models\Sport;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Sport::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Offer::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('plan',['monthly','annual','six_months'])->default('monthly');
            $table->decimal('price', 8, 2);
            $table->decimal('discount', 8, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['pending', 'active', 'inactive', 'suspended','accepted','rejected'])->default('pending');
            $table->text('suspension_reason')->nullable();
            $table->text('rejection_reason')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
