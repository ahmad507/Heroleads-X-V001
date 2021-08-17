<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('leads', function (Blueprint $table) {
            $table->id('id');
            $table->string('leads_id');
            $table->string('leads_name');
            $table->string('leads_email')->unique();
            $table->string('leads_phone')->nullable();
            $table->biginteger('source_id')->unsigned()->index();
            $table->biginteger('media_id')->unsigned()->index();
            $table->biginteger('status_id')->unsigned()->index();
            $table->integer('flag')->default(1);
            $table->timestamps();

            //$table->foreign('source_id')->references('id')->on('sources')->onDelete('cascade')->onUpdate('cascade');
             //$table->foreign('media_id')->references('id')->on('media')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
