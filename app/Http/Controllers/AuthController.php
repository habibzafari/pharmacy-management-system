<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ResetPassword;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], true)) {
            if (Auth::user()->is_role == 1) {
                return redirect()->intended('admin/dashboard');
            } else {
                return redirect()->back()->with('error', 'Invalid email or password');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);
        // $email = $request->input('email');
        // $password = $request->input('password');
        // $user = \App\Models\User::where('email', $email)->first();
        // if (Hash::check($password, $user->password)) {
        //     $request->session()->put('user', $user);
        //     return redirect()->route('admin.dashboard');
        // } else {
        //     return redirect()->back();
        // }
    }

    public function forgot(Request $request)
    {
        return view('auth.forgot');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }

    public function forgot_post(Request $request)
    {
        $count = User::where('email', $request->email)->count();
        if ($count > 0) {
            $user = User::where('email', $request->email)->first();
            $user->remember_token = Str::random(50);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', 'Password reset link has been sent to your email');
        } else {
            return redirect()->back()->with('error', 'Email not found');
        }
    }

    public function getReset($token)
    {
        if(Auth::check()){
            return redirect('admin/dashboard');
        }
        $user = User::where('remember_token', $token)->first();
        if ($user->count() == 0) {
            abort(403);
        }
        $data['token'] = $token;
        return view('auth.reset', $data);
    }

    public function postReset($token, ResetPassword $request)
    {
        $user = User::where('remember_token', $token)->first();
        if ($user->count() == 0) {
            abort(403);
        }
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();
        return redirect('/')->with('success', 'Password reset successfully');
    }
}
