<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    //
    public function index()
    {
        return view('admin.team.index', [
            'teams' => Team::orderBy('id', 'desc')->get()
        ]);
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'nim' => 'required',
            'tugas' => 'required',
            'image' => 'required|max:1000|mimes:jpg,jpeg,png,webp',

        ];

        $messages = [
            'nama.required' => 'wajib diisi!',
            'nim.required' => ' wajib diisi!',
            'tugas.required' => ' wajib diisi!',
            'image.required' => 'wajib diisi!',

        ];

        $this->validate($request, $rules, $messages);
        // Image
        $fileName = time() . '.' . $request->image->extension();
        $request->file('image')->storeAs('public/team', $fileName);
        # Artikel
        $storage = "storage/content-team";
        $dom = new \DOMDocument();
        # untuk menonaktifkan kesalahan libxml standar dan memungkinkan penanganan kesalahan pengguna.
        libxml_use_internal_errors(true);
        // //desc awale
        // $dom->loadHTML($request->subjudul, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        # Menghapus buffer kesalahan libxml
        libxml_clear_errors();



        team::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'tugas' => $request->tugas,
            'image' => $fileName,

        ]);

        return redirect(route('team'))->with('Success', 'data berhasil di simpan');
    }

    public function edit($id)
    {
        $team = team::findOrFail($id);
        return view('admin.team.edit', compact('team'));
    }


    public function update(Request $request, $id)
    {
        $team = team::find($id);

        # Jika ada image baru
        if ($request->hasFile('image')) {
            $fileCheck = 'required|max:1000|mimes:jpg,jpeg,png';
        } else {
            $fileCheck = '';
        }

        $rules = [
            'nama' => 'required',
            'nim' => 'required',
            'tugas' => 'required',

            'image' => $fileCheck,

        ];

        $messages = [
            'nama.required' => 'Judul wajib diisi!',
            'nim.required' => 'Judul wajib diisi!',
            'tugas.required' => 'Judul wajib diisi!',

            'image.required' => 'Judul wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // Cek jika ada image baru
        if ($request->hasFile('image')) {
            if (\File::exists('storage/team/' . $team->image)) {
                \File::delete('storage/team/' . $request->old_image);
            }
            $fileName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('public/team', $fileName);
        }

        if ($request->hasFile('image')) {
            $checkFileName = $fileName;
        } else {
            $checkFileName = $request->old_image;
        }

        // Artikel
        $storage = "storage/content-team";
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);

        libxml_clear_errors();

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                $fileNameContent = uniqid();
                $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
                $filePath = ("$storage/$fileNameContentRand.$mimetype");
                $image = Image::make($src)->resize(1200, 1200)->encode($mimetype, 100)->save(public_path($filePath));
                $new_src = asset($filePath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }

        $team->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'tugas' => $request->tugas,
            'image' => $checkFileName,

        ]);

        return redirect(route('team'))->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $team = team::find($id);
        if (\File::exists('storage/team/' . $team->image)) {
            \File::delete('storage/team/' . $team->image);
        }

        $team->delete();

        return redirect(route('team'))->with('success', 'Data berhasil dihapus');
    }
}
