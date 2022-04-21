<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** 
     * @return void
     */
    public function up() : void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug');
            $table->string('headquarters');
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->mediumText('bio');
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('companies');
    }
};
