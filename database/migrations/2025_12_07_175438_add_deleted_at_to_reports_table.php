<?php

##use Illuminate\Database\Migrations\Migration;
##use Illuminate\Database\Schema\Blueprint;
##use Illuminate\Support\Facades\Schema;

##class AddDeletedAtToReportsTable extends Migration
##{
   ## public function up()
  ##  {
       ## Schema::table('reports', function (Blueprint $table) {
         ##   $table->softDeletes(); // Добавляет столбец deleted_at
        ##    $table->foreignId('status_id')->default(1)->constrained();
    ##    });
    ##}

   ## public function down()
    ##{
   ##     Schema::table('reports', function (Blueprint $table) {
   ##        $table->dropSoftDeletes(); // Удаляет столбец deleted_at
      ##  });
    ##}
##}