<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('short_content');
            $table->string('term');
            $table->integer('client_id');
            $table->integer('vendor_id');
            $table->integer('created_user');
            $table->integer('updated_user');
            $table->integer('agreement_status');
            $table->integer('agreement_kind');
            $table->dateTime('end_time');
            $table->integer('price_total');
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
        Schema::dropIfExists('agreements');
    }
}
