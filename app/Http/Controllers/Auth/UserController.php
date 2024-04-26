<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login', ["tittle" => "LogIn User"]);
    }

    public function register() 
    {
        return view('auth.register', ["tittle" => "Register User"]);
    }

    public function prosesLogin(Request $request)
    {
        if(Auth::attempt($request->only(['email', 'password']))) {
            session(['user' => Auth::user()]);
            return redirect('upload');
        } else {
            return redirect(route('login'))->with('failed', 'Email or Password Wrong');
        }
    }

    public function prosesRegister(Request $request)
    {
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('login'));
    }

    public function dashboard()
    {
        return view('pages.dashboard', ["tittle"=>"Dashboard"]); 
    }

    public function profile()
    {
        return view('pages.profile', ["tittle"=>"Profile"]);
    }

    // public function updateProfile(Request $request)
    // {
    //     if ($request->password) {
    //         $user = new User();
    //         $user->name = $request->name;
    //         $user->email = $request->email;
    //         $user->password = Hash::make($request->password);
    //         $user->update();
    //     } else {
    //         $user = new User();
    //         $user->name = $request->name;
    //         $user->email = $request->email;
    //         $user->update();
    //     }

    //     return redirect(route('profile'));
    // }

    public function updateProfile(Request $request, $id)
    {
        User::find($id)->update($request->all());
        return back()->with('success', 'Data Berhasil di Update');
    }

    public function deleteAccount(User $user)
    {
        $user->delete();
        Auth::logout();
        return redirect(route('login'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
