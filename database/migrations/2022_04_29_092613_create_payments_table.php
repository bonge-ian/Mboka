<?php

use App\Models\User;
use App\Models\Listing;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(Listing::class)
                ->nullable()
                ->index()
                ->constrained()
                ->nullOnDelete();

            $table->string('code');
            $table->string('payment_method');
            $table->string('status');

            $table->unsignedBigInteger('flw_id');

            $table->decimal('amount', 8, 1, true);

            $table->timestamp('paid_at');

            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
