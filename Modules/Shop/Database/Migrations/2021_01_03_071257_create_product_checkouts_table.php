<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 50);
            $table->string('jumlah');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->char('is_paid')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_checkouts');
    }
}
