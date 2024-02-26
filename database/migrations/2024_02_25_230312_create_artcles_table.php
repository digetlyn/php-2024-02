<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.  실행되는 코드
     */
    public function up(): void
    {
        Schema::create('artcles', function (Blueprint $table) {
            $table->id();
            $table->string('body',255);
            $table->bigInteger('use_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations. 롤백했을때..
     */
    public function down(): void
    {
        Schema::dropIfExists('artcles');
    }
};
