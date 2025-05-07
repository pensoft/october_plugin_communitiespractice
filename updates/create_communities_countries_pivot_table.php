<?php namespace Pensoft\CommunitiesPractice\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCommunitiesCountriesPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('pensoft_communitiespractice_countries')) {
            Schema::create('pensoft_communitiespractice_countries', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->integer('communities_practice_id')->unsigned();
                $table->integer('country_id')->unsigned();
                $table->primary(['communities_practice_id', 'country_id']);
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('pensoft_communitiespractice_countries');
    }
} 