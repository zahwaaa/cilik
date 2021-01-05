<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBillingToProductCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_checkouts', function (Blueprint $table) {
            $table->string('first_name')->after('is_paid');
            $table->string('last_name')->after('first_name');
            $table->string('email')->after('last_name');
            $table->string('phone')->after('email');
            $table->string('address')->after('phone');
            $table->string('address_detail')->after('address');
            $table->string('zipcode')->after('address_detail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_checkouts', function (Blueprint $table) {

        });
    }
}
