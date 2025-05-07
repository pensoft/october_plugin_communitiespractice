<?php namespace Pensoft\CommunitiesPractice\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CommunitiesPracticeCommunitiesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('pensoft_communitiespractice_communities')) {
            Schema::create('pensoft_communitiespractice_communities', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('title')->nullable();
                $table->string('slug')->nullable();
                $table->text('description')->nullable();
                $table->integer('country_id')->nullable();
                $table->string('country_code')->nullable();
                $table->integer('sort_order')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('pensoft_communitiespractice_communities');
    }
}