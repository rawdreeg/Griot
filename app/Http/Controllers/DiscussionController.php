<?php

namespace App\Http\Controllers;

use App\Model\Discussion;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\DiscussionResource;

class DiscussionController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['index','show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DiscussionResource::collection(Discussion::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {  
        $discussion = auth()->user()->discussion()->create(
            ['title'      => $request->title, 
            'slug'        =>  $request->slug, 
            'body'        =>  $request->body, 
            'user_id'     =>  $request->user_id,
            'hut_id'      => $request->hut_id,
        ]);
        return response( new DiscussionResource($discussion), Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        return new DiscussionResource($discussion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discussion $discussion)
    {
        auth()->user()->discussion()->update(
            ['title'      => $request->title, 
            'slug'        =>  $request->slug, 
            'body'        =>  $request->body, 
            'user_id'     =>  $request->user_id,
            ]
        );
        return  response('success', Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discussion $discussion)
    {
        $discussion->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
