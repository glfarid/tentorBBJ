<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class AspekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('aspek.index', [
            "title" => "Data Aspek",
            "aspek" => Aspek::all()
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

        $validateData = $request->validate([
            'kode_aspek' => 'required',
            'keterangan' => 'required',
            'persentase' => 'required',
            'bobot_cf' => 'required',
            'bobot_sf' => 'required'
        ]);

        $aspek_id =  Aspek::create($validateData);

        $aspek = $aspek_id->kriteria;

        if (count($aspek) < 1) {
            return redirect('/kriteria')->with('success', 'Inputkan Data Kriteria Di Aspek ' . $aspek_id->keterangan);
        } else {

            return redirect('/kriteria');
        }
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
    public function update(Request $request, Aspek $aspek)
    {
        $aspek->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Aspek $aspek)
    // {
    //     $aspek->delete();
    //     $aspek->kriteria()->delete();
    //     return redirect()->back()->with('success', 'dihapuskan');;
    // }

    public function aspekDelete($id)
    {
        $aspek = Aspek::find($id);
        $aspek->kriteria()->delete();
        $aspek->penilaian()->delete();
        $aspek->delete();
        return redirect()->back()->with('success', 'dihapuskan');
    }
}
