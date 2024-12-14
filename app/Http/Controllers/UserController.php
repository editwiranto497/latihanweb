<?php

namespace App\Http\Controllers;

use App\Mail\MyTestEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(){

        return view('auth.index');
    }

    public function latihan(Request $request){
        // $jam = Carbon::now();
        // Mail::to('testtest04082001@gmail.com')
        // ->send(new MyTestEmail('Latihan laravel '. $jam));
        // return redirect('/');


        $request->validate([
            'email' => 'required|email'
        ]);

        $emailTujuan = $request->input('email');

        $user = User::where('email', $emailTujuan)->first();

        if (!$user) {
        return redirect()->back()->withErrors(['email' => 'Email not found in our database.']);
        }

        $link = url('/new-password?email=' . urlencode($emailTujuan));
        Mail::to($emailTujuan)
            ->send(new MyTestEmail("Klik link berikut untuk mengatur password $link"));

        return redirect('/hasil')->with('emailTujuan',$emailTujuan);
    }

    public function login(Request $request){
        //validasi input
        $request->validate([
            'email_or_username' => 'required|string',
            'password' => 'required|string'
        ]);

        //tentukan apakah input email atau username
            $input = $request->email_or_username;

        //cek apakah input berupa email
        if(filter_var($input,FILTER_VALIDATE_EMAIL)){
            //jika email, cari user berdasarkan email

            $user = User::where('email',$input)->first();
        }else{
            $user = User::where('username',$input)->first();
        }

        //cek apakah user ditemukan dan password valid
        if($user && Hash::check($request->password,$user->password)){
            Auth::login($user);

            //jika remember me dicentang, simpan username dalam cookie
            if($request->rememberme){
                Cookie::queue('username',$user->username,1440);
                Cookie::queue('email',$user->email,1440);
            }

            return redirect()->intended('/dashboard');
        }else{
            return back()->withErrors([
                'email_or_username' => 'Email/Username atau password tidak valid'
            ]);
        }
    }



    public function registerView(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[\W_]/'
            ]

        ],[
            'password.regex' => 'Password harus mengandung huruf besar,huruf kecil,angka dan simbol',
            'password.min' => 'Password harus lebih dari 8 karakter'
        ]);


        try {
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return redirect('/')->with('success','Berhasil Register');
        } catch (\Exception $e) {
            return redirect('/register')->with('fail',$e->getMessage());
        }
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
    public function resetPassword(){
        return view('auth.reset-password');
    }

    public function showEditForm(Request $request){
        $email = $request->query('email');
        $user = User::where('email', $email)->first();

        // // Jika user tidak ditemukan, redirect dengan pesan error
        if (!$user) {
            return redirect('/')->with('error', 'Data user tidak ditemukan.');
        }

        // Tampilkan form dengan data user
        return view('auth.new_password',compact('email'));
    }

    public function updateData(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8', // minimal 8 karakter dan konfirmasi password
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/')->with('success', 'Password berhasil diubah. Silakan login.');
    }

}
