<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licences', function (Blueprint $table) {
            $table->string('licence_key', 255)->primary();
            $table->string('system', 30);
            $table->string('client_id', 36)->nullable();
            $table->date('started_at')->nullable();
            $table->date('finally_at')->nullable();
            $table->string('plan', 3);
            $table->string('period', 10);
            $table->integer('amount_days')->nullable();
            $table->string('state', 3);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licences');
    }
}
