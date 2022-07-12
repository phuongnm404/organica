<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('other_name');
            $table->string('other_phone');
            $table->string('other_province_id');
            $table->string('other_district_id');
            $table->string('other_ward_id');
            $table->string('other_address_id');
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
        Schema::dropIfExists('address_list');
    }
}
