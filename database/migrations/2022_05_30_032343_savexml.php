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
        

        Schema::create('receiveXml', function (Blueprint $table) {
            $table->increments('Rid');
            $table->string('jobid');
            $table->string('acid')->nullable();
            $table->string('recipient')->nullable();
            $table->string('content')->nullable();
            $table->string('status')->nullable();
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
