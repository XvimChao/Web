<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\ReportType;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $reportType=ReportType::find($this->report_type_id);
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'content'=>$this->content,
            'location'=>$this->location,
            'longitude'=>$this->longitude,
            'latitude'=>$this->latitude,
            'img_link'=>$this->img_link,
            'report_type'=>$reportType
        ]; 
    }
}
