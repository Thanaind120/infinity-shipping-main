<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password', 15);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number', 20);
            $table->string('company_name')->nullable();
            $table->string('company_type')->nullable();
            $table->string('company_type_other')->nullable();
            $table->text('address')->nullable();
            $table->text('address_more')->nullable()->comment('ที่อยู่ ที่2');
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country_region')->nullable();
            $table->string('colleague_email')->nullable();
            $table->date('last_login')->nullable();
            $table->date('email_verified_at')->nullable();
            $table->string('remember_token', 100);
            $table->integer('status')->nullable()->default('0')->comment('0 = ปิดใช้งาน 1 = เปิดใช้งาน');
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
        Schema::dropIfExists('members');
    }
}
