<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('growths', function (Blueprint $table) {
            $table->dropColumn('img');
            $table->integer('p_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('growths', function (Blueprint $table) {
            $table->boolean('img')->default(false);
            $table->boolean('p_id')->default(false); 
        });
    }
}
