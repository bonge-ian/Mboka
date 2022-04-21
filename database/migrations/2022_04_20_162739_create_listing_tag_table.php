<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Listing;
use App\Models\Tag;

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
