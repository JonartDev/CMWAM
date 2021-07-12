<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSPGSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_s_p_g_s', function (Blueprint $table) {
            $table->string('Company');
            $table->string('Branch_Name');
            $table->string('Handling_Branch');
            $table->string('Store_Name');
            $table->string('Brand');
            $table->string('Serial_Number');
            $table->date('start');
            $table->date('end');
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
        Schema::dropIfExists('m_s_p_g_s');
    }
}
