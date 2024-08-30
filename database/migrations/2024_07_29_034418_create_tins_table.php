<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tins', function (Blueprint $table) {
            $table->id();
            $table->string('tieuDe');
            $table->string('tomTat');
            $table->string('urlHinh');
            $table->text('noiDung');
            $table->integer('idLT');
            $table->dateTime('ngayDang')->nullable();
            $table->integer('anHien')->default(1);
            $table->integer('noiBat')->default(0);
            $table->string('tags')->nullable();
            $table->string('lang')->default('vi');
            $table->integer('xem')->default(0);
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
        Schema::dropIfExists('tins');
    }
}