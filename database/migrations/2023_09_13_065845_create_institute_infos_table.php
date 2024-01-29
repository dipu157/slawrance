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
        Schema::create('institute_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('phone',12)->nullable();
            $table->string('email',50)->unique()->nullable();
            $table->string('logo',100)->nullable();
            $table->string('social_link1',50)->nullable();
            $table->string('social_link2',50)->nullable();
            $table->string('social_link3',50)->nullable();
            $table->string('social_link4',50)->nullable();
            $table->string('map_link',2000)->nullable();
            $table->string('address',200)->nullable();
            $table->string('website',50)->nullable();
            $table->string('locale',20)->default('en-US')->comments('English, Bangla');
            $table->boolean('status')->default(true);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institute_infos');
    }
};
