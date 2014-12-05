<?php

use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class Initial extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebussola_userfacebook_social_ids', function(Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->string('facebook_id');

            $table->primary(['user_id', 'facebook_id']);
            $table->index(['user_id', 'facebook_id']);
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
        Schema::dropIfExists('ebussola_userfacebook_social_ids');
    }

}
