<?php

namespace App\Http\Controllers;

use App\Profession;
use App\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkExperienceController extends Controller
{
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
    public function store(Request $request)
    {
        $this->validate($request,[
            'title_of_position'=>'required|string|max:255',
            'name_of_company'=>'required|string|max:255',
            'description_of_position'=>'required|string|max:255',
            'years'=>'required|string|max:255',
        ]);
        $prof=Profession::firstOrCreate(
            ['profession'=>$request->career_option]
        );
        $exp=new WorkExperience();
        $exp->user_id=Auth::id();
        $exp->title_of_position=$request->title_of_position;
        $exp->name_of_the_company=$request->name_of_company;
        $exp->description_of_the_position=$request->description_of_position;
        $exp->years=$request->years;
        $exp->career_option=$prof->id;

        if ($exp->save())
        {
            return redirect()->back()->with("success","Work Experience Saved Successfully!");
        }
        return redirect()->back()->with("error","Work Experience Not Saved Successfully!");
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
        //
    }
}
