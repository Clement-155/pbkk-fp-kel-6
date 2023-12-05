<?php

namespace App\Http\Controllers;

use App\Models\Bahasa;
use App\Models\DataSoal;
use App\Models\PaketSoal;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

        /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        
        //validate form
        $initial = Validator::make($request->all(), [
            'urutan_soal' => 'required|gt:0|integer|unique:data_soals,urutan_soal',
            'bahasa' => 'required',
            'pertanyaan' => 'required|min:10',
            'tipe_soal' => 'required',
            'jawaban_isian' => 'required_if:tipe_soal,1',
            'jawaban_A' => 'required_unless:tipe_soal,1',
            'jawaban_B' => 'required_unless:tipe_soal,1',
            'jawaban_C' => 'required_unless:tipe_soal,1',
            'jawaban_D' => 'required_unless:tipe_soal,1',
        ], $this->messages())->validate();


        $jawaban1 = $request->jawaban_isian ? $request->jawaban_isian : $request->jawaban_A;

        //create post
        DataSoal::create([
            'last_editor' => Auth::id(),
            'urutan_soal' => $request->urutan_soal,
            'bahasas_id' => $request->bahasa,
            'paket_soals_id' => $request->id_paket,
            'tipe_soal' => $request->tipe_soal,
            'soal' => $request->pertanyaan,
            'jawaban' => $jawaban1,
            'jawaban2' => $request->jawaban_B,
            'jawaban3' => $request->jawaban_C,
            'jawaban4' => $request->jawaban_D,

            
        ]);

        PaketSoal::where('id', $request->id_paket)
        ->update([
      'jumlah_soal'=> DB::raw('jumlah_soal+1')]); 

        return redirect()->back()->withInput()->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'urutan_soal.unique' => 'The urutan soal value is already taken',
            'jawaban_isian.required_if' => 'The field is required unless tipe soal is "Pilihan Ganda/Beberapa Pilihan"',
            'jawaban_A.required_unless' => 'The field is required unless tipe soal is "isian"',
            'jawaban_B.required_unless' => 'The field is required unless tipe soal is "isian"',
            'jawaban_C.required_unless' => 'The field is required unless tipe soal is "isian"',
            'jawaban_D.required_unless' => 'The field is required unless tipe soal is "isian"',
        ];
    }

    
}
