<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Aspek;
use App\Models\Konversi;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Total;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use stdClass;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $nilai = Penilaian::all();
        $konversi = Konversi::all();


        //Hitung Gap dan Selisih
        $gap = $nilai->map(function ($v) use ($konversi) {
            $v->hasil = $v->nilai - $v->kriteria->nilai;
            $v->selisih = $konversi->firstWhere('selisih', $v->hasil)->nilai_bobot;

            return $v;
        });
        // dd($gap);

        return view('perhitungan.index', [
            "aspek" => Aspek::with(['kriteria', 'penilaian'])->get(),
            "alternatif" => Alternatif::has('penilaian')->get(),
            "konversi" => Konversi::all(),
            "gap" => $gap
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
