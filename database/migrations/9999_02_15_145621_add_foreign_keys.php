<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('products', function (Blueprint $table) {

      $table->foreignId('typology_id')
        ->constrained();
    });

    Schema::table('category_product', function (Blueprint $table) {

      $table->foreignId('category_id')
        ->constrained();
      $table->foreignId('product_id')
        ->constrained();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('products', function (Blueprint $table) {

      $table->dropForeign('products_typology_id_foreign');
    });

    Schema::table('category_product', function (Blueprint $table) {

      $table->dropForeign('category_product_category_id_foreign');
      $table->dropForeign('category_product_product_id_foreign');
    });
  }
};
