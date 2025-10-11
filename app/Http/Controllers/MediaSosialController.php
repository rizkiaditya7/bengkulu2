<?php

namespace App\Http\Controllers;

use App\Models\media_sosial as MediaSosial;
use Illuminate\Http\Request;

class MediaSosialController extends Controller
{
    public function index()
    {
        $data = MediaSosial::all();
        return view('admin.media.index', compact('data'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'icon' => 'required',
            'link' => 'nullable|url',
        ]);

        MediaSosial::create($request->all());
        return redirect()->route('admin.media.index')->with('success', 'Media sosial berhasil ditambahkan.');
    }

    public function edit(MediaSosial $medium)
    {
        $media=$medium;
        return view('admin.media.edit', compact('media'));
    }

    public function update(Request $request, MediaSosial $media)
    {
        $request->validate([
            'nama' => 'required',
            'icon' => 'required',
            'link' => 'nullable|url',
        ]);

        $media->update($request->all());
        return redirect()->route('admin.media.index')->with('success', 'Media sosial berhasil diperbarui.');
    }

    public function destroy(MediaSosial $media)
    {
        $media->delete();
        return redirect()->route('admin.media.index')->with('success', 'Media sosial berhasil dihapus.');
    }
}