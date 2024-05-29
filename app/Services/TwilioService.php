<?php

namespace App\Services;

use App\Models\User;
use Twilio\Rest\Client;

class TwilioService
{
    protected $client;

    public function __construct()
    {
        // Inisialisasi klien Twilio dengan SID Akun dan Token Autentikasi
        $sid = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $this->client = new Client($sid, $token);
    }

    public function sendActivationToken($phoneNumber)
{
    // Dapatkan token aktivasi dari entitas pengguna
    $user = User::where('no_telepon', $phoneNumber)->first();
    if (!$user) {
        // Handle jika pengguna tidak ditemukan
        return;
    }
    $tokenActivation = $user->token_activation;

    // Buat tautan yang mengarah ke tindakan konfirmasi akun
    $confirmationLink = url('/register/activation/' . $tokenActivation);

    // Pesan yang berisi tautan konfirmasi akun
    $message = "Klik tautan berikut untuk mengkonfirmasi akun Anda: $confirmationLink";

    // Kirim pesan teks melalui Twilio
    $twilioNumber = env('TWILIO_PHONE_NUMBER');
    $this->client->messages->create(
        $phoneNumber,
        [
            'from' => $twilioNumber,
            'body' => $message
        ]
    );
}




    public function generateOTP($length = 6)
    {
        // Karakter yang mungkin terdapat dalam OTP
        $characters = '0123456789';
        
        // Panjang OTP yang diinginkan
        $otp = '';

        // Mengacak dan memilih karakter untuk membentuk OTP
        for ($i = 0; $i < $length; $i++) {
            $otp .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $otp;
    }
}


