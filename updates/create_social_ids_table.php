<?php namespace Ebussola\Userfacebook\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateSocialIdsTable extends Migration
{

    public function up()
    {
        Schema::create('ebussola_userfacebook_social_ids', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ebussola_userfacebook_social_ids');
    }

}
