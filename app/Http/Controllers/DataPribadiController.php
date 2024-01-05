<?php

namespace App\Http\Controllers;

use App\Models\Dpribadi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class DataPribadiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tes = Dpribadi::all();
        // dd($tes);


        if (Auth::user()->usertype == 'Admin') {
            return view('dataPribadi.index', [
                "dpribadi" => Dpribadi::all()

            ]);
        }

        return view('dataPribadi.index', [
            "dpribadi" => Dpribadi::where('user_id', Auth::id())->get()
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

        $message = [
            'nik.unique' => 'NIK Sudah Digunakan',
        ];



        $data = $request->validate([
            'nik' => ['required', 'unique:dpribadi,nik'],
            'nama' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'agama' => 'required',
            'cv' => 'required|file|mimes:pdf|max:10000',
            'ktp' => 'required|file|mimes:pdf|max:10000',
            'surat_lamaran' => 'required|file|mimes:pdf|max:10000',
            'sertifikat_teofl' => 'required|file|mimes:pdf|max:10000',
            'foto' => 'required|file|mimes:pdf|max:10000',
            'link' => 'required'


        ], $message);

        $file_cv = $request->file('cv');
        $file_ktp = $request->file('ktp');
        $file_sl = $request->file('surat_lamaran');
        $file_st = $request->file('sertifikat_teofl');
        $file_ft = $request->file('foto');

        $file_nik_cv =  $request->nik . '_CV.' . $file_cv->getClientOriginalExtension();
        $file_nik_ktp = $request->nik . '_KTP.' . $file_ktp->getClientOriginalExtension();
        $file_nik_sl = $request->nik . '_SL.' . $file_sl->getClientOriginalExtension();
        $file_nik_st = $request->nik . '_ST.' . $file_st->getClientOriginalExtension();
        $file_nik_ft = $request->nik . '_FT.' . $file_ft->getClientOriginalExtension();




        $file_cv->storeAs('public/dokumen', $file_nik_cv);
        $file_ktp->storeAs('public/dokumen', $file_nik_ktp);
        $file_sl->storeAs('public/dokumen', $file_nik_sl);
        $file_st->storeAs('public/dokumen', $file_nik_st);
        $file_ft->storeAs('public/dokumen', $file_nik_ft);


        $data['cv'] = $file_nik_cv;
        $data['ktp'] = $file_nik_ktp;
        $data['surat_lamaran'] = $file_nik_sl;
        $data['sertifikat_teofl'] = $file_nik_st;
        $data['foto'] = $file_nik_ft;
        $data['status'] = "Belum Validasi";

        $user = User::find(Auth::id());
        $user->dpribadi()->create($data);

        // Dpribadi::create($data);

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


        $data =  Dpribadi::find($id);
        $file = [];



        if ($request->file('cv')) {
            Storage::delete(['public/dokumen/' . $data->cv]);

            $file_cv = $request->file('cv');
            $file_nik_cv =  $request->nik . '_CV.' . $file_cv->getClientOriginalExtension();
            $file_cv->storeAs('public/dokumen', $file_nik_cv);
            $file['cv'] = $file_nik_cv;
        }
        if ($request->file('ktp')) {
            Storage::delete(['public/dokumen/' . $data->ktp]);

            $file_ktp = $request->file('ktp');
            $file_nik_ktp = $request->nik . '_KTP.' . $file_ktp->getClientOriginalExtension();
            $file_ktp->storeAs('public/dokumen', $file_nik_ktp);
            $file['ktp'] = $file_nik_ktp;
        }
        if ($request->file('surat_lamaran')) {
            Storage::delete(['public/dokumen/' . $data->surat_lamaran]);


            $file_sl = $request->file('surat_lamaran');
            $file_nik_sl = $request->nik . '_SL.' . $file_sl->getClientOriginalExtension();
            $file_sl->storeAs('public/dokumen', $file_nik_sl);
            $file['surat_lamaran'] = $file_nik_sl;
        }
        if ($request->file('sertifikat_teofl')) {
            Storage::delete(['public/dokumen/' . $data->sertifikat_teofl]);

            $file_st = $request->file('sertifikat_teofl');
            $file_nik_st = $request->nik . '_ST.' . $file_st->getClientOriginalExtension();
            $file_st->storeAs('public/dokumen', $file_nik_st);

            $file['sertifikat_teofl'] = $file_nik_st;
        }
        if ($request->file('foto')) {
            Storage::delete(['public/dokumen/' . $data->foto]);

            $file_ft = $request->file('foto');
            $file_nik_ft = $request->nik . '_FT.' . $file_ft->getClientOriginalExtension();
            $file_ft->storeAs('public/dokumen', $file_nik_ft);

            $file['foto'] = $file_nik_ft;
        }

        $file['nik'] = $request->nik;
        $file['nama'] = $request->nama;
        $file['jk'] = $request->jk;
        $file['tempat_lahir'] = $request->tempat_lahir;
        $file['tanggal_lahir'] = $request->tanggal_lahir;
        $file['alamat'] = $request->alamat;
        $file['email'] = $request->email;
        $file['no_telp'] = $request->no_telp;
        $file['agama'] = $request->agama;
        $file['link'] = $request->link;


        // dd($file);
        $data->update($file);




        return redirect()->back();




        // // $input = $request->all();
        // // $dpribadi->fill($input)->save();

        // $pribadi = Dpribadi::findorfail($id);
        // if($pribadi){

        //     if ($pr) {



        //     }

        //     $customer->update($update)


        // return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dpribadi = User::find($id);
        $dpribadi->responses()->delete();
        $dpribadi->responsespemahaman()->delete();
        $dpribadi->dpribadi()->delete();
        // $dpribadi->delete();

        return redirect()->back()->with('success', 'dihapuskan');
    }
}
