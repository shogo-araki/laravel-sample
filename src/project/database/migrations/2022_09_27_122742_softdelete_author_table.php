<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SoftdeleteAuthorTable extends Migration
{
    /**
     * Run the migrations.
     * マイグレーションファイルにソフトデリートカラムを追加する
     * php artisan make:migration softdelete_author_table --table=authors
     *
     * @return void
     */
    public function up()
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->dropColumn('delted_at');
        });
    }
}
