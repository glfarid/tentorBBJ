<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BuatAkunAdmin extends Controller
{

    

    public function index(){
        return view('register.admin');
    }

    public function akunPost(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $request = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'usertype' => 'Admin'
        ]);
        $request->profile()->create([
            'address' => '-',
            'avatar' => '',
            'date_of_birth' => date('Y-m-d'),
            'gender' => '-',
            'phone_number' => '-'
        ]);

    
        return redirect('/login');
    }
}
