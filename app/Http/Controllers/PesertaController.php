<?php

namespace App\Http\Controllers;

use App\Models\Dpribadi;
use App\Models\Response;
use App\Models\ResponsePemahaman;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('peserta.index', [
            "Peserta" => Dpribadi::all(),

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
        $data = Dpribadi::where('id', $id)->get();
        // return $data;


        return view('peserta.show', [
            'dpribadi' => $data
        ]);
    }

    public function jawaban($id)
    {
        $jawaban = Response::where('user_id', $id)->with('questions')->get();

        return view('peserta.responses', [
            "jawaban" => $jawaban
        ]);
    }

    public function jawabanpemahaman($id)
    {
        $jawabanpemahaman = ResponsePemahaman::where('user_id', $id)->with('questions_pemahaman')->get();
        return view('peserta.responsespemahaman', [
            "jawabanpemahaman" => $jawabanpemahaman
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
    public function update(Request $request, $id)
    {
        Dpribadi::find($id)->update(['status' => $request->status]);
        return response()->json($request->status);
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
