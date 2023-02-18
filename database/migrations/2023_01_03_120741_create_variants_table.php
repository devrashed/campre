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
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pro_id')->constrained('products');
            //$table->bigint('pro_id');
            $table->string('varname');
            $table->string('homepage');
            $table->integer('price');
            $table->string('image');
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

   public function product()
    {
     return $this->belongsTo('App\Models\Product');
    }

    public function down()
    {
        Schema::dropIfExists('variants');
    }
};
