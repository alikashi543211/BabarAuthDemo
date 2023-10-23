<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('system_contact_id')->nullable();
            //  $table->foreign('system_contact_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->string('first_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('mobile',20)->nullable();
            $table->string('email',100)->nullable();
            $table->bigInteger('designation')->nullable();
            $table->bigInteger('department')->nullable();
            $table->bigInteger('company_id')->nullable();


            $table->unsignedBigInteger('created_by')->nullable();
            // $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('last_modified_by')->nullable();
            // $table->foreign('last_modified_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('deleted_by')->nullable();
            // $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
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
