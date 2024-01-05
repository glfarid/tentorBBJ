<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Aspek;
use App\Models\Dpribadi;
use App\Models\Kriteria;
use App\Models\Question;
use App\Models\QuestionPemahaman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware(['auth','verified']);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        // $data['aspek'] = Aspek::count();
        
        
        return view('Home',[
            "aspek" => Aspek::count(),
            "kriteria" => Kriteria::count(),
            "alternatif" => Alternatif::count(),
            "dpribadi" => Dpribadi::count(),
            "question" => Question::count(),
            "tesp" => QuestionPemahaman::count()
        ]);

        // return view('home', ['data' => $data] )
    }
}
