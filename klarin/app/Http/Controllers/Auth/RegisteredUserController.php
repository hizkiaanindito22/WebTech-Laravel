<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage; // Tambahkan ini di atas

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        // 1. Siapkan rules dasar
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'in:dosen,mahasiswa'],
            'nomor_induk' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];

        // 2. Jika dia mendaftar sebagai Dosen, Wajibkan Kode Unik!
        if ($request->role === 'dosen') {
            $request->validate(array_merge($rules, [
                'kode_dosen' => ['required', function ($attribute, $value, $fail) {
                    // KODE RAHASIANYA ADALAH: KLARIN-ATMI-2026
                    if ($value !== 'KLARIN-ATMI-2026') {
                        $fail('Kode Unik Instruktur tidak valid! Hubungi Admin.');
                    }
                }],
            ]));
        } else {
            $request->validate($rules);
        }

        // 3. Simpan File Foto (jika ada)
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('profile_photos', 'public');
        }

        // 4. Buat User Baru
        $user = \App\Models\User::create([
            'name' => $request->name,
            'role' => $request->role,
            'nomor_induk' => $request->nomor_induk,
            'foto' => $fotoPath,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        event(new \Illuminate\Auth\Events\Registered($user));
        \Illuminate\Support\Facades\Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
