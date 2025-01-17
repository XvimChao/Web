<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Resources\ReportResource;
use App\Http\Requests\StoreReport;


class ReportController extends Controller
{
    

    /**
     * Функция возвращает массив заявок
     * @return JSONArray<Report>
     */
    public function getReports(){
        $reports=Report::all();
        return ReportResource::collection($reports);
    }
    /**
     * Функция возвращает одну заявку
     * @param int report_id
     * @return Report
     */
    public function getReport($report_id){
        return new ReportResource(Report::findOrFail($report_id));
    }
    
     /**
     * Функция добавляет заявку в базу  
     * @param Request
     */

     public function addReport(StoreReport $request){
        $user=$request->user();
        //$request->request->set('creator_id',$user->id);
        $request->merge(['creator_id'=>$user->id]);
        $report=Report::create($request->all());
        return new ReportResource($report);
     }
   
     /**
     * Функция обновляет заявку 
     * @param StoreReport
     */

     public function editReport(StoreReport $request){
         $report=Report::findOrFail($request->post('report_id'));
         if($request->user()->cannot('update', $report)){
            abort(403,'Wrong user account!');
        }
        else{
            $report->title=$request->post('title');
            $report->report_type_id=$request->post('report_type_id');
            $report->content=$request->post('content');
            $report->location=$request->post('location');
            $report->longitude=$request->post('longitude');
            $report->latitude=$request->post('latitude');
            $report->img_link=$request->post('img_link');
            $report->save();
            return new ReportResource($report);
        }          
    }
        
    /**
     * Функция удаляет заявку
     * @param Request
     * @param int report_id
     */
    public function deleteReport(Request $request,$report_id){
        $report=Report::findOrFail($report_id);
        $this->authorize('delete',$report);
        $report->delete();
        
        /*
        $user=$request->user();
        if($user->id==$report->creator_id){
        }
        else{
            abort(403,'Wrong user account!');
        }*/
    }

    
   
}
