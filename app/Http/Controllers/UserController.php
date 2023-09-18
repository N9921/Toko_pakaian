<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use function Laravel\Prompts\alert;

// use Session;

class UserController extends Controller
{

    public function index()
    {
        return view('admin/dashboard');
    }
    public function listuser()
    {
        $user = User::all();
        return view('admin/user')->with('user', $user);
        // $user = DB::table('users')->get();
        // return $user;
    }


    public function create()
    {
        return view('admin/register');
    }



    public function store(Request $request)
    {
        // return request()->all();
        $post           = new User;
        $post->nama     = $request->name;
        $post->email    = $request->email;
        $post->alamat   = $request->alamat;
        $post->username = $request->username;
        $post->password = Hash::make($request->password);

        // $post->save() digunakan untuk menyimpan data title dan content
        $post->save();

        //digunakan untuk mengakses route post
        return redirect('/dashboard');
    }

    public function hapus($id)
    {
        // $post   = User::find($id);
        // $post->delete();

        // return redirect('admin/User');
        // return request()->all();
    }

    public function hapuss($id)
    {
        $user = User::where('id', $id)
            ->delete();

        return redirect('/user');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
            // echo Auth::user()->nama;
        } else {
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $user = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($user)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
            // echo Auth::user()->nama;
        } else {
            Session::flash('error', 'Email atau Password Salah');
            // Alert::Error('Login Gagal', 'Error');
            return redirect('login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        // request()->session()->invalidate();
        // request()->session()->regenerateToken();
        return redirect('/');
    }
}
