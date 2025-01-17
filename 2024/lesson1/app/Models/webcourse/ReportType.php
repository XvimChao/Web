<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reports;
use Illuminate\Support\Facades\Auth;

class ReportType extends Model
{
    use HasFactory;

    protected $fillable=['title','description','tag','creator_id'];
    /**
     * Функция которая вернет все связанные с типом запроса запросы
     * @return Collection 
     */

     public function reports(){
        return $this->hasMany(Report::class,'report_type_id');
     }
     /**
      * Добавляем creator_id при создании
      * @return void
      */
      public static function boot()
      {
         parent::boot();
         self:: creating(function($reportType){
            $user = Auth::user();
         if ($user) {
               $reportType->creator_id = $user->id;
         } else {
               // Обработка случая, когда пользователь не аутентифицирован
               $reportType->creator_id = null; // Или любое другое значение по умолчанию
         }
         });
      }
}
