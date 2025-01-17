<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skill;

class SkillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(\Gate::allows('isAdmin') || \Gate::allows('isDeveloper') || \Gate::allows('isMechanic')){
            return Skill::with('user', 'service')->latest()->get();
        // }
    }

    public function mySkills() {
        $user = auth('api')->user()->id;
        if(auth('api')->user()){
            return Skill::where('user_id', $user)->with('user', 'service')->latest()->get();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return Skill::firstOrCreate([
            'user_id' => $request['user_id'],
            'service_id' => $request['service_id'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);

        // delete the skill

        $skill->delete();


        return ['message' => 'Skill Deleted'];
    }
}
