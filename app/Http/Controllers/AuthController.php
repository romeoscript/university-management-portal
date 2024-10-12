<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'reg_no'   => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['reg_no' => $request->reg_no, 'password' => $request->password])) {
            return redirect()->intended('/');
        }
        return redirect()->back()->with('alert', 'Reg number and Password Not Matched');
    }
    
    public function showAdmin()
    {
        return view('admin.login');
    }
    
    public function showLecturer()
    {
        return view('lecturer.login');
    }
    
    public function authenticateAdmin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/admin');
        }
        return redirect()->back()->with('alert', 'Email and Password Not Matched');
    }

    public function authenticateLecturer(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('lecturer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/lecturer');
        }
        return redirect()->back()->with('alert', 'Email and Password Not Matched');
    }


    public function createUser(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|unique:users,email',
            'surname' => 'required',
            'first_name' => 'required',
            'phone' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'surname' => $request->surname,
            'next_of_kin_phone' => $request->phone,
            'next_of_kin_name' => $request->next_of_kin_name,
            'address' => $request->address,
            'state_of_origin' => $request->state_of_origin,
            'reg_no' => $request->reg_no,
            'department' => $request->department,
            'campus' => $request->campus,
            'gender' => $request->gender,
            'passport' => 'fdfdfdf', //$request->passport,
            'password' => Hash::make($request->password),
        ]);
        if ($user) {
            Auth::login($user);
        }
        return redirect()->intended('/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        session()->regenerate();
        return redirect()->route('/');
    }
}
