<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Novanti\LaravelPDF\PDFFacade as PDF;
use App\Education;
use App\Profession;
use App\Skill;
use App\Summary;
use App\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
class FilterController extends Controller
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
        //
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
        $summary=Summary::where('user_id',$id)->first();
        $skills=Skill::where([['user_id',$id],['career_option',$request->career_option]])->get();
        $education=Education::where([['user_id',$id],['career_option',$request->career_option]])->get();
        $work=WorkExperience::where([['user_id',$id],['career_option',$request->career_option]])->get();

        // pdf code logic's...
        if($request->docFormat == "pdf")
        {
            $pdf = App::make('snappy.pdf.wrapper');
            $pdf->loadView('pdf',[
                'profession'=>Profession::all(),
                'summary'=>$summary,
                'skills'=>$skills,
                'educations'=>$education,
                'experiences'=>$work,
            ]);
            $pdf->setPaper('a4')->setOption('margin-bottom', 10)->setOption('margin-top', 10);
            //$pdf->setOption('no-pdf-compression',true);
            return $pdf->download(Auth::user()->name . " Resume.pdf");
            // use wkhtmltopdf
            /*PDF::loadView('filter',[
                'profession'=>Profession::all(),
                'summary'=>$summary,
                'skills'=>$skills,
                'educations'=>$education,
                'experiences'=>$work,
            ])->download(Auth::user()->name . ' Resume.pdf');*/
        }

        // word logic's
        if ($request->docFormat == "word")
        {
            $phpWord=new PhpWord();
            $section = $phpWord->addSection();
            // personal details section header
            $phpWord->addTitleStyle(1, ['bold'=>true]);
            $section->addTitle("Personal Details");

            // personal details content
            $section->addText(Auth::user()->name,null,['alignment'=>'center']);
            $section->addText(Auth::user()->email,null,['alignment'=>'center']);
            $section->addText(Auth::user()->address,null,['alignment'=>'center']);
            $section->addText(Auth::user()->mobile,null,['alignment'=>'center']);

            // Summary
            $section->addTitle("Personal Summary");
            $section->addText($summary->summary);

            // education background header
            $section->addTitle("Education Background");
            // education content...
            foreach ($education as $item)
            {
                $section->addText($item->name_of_study . ' - Degree Obtained: ' . $item->degree_obtained);
                $section->addText($item->place_of_study . ' | ' . $item->years);
                $section->addText('Specializing in ' . $item->any_specialisation);
            }

            // skills header
            $section->addTitle("Areas of Expertise (Skills)");
            // skill content...
            foreach ($skills as $item)
            {
                $section->addListItem($item->skill, 0, null, 'TYPE_BULLET_FILLED', null);
            }

            // work experience header
            $section->addTitle("Work Experience");
            // work experience content...
            foreach ($work as $item)
            {
                $section->addText($item->title_of_position);
                $section->addText($item->name_of_the_company . ' | ' . $item->years);
                $section->addText($item->description_of_the_position);
            }

            // Saving the document as OOXML file...
            $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
            try {
                $objWriter->save(storage_path('documents/word/' . Auth::user()->name . ' Resume.docx'));
            } catch (Exception $exception)
            {

            }
            return response()->download(storage_path("documents/word/" . Auth::user()->name . ' Resume.docx'));
        }

        /*return view('filter',[
            'profession'=>Profession::all(),
            'summary'=>$summary,
            'skills'=>$skills,
            'educations'=>$education,
            'experiences'=>$work,
        ]);*/
        return response()->json("ok");
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
