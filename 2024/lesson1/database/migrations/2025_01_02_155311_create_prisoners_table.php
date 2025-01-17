<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrisonersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prisoners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('case_number');
            $table->string('surname');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('nickname');
            $table->integer('birth_year');
            $table->string('birth_place');
            $table->string('nationality');
            $table->string('party_affiliation');            // Принадлежность к партии
            $table->string('education_level');              // Уровень образования
            $table->string('residence_location');           // Место проживания
            $table->string('marital_status');               // Семейное положение
            $table->string('occupation');                   // Род занятий, должность
            $table->string('workplace');                    // Место работы
            $table->integer('arrest_day');
            $table->integer('arrest_month');
            $table->integer('arrest_year');
            $table->string('court_body');                   // Орган, рассматривавший дело
            $table->integer('verdict_day');
            $table->integer('verdict_month');
            $table->integer('verdict_year');
            $table->string('articles');                     // Статья (статьи)
            $table->string('decision');                     // Решение по делу (приговор)
            $table->integer('rehabilitation_day');
            $table->integer('rehabilitation_month');
            $table->integer('rehabilitation_year');
            $table->string('rehabilitation_authority');     // Орган, принявший решение о реабилитации
            $table->integer('memory_book_volume_number');    // Номер тома Книги памяти жертв политических репрессий
            $table->integer('memory_book_page_number');
            //FK - создатель
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prisoners');
    }
}
