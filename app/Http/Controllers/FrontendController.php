<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Kenapa;
use App\Models\Produk;
use App\Models\Team;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index()
    {
        return view('welcome', [
            'abouts' => About::orderBy('id', 'desc')->get(),
            'produks' => Produk::orderBy('id', 'desc')->get(),
            'kenapas' => Kenapa::orderBy('id', 'desc')->get(),
            'teams' => Team::orderBy('id', 'desc')->get(),
            'testimonis' => Testimoni::orderBy('id', 'desc')->get(),
            'teams' => Team::orderBy('id', 'desc')->get(),
        ]);
    }
    public function tentang()
    {
        return view('tentang', [
            'abouts' => About::orderBy('id', 'desc')->get(),

        ]);
    }
    public function product()
    {
        return view('product', [
            'produks' => Produk::orderBy('id', 'desc')->get(),

        ]);
    }
    public function service()
    {
        return view('services', [
            'kenapas' => kenapa::orderBy('id', 'desc')->get(),

        ]);
    }
    public function feedback()
    {
        return view('feedback', [
            'testimonis' => Testimoni::orderBy('id', 'desc')->get(),

        ]);
    }

    public function tim()
    {
        return view('tim', [
            'teams' => Team::orderBy('id', 'desc')->get(),

        ]);
    }
}
