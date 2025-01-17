<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReportType;
use App\Http\Resources\ReportTypeResource;
use App\Http\Requests\StoreReportType;


class ReportTypeController extends Controller
{
    /**
     * Функция возвращает массив типов заявок
     * @return JSONArray<ReportType>
     */
    public function getReportTypes(){
        $reportTypes=ReportType::all();
        return ReportTypeResource::collection($reportTypes);
    }
    /**
     * Функция возвращает тип заявки
     * @param int report_type_id
     * @return Report
     */
    public function getReportType($report_type_id){
        return new ReportTypeResource(ReportType::findOrFail($report_type_id));
    }
    /**
     * Функция возвращает тип заявки по тегу
     * @param string tag
     * @return Report
     */
    public function getReportTypeByTag($tag){
        $reportType=ReportType::where("tag",$tag)->get();
        if(!is_object($reportType)){
            abort(403,'Wrong Tag');
        }
        return ReportTypeResource::collection($reportType);
    }
    /**
     * Функция добавляет тип заявок в базу  
     * @param StoreReportType
     */
    public function addReportType(StoreReportType $request){
        $report=ReportType::create($request->all());
        return new ReportTypeResource($report);
     }

     /**
     * Функция обновляет вид заявки  
     * @param StoreReportType
     */
    public function editReportType(StoreReportType $request){
        $reportType=ReportType::findOrFail($request->post('report_type_id'));
        if($request->user()->cannot('update', $reportType)){
            abort(403,'Wrong user account!');
        }
        else{
            $reportType->title=$request->post('title');
            $reportType->description=$request->post('description');
            $reportType->tag=$request->post('tag');
            $reportType->save();
            return new ReportTypeResource($reportType);

        }
     }

     /**
     * Функция удаляет тип заявки
     * @param Request
     * @param int report_type_id
     */
    public function deleteReportType(Request $request,$report_type_id){
        $reportType=ReportType::findOrFail($report_type_id);
        $connectedReports=$reportType->reports;
        $this->authorize('delete',$reportType);
        if(count($connectedReports)==0){
            $reportType->delete();
        }
        else{
            abort(403,'Connected reports exists');
        }
       
    }
}
