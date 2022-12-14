<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *no
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->text('contact_description');
            $table->text('contact_address');
            $table->string('contact_phone');
            $table->string('contact_fax');
            $table->string('contact_email');
            $table->string('contact_line');
            $table->string('contact_line');
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
        Schema::dropIfExists('contacts');
    }
}
