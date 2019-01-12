<?php

namespace App\Http\Controllers;

use App\Model\Hut;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\HutResource;

class HutController extends Controller
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
        return HutResource::collection(Hut::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hut = new Hut();
        $hut->name = $request->name;
        $hut->slug = str_slug( $request->name);
        $hut->save();

        return response(new HutResource($hut), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Hut  $hut
     * @return \Illuminate\Http\Response
     */
    public function show(Hut $hut)
    {
        return new HutResource($hut);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Hut  $hut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hut $hut)
    {
        // auth()->user()->hut()->update($request->all());
        $hut->update(
            [
                'name'=>$request->name,
                'slug' => str_slug($request->name)
            ]
        );
        return  response('success', Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Hut  $hut
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hut $hut)
    {
        $hut->delete();
        return response('success', Response::HTTP_NO_CONTENT);
    }
}
