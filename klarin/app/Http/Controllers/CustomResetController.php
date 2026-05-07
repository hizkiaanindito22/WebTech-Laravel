<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class CustomResetController extends Controller
{
    // 1. Tampilkan Form Lupa Password & Generate Captcha
    public function requestForm(Request $request)
    {
        $num1 = rand(1, 9);
        $num2 = rand(1, 9);
        // Simpan jawaban yang benar di session
        $request->session()->put('captcha_answer', $num1 + $num2);

        return view('auth.forgot-password', compact('num1', 'num2'));
    }

    // 2. Proses Validasi NIM/NIP dan Captcha
    public function processRequest(Request $request)
    {
        $request->validate([
            'nomor_induk' => 'required|string|exists:users,nomor_induk',
            'captcha' => 'required|numeric'
        ], [
            'nomor_induk.exists' => 'NIP/NIM tidak terdaftar di sistem kami.',
            'captcha.required' => 'Captcha wajib diisi.',
        ]);

        // Cek apakah jawaban captcha sesuai dengan di session
        if ($request->captcha != $request->session()->get('captcha_answer')) {
            return back()->withErrors(['captcha' => 'Jawaban Captcha salah! Coba lagi.'])->withInput();
        }

        // Jika valid, izinkan masuk ke form reset password
        $request->session()->put('reset_induk', $request->nomor_induk);
        return redirect()->route('password.reset.custom');
    }

    // 3. Tampilkan Form Input Password Baru
    public function resetForm(Request $request)
    {
        // Cek apakah dia sudah melewati verifikasi captcha
        if (!$request->session()->has('reset_induk')) {
            return redirect()->route('password.request');
        }
        return view('auth.reset-password');
    }

    // 4. Proses Simpan Password Baru ke Database
    public function updatePassword(Request $request)
    {
        if (!$request->session()->has('reset_induk')) {
            return redirect()->route('password.request');
        }

        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Update password berdasarkan NIP/NIM yang tersimpan di session
        $user = User::where('nomor_induk', $request->session()->get('reset_induk'))->first();
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        // Bersihkan session
        $request->session()->forget('reset_induk');
        $request->session()->forget('captcha_answer');

        return redirect()->route('login')->with('status', 'Password berhasil dipulihkan! Silakan login.');
    }
}