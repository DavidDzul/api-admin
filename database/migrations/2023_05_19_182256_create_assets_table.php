<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('controlNumber');
            $table->date('acquisitionDate');
            $table->string('providerName');
            $table->string('invoiceNumber');
            $table->enum("assetype", ["EQUIPMENT", "FURNITURE", "EVENTS", "AUDIO"]);
            $table->string('companyBrand');
            $table->string('model');
            $table->text('description');
            $table->string('serialNumber');
            $table->string('AcquisitionValue');
            $table->enum("state", ["GOOD", "EXCELLENT", "REGULAR", "FUNCTIONLESS"]);
            $table->string('location');
            $table->enum("use", ["FORMATION", "OPERATIONAL", "OTHER"]);
            $table->string('otherUse')->nullable();
            $table->foreignId('id_user')->nullable()->constrained('users')->onDelete('set null');
            $table->text('observation')->nullable();
            // $table->enum("campus", ["MERIDA", "VALLADOLID", "OXKUTZCAB", "TIZIMIN"]);
            // $table->string('personCharge');
            // $table->string('personPosition');
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
        Schema::dropIfExists('assets');
    }
}
