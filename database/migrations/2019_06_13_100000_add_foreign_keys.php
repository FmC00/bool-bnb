<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('apartment_service', function(Blueprint $table) {

         $table->foreign('apartment_id', 'apartment')
                ->references('id')
                ->on('apartments');

         $table->foreign('service_id', 'service')
               ->references('id')
               ->on('services');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('apartment_service', function(Blueprint $table) {

         $table->dropForeign('apartment');

         $table->dropForeign('service');
      });
    }
}
