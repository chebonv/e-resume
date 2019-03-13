<?php

namespace App\Http\Controllers;

use App\Education;
use App\Profession;
use App\Skill;
use App\Summary;
use App\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home',[
            'summary'=>Summary::where('user_id',Auth::id())->first(),
            'skills'=>Skill::where('user_id',Auth::id())->get(),
            'educations'=>Education::where('user_id',Auth::id())->get(),
            'experiences'=>WorkExperience::where('user_id',Auth::id())->get(),
            'profession'=>Profession::all(),
        ]);
    }
}
