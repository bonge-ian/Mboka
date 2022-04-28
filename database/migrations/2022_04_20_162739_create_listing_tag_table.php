<?php

use App\Models\Tag;
use App\Models\Listing;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * @return void
     */
    public function up() : void
    {
        Schema::create('listing_tag', function (Blueprint $table) {
            $table->foreignIdFor(Listing::class, 'listing_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(Tag::class, 'tag_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();
        });
    }

    /**
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('listing_tag');
    }
};
