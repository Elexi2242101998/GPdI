<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use App\Services\TwilioService as ServicesTwilioService;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index()
    {
        return view('content.auth.login');
    }

    public function verify(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $pesanError = 'Kombinasi Email dan Password Tidak ditemukan';
    $pesanSuccessAdmin = 'Anda Berhasil Login Sebagai Admin';
    $pesanSuccessUser = 'Anda Berhasil Login Sebagai User';

    $user = User::query()
            ->where('email', $request->email)
            ->where('is_active', 1)
            ->first();

    if ($user !== null && password_verify($request->password, $user->password)) {
        if ($user->role === 'admin') {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect('/dashboard')->with('berhasil', $pesanSuccessAdmin);
        } else {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect('/dashboard')->with('berhasil', $pesanSuccessUser);
        }
    }

    return redirect()->back()->with('gagal', $pesanError);
}


    public function register()
    {
        return view('content.register.index');
    }

    public function registerProceed(Request $request)
    {
        #tugas buat validasi
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'dob' => 'required'
        ]);

        #kondisi semua data ada
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $user = User::query()->where('email', $email)->first();
        $no_telepon = $request->no_telepon;
        $alamat = $request->alamat;
        $dob = $request->dob;
        if ($user !== null) {
            #email sudah digunakan, tidak boleh mendaftar lagi
            return back()->with('gagal', 'Tidak dapat mendaftar menggunakan email yang sama.');
        }
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->is_active = 0;
        $user->token_activation = md5($email . date('Y-m-dH:i:s'));
        $user->no_telepon = $no_telepon;
        $user->dob = $dob;
        $user->alamat = $alamat;
        $user->save();
        #kirim email.
        Mail::to($user->email)->queue(new RegisterMail($user));
        // #kirim OTP
        // $phoneNumber = $request->input('no_telepon');
        // $tokenActivation = $this->twilioService->generateOTP();
        // $this->twilioService->sendActivationToken($phoneNumber, $tokenActivation);

        return redirect('/login')->with('sukses', 'Registrasi Berhasil, cek email anda untuk aktivasi');
    }

    public function registerVerify($token)
    {
        #get user by token
        $user = User::query()->where('token_activation', $token)->first();
        if ($user === null) {
            return redirect('/login')->with('gagal', 'Token tidak ditemukan');
        }
        #user ada
        $user->token_activation = null;
        $user->is_active = 1;
        $user->save();
        return redirect('/login')->with('sukses', 'Aktivasi Berhasil, anda sudah bisa login');
    }


    public function mailPw (Request $request){
        $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    }
    public function forgotPw(){
        return view('content.auth.forgotpw');
    }
    public function resetPW(string $token){
        return view('content.auth.resetpw', ['token' => $token]);
    }
    public function resetPass(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Password berhasil direset.');
        } else {
            return back()->withErrors(['email' => 'Gagal mereset password. Silakan coba lagi.']);
        }
    }

    protected $twilioService;

    public function __construct(ServicesTwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }
}

