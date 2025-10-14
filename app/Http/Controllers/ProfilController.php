<?php
namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $data = Profil::all(); // hanya 1 profil
        return view('profil.index', compact('data'));
    }

    public function create()
    {
        return view('profil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'logo' => 'image|mimes:png,jpg,jpeg',
            'email' => 'nullable|email',
            'telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        $path = null;
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logo', 'public');
        }

        Profil::create([
            'nama' => $request->nama,
            'logo' => $path,
            'email' => $request->email,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.profil.index')->with('success', 'Profil berhasil disimpan!');
    }

    public function edit(Profil $profil)
    {
        return view('profil.edit', compact('profil'));
    }

    public function update(Request $request, Profil $profil)
    {
        $request->validate([
            'nama' => 'required',
            'logo' => 'image|mimes:png,jpg,jpeg|max:2048',
            'email' => 'nullable|email',
        ]);

        if ($request->hasFile('logo')) {
            if ($profil->logo && Storage::disk('public')->exists($profil->logo)) {
                Storage::disk('public')->delete($profil->logo);
            }
            $profil->logo = $request->file('logo')->store('logo', 'public');
        }

        $profil->update($request->except('logo'));

        return redirect()->route('admin.profil.index')->with('success', 'Profil berhasil diperbarui!');
    }

    public function destroy(Profil $profil)
    {
        if ($profil->logo && Storage::disk('public')->exists($profil->logo)) {
            Storage::disk('public')->delete($profil->logo);
        }

        $profil->delete();
        return redirect()->route('admin.profil.index')->with('success', 'Profil berhasil dihapus!');
    }
}