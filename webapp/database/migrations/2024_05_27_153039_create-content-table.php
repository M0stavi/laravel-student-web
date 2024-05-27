<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('content', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name');
            $table->string('caption');
            $table->string('bmc1');
            $table->string('bmc2');
            $table->string('bmc3');
            $table->string('bmc4');
            $table->string('bmc5');
            $table->string('bmc6');
            $table->string('bmc7');
            $table->string('bmc8');
            $table->string('bmc9');
            $table->string('content')->nullable();
            $table->integer('reviews')->default(0);
            $table->rememberToken();
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
        //
    }
};
