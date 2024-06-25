<?php

namespace App\Http\Controllers;

use App\Models\Kenapa;
use Illuminate\Http\Request;

class KenapaController extends Controller
{
    //
    public function index()
    {
        return view('admin.kenapa.index', [
            'kenapas' => Kenapa::orderBy('id', 'desc')->get()
        ]);
    }

    public function create()
    {
        return view('admin.kenapa.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required',
            'katakata' => 'required',

            'image' => 'required|max:1000|mimes:jpg,jpeg,png,webp',

        ];

        $messages = [
            'judul.required' => 'Judul wajib diisi!',
            'katakata.required' => 'spek wajib diisi!',

            'image.required' => 'Image wajib diisi!',

        ];

        $this->validate($request, $rules, $messages);
        // Image
        $fileName = time() . '.' . $request->image->extension();
        $request->file('image')->storeAs('public/kenapa', $fileName);
        # Artikel
        $storage = "storage/content-kenapa";
        $dom = new \DOMDocument();
        # untuk menonaktifkan kesalahan libxml standar dan memungkinkan penanganan kesalahan pengguna.
        libxml_use_internal_errors(true);
        // //desc awale
        // $dom->loadHTML($request->spek, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        # Menghapus buffer kesalahan libxml
        libxml_clear_errors();



        kenapa::create([
            'judul' => $request->judul,

            'image' => $fileName,
            'katakata' => $request->katakata,

        ]);

        return redirect(route('kenapa'))->with('Success', 'data berhasil di simpan');
    }

    public function edit($id)
    {
        $kenapa = kenapa::find($id);
        return view('admin.kenapa.edit', [
            'kenapa' => $kenapa
        ]);
    }


    public function update(Request $request, $id)
    {
        $kenapa = kenapa::find($id);

        # Jika ada image baru
        if ($request->hasFile('image')) {
            $fileCheck = 'required|max:1000|mimes:jpg,jpeg,png';
        } else {
            $fileCheck = '';
        }

        $rules = [
            'judul' => 'required',
            'katakata' => 'required',

            'image' => $fileCheck,

        ];

        $messages = [
            'judul.required' => 'Judul wajib diisi!',
            'image.required' => 'Judul wajib diisi!',
            'katakata.required' => 'Judul wajib diisi!',

        ];

        $this->validate($request, $rules, $messages);

        // Cek jika ada image baru
        if ($request->hasFile('image')) {
            if (\File::exists('storage/kenapa/' . $kenapa->image)) {
                \File::delete('storage/kenapa/' . $request->old_image);
            }
            $fileName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('public/kenapa', $fileName);
        }

        if ($request->hasFile('image')) {
            $checkFileName = $fileName;
        } else {
            $checkFileName = $request->old_image;
        }

        // Artikel
        $storage = "storage/content-artikel";
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

        $kenapa->update([
            'judul' => $request->judul,
            'image' => $checkFileName,
            'katakata' => $request->katakata,

        ]);

        return redirect(route('kenapa'))->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $kenapa = kenapa::find($id);
        if (\File::exists('storage/kenapa/' . $kenapa->image)) {
            \File::delete('storage/kenapa/' . $kenapa->image);
        }

        $kenapa->delete();

        return redirect(route('kenapa'))->with('success', 'Data berhasil dihapus');
    }
}
