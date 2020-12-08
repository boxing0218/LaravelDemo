<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubjectIdToPostsTable extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->bigInteger('subject_id')->after('content');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('subject_id');
        });
    }
} 