<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('total_followers')->default(0)->after('email');
            $table->integer('total_following')->default(0)->after('total_followers');
            $table->integer('total_tweets_posted')->default(0)->after('total_following');
            $table->string('link_to_profile')->nullable()->after('total_tweets_posted');
            $table->string('link_to_avatar')->nullable()->after('link_to_profile');
        });
    }
}
