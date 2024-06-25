<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\produk;
use Illuminate\Http\Request;

class produkController extends Controller
{
    //
    public function index()
    {
        return view('admin.produk.index', [
            'produks' => produk::orderBy('id', 'desc')->get()
        ]);
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required',
            'spek1' => 'required',
            'spek2' => 'required',
            'spek3' => 'required',
            'spek4' => 'required',
            'image' => 'required|max:1000|mimes:jpg,jpeg,png,webp',

        ];

        $messages = [
            'judul.required' => 'Judul wajib diisi!',
            'spek1.required' => 'spek wajib diisi!',
            'spek2.required' => 'spek wajib diisi!',
            'spek3.required' => 'spek wajib diisi!',
            'spek4.required' => 'spek wajib diisi!',
            'image.required' => 'Image wajib diisi!',

        ];

        $this->validate($request, $rules, $messages);
        // Image
        $fileName = time() . '.' . $request->image->extension();
        $request->file('image')->storeAs('public/produk', $fileName);
        # Artikel
        $storage = "storage/content-produk";
        $dom = new \DOMDocument();
        # untuk menonaktifkan kesalahan libxml standar dan memungkinkan penanganan kesalahan pengguna.
        libxml_use_internal_errors(true);
        // //desc awale
        // $dom->loadHTML($request->spek, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        # Menghapus buffer kesalahan libxml
        libxml_clear_errors();



        produk::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul, '-'),
            'image' => $fileName,
            'spek1' => $request->spek1,
            'spek2' => $request->spek2,
            'spek3' => $request->spek3,
            'spek4' => $request->spek4,
        ]);

        return redirect(route('produk'))->with('Success', 'data berhasil di simpan');
    }

    public function edit($id)
    {
        $produk = produk::find($id);
        return view('admin.produk.edit', [
            'produk' => $produk
        ]);
    }


    public function update(Request $request, $id)
    {
        $produk = produk::find($id);

        # Jika ada image baru
        if ($request->hasFile('image')) {
            $fileCheck = 'required|max:1000|mimes:jpg,jpeg,png';
        } else {
            $fileCheck = '';
        }

        $rules = [
            'judul' => 'required',
            'spek1' => 'required',
            'spek2' => 'required',
            'spek3' => 'required',
            'spek4' => 'required',
            'image' => $fileCheck,

        ];

        $messages = [
            'judul.required' => 'Judul wajib diisi!',
            'image.required' => 'Judul wajib diisi!',
            'spek1.required' => 'Judul wajib diisi!',
            'spek2.required' => 'Judul wajib diisi!',
            'spek3.required' => 'Judul wajib diisi!',
            'spek4.required' => 'Judul wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // Cek jika ada image baru
        if ($request->hasFile('image')) {
            if (\File::exists('storage/produk/' . $produk->image)) {
                \File::delete('storage/produk/' . $request->old_image);
            }
            $fileName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('public/produk', $fileName);
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

        $produk->update([
            'judul' => $request->judul,
            'image' => $checkFileName,
            'spek1' => $request->spek1,
            'spek2' => $request->spek2,
            'spek3' => $request->spek3,
            'spek4' => $request->spek4,
        ]);

        return redirect(route('produk'))->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $produk = produk::find($id);
        if (\File::exists('storage/produk/' . $produk->image)) {
            \File::delete('storage/produk/' . $produk->image);
        }

        $produk->delete();

        return redirect(route('produk'))->with('success', 'Data berhasil dihapus');
    }
}
