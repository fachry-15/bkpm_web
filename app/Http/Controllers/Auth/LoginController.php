<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = RouteServiceProvider::HOME;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	public function login(Request $request)
	{
		$this->validate($request, [
			'username' => 'required|string', // validasi kolom username
			// tapi kolom ini bisa berisi email atau username
			'password' => 'required|string|min:6'
		]);

		// lakukan pengecekan, jika inputan dari username formatnya adalah email
		// maka kita akan melakukan proses authentication menggunakan email, selain itu,
		// akan menggunakan username
		$loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		// tampung informasi login-nya, dimana kolom type pertama bersifat dinamis
		// nerdasarkan value dari pengecekan diatas
		$login = [
			$loginType => $request->username,
			'password' => $request->password
		];

		// lakukan login
		if (auth()->attempt($login)) {
			// jika berhasil, maka redirect ke halaman home
			return redirect()->route('home');
		}
		// jika salah, maka kembali ke login dan tampilkan notifikasi
		return redirect()->route('login')->with(['error' => 'Email/Password salah!']);
	}
}
