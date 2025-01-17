<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Resources\CommentResource;
use App\Http\Requests\StoreComment;

class CommentController extends Controller
{
    /**
     * Метод возвращает связанные с заявкой комментарии
     * @param int $report_id
     * @return Array<Comment>
     */
    public function getComments($report_id){
        $comments=Comment::where('report_id',$report_id)->get();
        return CommentResource::collection($comments);
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
    public function store(StoreComment $request)
    {
        $user=$request->user();
        //$request->request->set('creator_id',$user->id);
        $request->merge(['creator_id'=>$user->id]);
        $comment=Comment::create($request->all());
        return new CommentResource($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new CommentResource(Comment::findOrFail($id));
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
    public function update(StoreComment $request, $id)
    {
        $comment=Comment::findOrFail($id);

        if($request->user()->cannot('update', $comment)){
            abort(403,'Wrong user account!');
        }
        else{
            $comment->title=$request->post('title');
            $comment->report_id=$request->post('report_id');
            $comment->content=$request->post('content');
            $comment->save();
            return new CommentResource($comment);
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
        $comment=Comment::findOrFail($id);
        $this->authorize('delete',$comment);
        $comment->delete();
    }
}
