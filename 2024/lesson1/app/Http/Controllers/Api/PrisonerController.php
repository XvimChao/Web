<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prisoner;
use App\Http\Resources\PrisonerResource;
use App\Http\Requests\StorePrisoner;

class PrisonerController extends Controller
{
    public function advanced_search(Request $request)
    {
        // Получаем все данные из формы
        $data = $request->only([
            'surname',
            'first_name',
            'middle_name',
            'nickname',
            'birth_year',
            'birth_place',
            'residence_location',
            'workplace',
            'party_affiliation',
            'education_level',
            'nationality',
            'case_number',
            'arrest_day',
            'arrest_month',
            'arrest_year',
            'court_body',
            'verdict_day',
            'verdict_month',
            'verdict_year',
            'articles',
            'decision',
            'rehabilitation_day',
            'rehabilitation_month',
            'rehabilitation_year',
            'rehabilitation_authority',
            'occupation',
            'marital_status',
            'memory_book_volume_number',
            'memory_book_page_number'
        ]);

        // Начинаем новый запрос
        $query = Prisoner::query();

        // Проходим по каждому полю и добавляем условия к запросу, если они не пустые
        foreach ($data as $field => $value) {
            if (!empty($value)) {
                $query->orWhere($field, 'LIKE', "%{$value}%");
            }
        }

        // Выполняем запрос для получения результатов
        $prisoners = $query->get();

        return view('prisoners.advanced_search', compact('prisoners','data'));
    }

    /**
     * Метод поиска по таблице prisoners
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $attributes = [
            'surname', 
            'first_name', 
            'middle_name', 
           
        ];

        // Если строка запроса пустая, получаем всех заключенных
        if (empty($query)) {
            $prisoners = Prisoner::all();
        } else {
            // Начинаем запрос
            $words = explode(' ', $query);

            $prisoners = Prisoner::query();

            // Добавляем условия для каждого атрибута
            foreach ($words as $word) {
                $word = trim($word);
                if ($word) {
                    foreach ($attributes as $attribute) {
                        $prisoners->orWhere($attribute, 'LIKE', "%{$word}%");
                    }
                }
            }

            // Получаем результаты
            $prisoners = $prisoners->get();
        }

        return view('prisoners.index', compact('prisoners'));
    }

    /**
     * Метод возвращает все карточки репрессированного
     * @return Array<Prisoner>
     */
    public function getPrisoners(){
        $prisoners=Prisoner::all();
        return PrisonerResource::collection($prisoners);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrisoner $request)
    {
        $user=$request->user();
        //$request->request->set('creator_id',$user->id);
        $request->merge(['creator_id'=>$user->id]);
        $prisoner=Prisoner::create($request->all());
        return new PrisonerResource($prisoner);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prisoner = Prisoner::findOrFail($id);
        return response()->json([
            'case_number' => $prisoner->case_number,
            'full_name' => "{$prisoner->surname} {$prisoner->first_name} {$prisoner->middle_name}",
            'date_of_birth' => $prisoner->birth_year,
            'birth_place' => $prisoner->birth_place,
            'residence_location' => $prisoner->residence_location,
            'workplace' => $prisoner->workplace,
            'nationality' => $prisoner->nationality,
            'education_level' => $prisoner->education_level,
            'arrest_date' => "{$prisoner->arrest_day}.{$prisoner->arrest_month}.{$prisoner->arrest_year}",
            'articles' => $prisoner->articles,
            'court_date' => "{$prisoner->verdict_day}.{$prisoner->verdict_month}.{$prisoner->verdict_year}",
            'court_body' => $prisoner->court_body,
            'decision' => $prisoner->decision,
            'rehabilitation_authority' => $prisoner->rehabilitation_authority,
            'rehabilitation_date' => "{$prisoner->rehabilitation_day}.{$prisoner->rehabilitation_month}.{$prisoner->rehabilitation_year}",
            'volume_number' => $prisoner->memory_book_volume_number,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePrisoner $request, $id)
    {
        $prisoner=Prisoner::findOrFail($id);

        
        if($request->user()->cannot('update', $prisoner)){
            abort(403,'Wrong user account!');
        }
        else{
            $prisoner->case_number = $request->post('case_number');
            $prisoner->surname = $request->post('surname');
            $prisoner->first_name = $request->post('first_name');
            $prisoner->middle_name = $request->post('middle_name');
            $prisoner->nickname = $request->post('nickname');
            $prisoner->birth_year = $request->post('birth_year');
            $prisoner->birth_place = $request->post('birth_place');
            $prisoner->nationality = $request->post('nationality');
            $prisoner->party_affiliation = $request->post('party_affiliation');
            $prisoner->education_level = $request->post('education_level');
            $prisoner->residence_location = $request->post('residence_location');
            $prisoner->marital_status = $request->post('marital_status');
            $prisoner->occupation = $request->post('occupation');
            $prisoner->workplace = $request->post('workplace');
            $prisoner->arrest_day = $request->post('arrest_day');
            $prisoner->arrest_month = $request->post('arrest_month');
            $prisoner->arrest_year = $request->post('arrest_year');
            $prisoner->court_body = $request->post('court_body');
            $prisoner->verdict_day = $request->post('verdict_day');
            $prisoner->verdict_month = $request->post('verdict_month');
            $prisoner->verdict_year = $request->post('verdict_year');
            $prisoner->articles = $request->post('articles');
            $prisoner->decision = $request->post('decision');
            $prisoner->rehabilitation_day = $request->post('rehabilitation_day');
            $prisoner->rehabilitation_month = $request->post('rehabilitation_month');
            $prisoner->rehabilitation_year = $request->post('rehabilitation_year');
            $prisoner->rehabilitation_authority = $request->post('rehabilitation_authority');
            $prisoner->memory_book_volume_number = $request->post('memory_book_volume_number');
            $prisoner->memory_book_page_number = $request->post('memory_book_page_number');
            $prisoner->save();
            return new PrisonerResource($prisoner);
        }          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prisoner=Prisoner::findOrFail($id);
        $this->authorize('delete',$prisoner);
        $prisoner->delete();
    }
}
