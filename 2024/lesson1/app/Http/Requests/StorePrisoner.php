<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrisoner extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'case_number'=>'required',
            'surname'=>'nullable',   
            'first_name'=>'nullable',
            'middle_name'=>'nullable',               
            'nickname'=>'nullable',
            'birth_year'=>'nullable|integer|digits:4',
            'birth_place'=>'nullable',
            'nationality'=>'nullable',
            'party_affiliation'=>'nullable',
            'education_level'=>'nullable',
            'residence_location'=>'nullable',
            'marital_status'=>'nullable',
            'occupation'=>'nullable',
            'workplace'=>'nullable',
            'arrest_day'=>'nullable|integer|min:1|max:31',
            'arrest_month'=>'nullable|integer|min:1|max:12',
            'arrest_year'=>'nullable|integer|digits:4',
            'court_body'=>'nullable',
            'verdict_day'=>'nullable|integer|min:1|max:31',
            'verdict_month'=>'nullable|integer|min:1|max:12',
            'verdict_year'=>'nullable|integer|digits:4',
            'articles'=>'nullable',
            'decision'=>'nullable',
            'rehabilitation_day'=>'nullable|integer|min:1|max:31',
            'rehabilitation_month'=>'nullable|integer|min:1|max:12',
            'rehabilitation_year'=>'nullable|integer|digits:4',
            'rehabilitation_authority'=>'nullable',
            'memory_book_volume_number'=>'required|integer',
            'memory_book_page_number'=>'required|integer',
        ];
    }
}
