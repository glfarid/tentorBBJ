<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Aspek;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai_join = Alternatif::select([
            'alternatifs.id as alternatif_id',
            'alternatifs.nama',
            'aspeks.id as aspek_id',
            'aspeks.keterangan as aspek',
            'kriterias.id as kriteria_id',
            'kriterias.kode_kriteria',
            'kriterias.deskripsi as kriteria',
            'penilaians.nilai',
        ])
            ->join('penilaians', 'alternatifs.id', 'penilaians.alternatif_id')
            ->join('kriterias', 'penilaians.kriteria_id', 'kriterias.id')
            ->join('aspeks', 'kriterias.aspek_id', 'aspeks.id')
            ->get();

        return view('penilaian.index', [
            "title" => 'Data Peniliaian',
            "alternatif" => Alternatif::all(),
            "nilai" => $nilai_join,
            "aspek" => Aspek::with('kriteria')->get() // ini untuk modal create / input
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
        $id = $request->input('id_alternatif');
        $id_aspek = $request->input('id_aspek');
        $id_kriteria = $request->input('id_kriteria');
        $nilai = $request->input('nilai');


        foreach ($nilai as $key => $value) {
            Penilaian::create([
                'alternatif_id' => $id,
                'aspek_id' => $id_aspek[$key],
                'kriteria_id' => $id_kriteria[$key],
                'nilai' => $value
            ]);
        }

        return redirect()->back();
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
    public function update(Request $request)
    {

        $id = $request->input('id_alternatif');
        $id_aspek = $request->input('id_aspek');
        $id_kriteria = $request->input('id_kriteria');
        $nilai = $request->input('nilai');
        foreach ($nilai as $key => $value) {
            Penilaian::where([
                'alternatif_id' => $id,
                'aspek_id' => $id_aspek[$key],
                'kriteria_id' => $id_kriteria[$key]
            ])->update([
                'nilai' => $value
            ]);
        }
        return redirect()->back();
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


    //db untuk join
    //     SELECT
    //     alternatifs.id AS alternatif_id,
    //     alternatifs.nama,
    //     aspeks.id AS aspek_id,
    //     aspeks.keterangan AS aspek,
    //     kriterias.id AS kriteria_id,
    //     kriterias.kode_kriteria,
    //     kriterias.deskripsi AS kriteria,
    //     penilaians.nilai
    // FROM
    //     alternatifs
    // JOIN
    //     penilaians ON alternatifs.id = penilaians.alternatif_id
    // JOIN
    //     kriterias ON penilaians.kriteria_id = kriterias.id
    // JOIN
    //     aspeks ON kriterias.aspek_id = aspeks.id;

}
