<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function show()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $adminEmail = config('admin.email');
        $adminPassword = config('admin.password');

        if (
            $credentials['email'] === $adminEmail &&
            Hash::check($credentials['password'], $adminPassword)
        ) {
            $request->session()->regenerate();
            $request->session()->put('is_admin', true);

            return redirect()
                ->route('admin.games.index')
                ->with('success', 'Вы успешно вошли!');
        }

        return back()
            ->withErrors([
                'email' => 'Неверная электронная почта или пароль.',
            ])
            ->onlyInput('email');
    }
}
