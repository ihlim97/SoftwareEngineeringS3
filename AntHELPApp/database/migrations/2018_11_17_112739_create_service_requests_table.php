<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_id')->references('id')->on('services');
            $table->unsignedInteger('user_id')->references('id')->on('users');
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->string('status');
            $table->string('note')->nullable();
            $table->string('duration');
            $table->decimal('total', 9, 2);
            $table->string('location');
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('service_requests');
    }
}
