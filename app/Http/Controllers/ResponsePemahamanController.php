<?php

namespace App\Http\Controllers;

use App\Models\QuestionPemahaman;
use App\Models\ResponsePemahaman;
use Illuminate\Http\Request;

class ResponsePemahamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('answerpemahaman.index',[
            "QuestionPemahaman" => QuestionPemahaman::all()
        ]);
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

        $request->validate([
            'jawaban.*' => 'required', // This validates each element in the 'jawaban' array
        ]);

        $id = $request->input('id_questions_pemahaman');
        $jawaban = $request->input('jawaban');

        
        foreach ($jawaban as $key => $value) {

          
            ResponsePemahaman::create([
                'response' => $value,
                'questions_pemahaman_id' => $id[$key],
                'user_id' => auth()->user()->id
                
            ]);       
           
        }

        return redirect()->back()->with('success','Berhasil');
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
