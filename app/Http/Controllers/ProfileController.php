<?php

namespace App\Http\Controllers;

use Image;
use File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('profile', [
            "profile" => User::find(Auth::id())
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
        $avatar = $request->file('avatar');
        if ($avatar) {
            $old_avatar = Auth::user()->profile->avatar;
            $nama_file = time() . "_" . $avatar->getClientOriginalName();
            // $tujuan_upload = 'profiles_img';
            // $avatar->move($tujuan_upload, $nama_file);

            $destinationPath = public_path('/profile_images');
            // use intervation image
            $img = Image::make($avatar->path());
            $img->fit(1000)->save($destinationPath . '/' . $nama_file);

            File::delete('profile_images/' . $old_avatar);

            $user = User::find($id);
            $user->profile()->update([
                'avatar' => $nama_file,
            ]);
        } else {
            $user = User::find($id);
            $user->update(['name' => $request->name]);
            $user->profile()->update([
                'address' => $request->address,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'phone_number' => $request->phone_number,
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

    public function updatePassword(Request $request)
    {

        $data = User::where('email', auth()->user()->email)->first();

        $password = $request->old_password;
        $new_password = $request->new_password;

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);


        if ($data) {
            if (Hash::check($password, $data->password)) {
                User::where('email', auth()->user()->email)
                    ->update([
                        'password' => bcrypt($new_password)
                    ]);
                return redirect()->back()->with('success', 'berhasil');
            } else {
                return redirect()->back()->with('error','mohon cek kembali passwordnya');
            }
        }
    }
}
