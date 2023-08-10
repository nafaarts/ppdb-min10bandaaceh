<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 'nama',
        // 'nip',
        // 'email',
        // 'no_hp',
        // 'password',
        // 'hak_akses',

        $guru = User::where('hak_akses', 'guru')
            ->when(request('cari'), function ($query) {
                $query->where(function ($query) {
                    $query->where('nama', 'like', '%' . request('cari') . '%')
                        ->orWhere('nip', 'like', '%' . request('cari') . '%')
                        ->orWhere('email', 'like', '%' . request('cari') . '%')
                        ->orWhere('no_hp', 'like', '%' . request('cari') . '%');
                });
            })
            ->latest()
            ->paginate();

        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nip' => 'required|numeric',
            'email' => 'required|email',
            'no_hp' => 'required|numeric',
            'password' => 'required|confirmed',
        ]);

        User::create($validated);

        return redirect()->route('guru.index')->with('berhasil', 'Data guru berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('guru.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nip' => 'required|numeric',
            'email' => 'required|email',
            'no_hp' => 'required|numeric',
            'password' => 'sometimes|nullable|confirmed',
        ]);

        if (!$validated['password']) {
            $validated['password'] = $user->password;
        }

        $user->update($validated);

        return redirect()->route('guru.index')->with('berhasil', 'Data guru berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('guru.index')->with('berhasil', 'Data guru berhasil dihapus!');
    }
}
