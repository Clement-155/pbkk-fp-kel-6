<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Bahasa;
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

        return redirect()->route('PaketSoal.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function generatePDF()
    {
        $soal = PaketSoal::inRandomOrder()->take(10)->get(); // Example: Retrieve 10 random quiz questions

        $pdf = PDF::loadView('PaketSoal.pdf', ['soal' => $soal]);

        return $pdf->download('PaketSoal.pdf');
    }

}
