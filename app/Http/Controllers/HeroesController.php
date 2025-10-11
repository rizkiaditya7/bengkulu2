<?php

namespace App\Http\Controllers;

use App\Models\heroes as Hero;
use Illuminate\Http\Request;

class HeroesController extends Controller
{
    public function index()
    {
        $heroes = Hero::all();
        return view('admin.heroes.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.heroes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();

            // simpan langsung ke public/heroes
            if (app()->environment('local')) {
                // LOCAL: ke project/public/uploads
                $request->file('image')->move(public_path('uploads/heroes'), $filename);
                $data['image'] = 'uploads/heroes/' . $filename;
            } else {
                // SERVER: langsung ke public_html/uploads
                $serverPath = '/home/sukj4448/public_html/uploads/heroes';
                if (!file_exists($serverPath)) {
                    mkdir($serverPath, 0775, true);
                }
                $request->file('image')->move($serverPath, $filename);
                $data['image'] = 'uploads/heroes/' . $filename;
            }
        }

        Hero::create($data);

        return redirect()->route('admin.heroes.index')->with('success', 'Hero berhasil ditambahkan.');
    }

    public function show(Hero $hero)
    {
        return view('admin.heroes.show', compact('hero'));
    }

    public function edit(Hero $hero)
    {
        return view('admin.heroes.edit', compact('hero'));
    }

    public function update(Request $request, Hero $hero)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($hero->image && file_exists(public_path($hero->image))) {
                unlink(public_path($hero->image));
            }

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            if (app()->environment('local')) {
                // LOCAL: ke project/public/uploads
                $request->file('image')->move(public_path('uploads/heroes'), $filename);
                $data['image'] = 'uploads/heroes/' . $filename;
            } else {
                // SERVER: langsung ke public_html/uploads
                $serverPath = '/home/sukj4448/public_html/uploads/heroes';
                if (!file_exists($serverPath)) {
                    mkdir($serverPath, 0775, true);
                }
                $request->file('image')->move($serverPath, $filename);
                $data['image'] = 'uploads/heroes/' . $filename;
            }
        }

        $hero->update($data);

        return redirect()->route('admin.heroes.index')->with('success', 'Hero berhasil diperbarui.');
    }

    public function destroy(Hero $hero)
    {
        if ($hero->image && file_exists(public_path($hero->image))) {
            unlink(public_path($hero->image));
        }

        $hero->delete();

        return redirect()->route('admin.heroes.index')->with('success', 'Hero berhasil dihapus.');
    }
}