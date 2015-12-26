<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->string('controller' , 225);
            $table->string('label' , 225);
            $table->string('permalink' , 225);
            $table->string('icon' , 225);
            $table->integer('order');
            $table->timestamps();

            $table->index(['parent_id' , 'controller' , 'permalink' , 'order']);
                    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menus');
    }
}
