<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdatePasswordRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        $user->load('addresses');
        return view('profile.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $data = $request->validated();
        $user = Auth::user();

        DB::transaction(function () use ($data, $user) {
            $user->update([
                'nombre' => $data['nombre'],
                'email' => $data['email'],
            ]);

            $user->addresses()->updateOrCreate(
                ['usuario_id' => $user->id],
                [
                    'address' => $data['address'],
                    'city' => $data['city'],
                    'province' => $data['province'],
                    'postal_code' => $data['postal_code'],
                ]
            );
        });

        return redirect()->route('profile.index')->with('success', 'Perfil actualizado correctamente.');
    }

    public function editPassword()
    {
        return view('profile.password');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual es incorrecta.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile.index')->with('success', 'Contraseña actualizada correctamente.');
    }
}
