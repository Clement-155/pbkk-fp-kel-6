<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Support\Facades\Redirect;
use PDF;
use App\Models\Bahasa;
use App\Models\DataSoal;
use App\Models\PaketSoal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PaketCRUDController extends Controller
{
    //Displays data
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {

        $PaketSoal = PaketSoal::latest()->paginate(10);        
        $bahasas = DB::table('bahasas')->get();
        $id_bahasas = $bahasas->pluck('id')->toArray();
        $nama_bahasas = $bahasas->pluck('bahasa')->toArray();
        //render view with posts
        return view('PaketSoal.index', compact('PaketSoal', 'id_bahasas', 'nama_bahasas'));
    }

     /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $data = Bahasa::all();
        // dd($data);

        $bahasa = [];

        foreach ($data as $key => $value) {
            $bahasa[$value->id] = ["id"=>$value->id,"kata"=>$value->bahasa];
        }

        ksort($bahasa);

        // dd($bahasa);
        //Directs to resources/views/KamusBahasa/create.blade.php
        return view('PaketSoal.create', ['bahasa' => $bahasa]);
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
        $this->validate($request, [
            'bahasa' => 'required|min:1',
            'nama_paket' => 'required|min:1|distinct',
            'deskripsi' => 'required|min:5',
        ]);


        //create post
        PaketSoal::create([
            'last_editor' => Auth::id(),
            'bahasas_id' => $request->bahasa,
            'nama_paket' => $request->nama_paket,
            'deskripsi' => $request->deskripsi,
            'jumlah_soal' => 0,
        ]);

        return redirect()->route('PaketSoal.create')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(Request $request, $PaketSoal): View
    {
        $paket_soal = PaketSoal::all()->find($PaketSoal);
        $data_soal = $paket_soal->dataSoal->toArray();
        
        $paket_soal = $paket_soal->toArray();
        return view('Soal.MainSoalView', ['data_soal' => $data_soal, 'id_paket' => $paket_soal["id"], 'namaPaket' => $paket_soal["nama_paket"]]);
    }

    public function evaluate(Request $request, $PaketSoal)
    {
        $benar = [];
        foreach ($request->jawaban as $jawaban)
        {
            $kunci = DataSoal::all(['id', 'jawaban_benar'])->find($jawaban['id_soal'])->jawaban_benar;
            
            switch ($jawaban["tipe_soal"]) {
                case "2":
                    
                    if ($kunci == $jawaban['ans']){
                        array_push($benar, true);
                    }
                    else{
                        array_push($benar, false);
                    }
                    break;
                case "3":
                    $kunci = explode(",", $kunci);
                    $isTrue = true;

                    foreach($kunci as $key){
                        $isTrue = $isTrue && array_key_exists($key, $jawaban["ans"]);
                    }
                    
                    if ($isTrue){
                        array_push($benar, true);
                    }
                    else{
                        array_push($benar, false);
                    }

                    break;
            }
            
        }

        $nilai = count(array_filter($benar)) / count($benar);
 
        Nilai::create([
            'user_id' => Auth::id(),
            'paket_soal_id' => $PaketSoal,
            'nilai' => $nilai*100,
        ]);
        
        return redirect()->route('PaketSoal.index')->with(['success' => 'Nilai Berhasil Disimpan!']);
    }

    public function generatePDF()
    {
        $soal = PaketSoal::inRandomOrder()->take(10)->get(); // Example: Retrieve 10 random quiz questions

        $pdf = PDF::loadView('PaketSoal.pdf', ['soal' => $soal]);

        return $pdf->download('PaketSoal.pdf');
    }

}
