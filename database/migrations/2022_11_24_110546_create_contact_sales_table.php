<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('contact_id');
            $table->string('sales_name');
            $table->string('tel');
            $table->integer('status')->nullable()->default('1')->comment('0 = ปิดใช้งาน 1 = เปิดใช้งาน');
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
        Schema::dropIfExists('contact_sales');
    }
}
