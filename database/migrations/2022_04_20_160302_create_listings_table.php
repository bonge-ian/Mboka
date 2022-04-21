<?php

use App\Models\User;
use App\Models\Company;
use App\Models\Category;
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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class, 'user_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Category::class, 'category_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Company::class, 'company_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title')->index();
            $table->string('slug')->unique();

            $table->string('status')->index();
            $table->string('listing_type')->index();
            $table->string('employee_availability')->index();
            $table->unsignedSmallInteger('on_site_days')->nullable();

            $table->string('location')->index();
            $table->string('apply_url');

            $table->text('overview');
            $table->text('experience');
            $table->text('perks');

            $table->boolean('is_highlighted')->default(false);
            $table->boolean('is_pinned')->default(false);
            $table->boolean('show_logo')->default(true);

            $table->string('highlight_color')->nullable();

            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('listings');
    }
};
