<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = Auth::user();
        try {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $user = User::where('email', $request->email)->first();
                $request->session()->put('user_id', $user->id);

                if ($user->isAluno()) {
                    return redirect()->route('student.training',['id'=>$user->id]);
                } else {
                    return redirect()->route('personal.training');
                }
            } else {
                throw ValidationException::withMessages([
                    'email' => 'Credentials are incorrect'
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }

    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while logging out.');
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
            'role' => ['required', 'string', 'in:aluno,personal'],
        ]);
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('login')->with('success', 'Registration completed successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while registering the user.');
        }

    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->setRememberToken(Str::random(60));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

}
