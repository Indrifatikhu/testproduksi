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
            return redirect('pages/dashboard');
        } else {
            return redirect(route('login'))->with('failed', 'Email or Password Wrong');
        }
    }

    public function prosesRegister(Request $request)
    {
        $cekUser = User::where('email', $request->email)->exists();
        if($cekUser){
            return back()->withErrors(['email' => 'Email Sudah Digunakan']);
        }else{
            $user = new User();
            $user->name = request('name');
            $user->email = request('email');
            $user->password = Hash::make($request->password);
            $user->save();
    
            return redirect(route('login'));
        }
    }


    public function profile()
    {
        
        return view('pages.profile', [
            'tittle' => "Profile",
            'user' => Auth::user()
        ]);
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);
        $userData = $request->except(['password']);
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }
        $user->update($userData);
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
