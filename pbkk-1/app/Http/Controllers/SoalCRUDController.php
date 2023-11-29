<?php

namespace App\Http\Controllers;

use App\Models\Bahasa;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoalCRUDController extends Controller
{
    //Displays data
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {


        //render view with posts
        return view('PaketSoal.index', compact('PaketSoal', 'id_bahasas', 'nama_bahasas'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(Request $request): View
    {
        if (!$request->has('id_paket') || !DB::table('paket_soals')->where('id', '=', $request->id_paket)->exists() ){
            abort(404);
        }
        $dataBahasa = Bahasa::all();
        $namaPaket = DB::table('paket_soals')->where('id', '=', $request->id_paket)->get()->pluck('nama_paket')[0];
        // dd($data);

        $bahasa = [];

        foreach ($dataBahasa as $key => $value) {
            $bahasa[$value->id] = ["id"=>$value->id,"kata"=>$value->bahasa];
        }

        ksort($bahasa);

        // dd($bahasa);
        //Directs to resources/views/KamusBahasa/create.blade.php
        return view('Soal.FormSoalView', ['bahasa' => $bahasa, 'id_paket' => $request->id_paket, 'namaPaket' => $namaPaket]);
    }
}
