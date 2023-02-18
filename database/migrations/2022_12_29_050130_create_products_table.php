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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('categoryID');
            $table->longText('description');
            $table->string('slug');
            $table->string('sku');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function variants()
    {
      return $this->hasOne('App\Models\Variant');
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
