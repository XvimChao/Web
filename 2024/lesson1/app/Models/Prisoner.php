<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prisoner extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_number',               // Номер уголовного дела
        'surname',                   // Фамилия
        'first_name',                // Имя
        'middle_name',               // Отчество
        'nickname',                  // Прозвище или второе имя
        'birth_year',                // Год рождения
        'birth_place',               // Место рождения
        'nationality',               // Национальность
        'party_affiliation',         // Принадлежность к партии
        'education_level',           // Уровень образования
        'residence_location',        // Место проживания
        'marital_status',            // Семейное положение
        'occupation',                // Род занятий, должность
        'workplace',                 // Место работы
        'arrest_day',                // День ареста
        'arrest_month',              // Месяц ареста
        'arrest_year',               // Год ареста
        'court_body',                // Орган, рассматривавший дело
        'verdict_day',               // День вынесения приговора
        'verdict_month',             // Месяц вынесения приговора
        'verdict_year',              // Год вынесения приговора
        'articles',                  // Статья (статьи)
        'decision',                  // Решение по делу (приговор)
        'rehabilitation_day',        // День реабилитации
        'rehabilitation_month',      // Месяц реабилитации
        'rehabilitation_year',       // Год реабилитации
        'rehabilitation_authority',  // Орган, принявший решение о реабилитации
        'memory_book_volume_number', // Номер тома Книги памяти жертв политических репрессий (физический вариант)
        'memory_book_page_number',   // Страница Книги памяти жертв политических репрессий
        'creator_id'
    ];
}
