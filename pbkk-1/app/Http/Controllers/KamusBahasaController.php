<?php

namespace App\Http\Controllers;

use App\Models\KamusBahasa;
use App\Models\Bahasa;

//return type View
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KamusBahasaController extends Controller
{
        //Displays data
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        if(Cache::get(Carbon::now()->toDateString())){
            $KamusBahasa = Cache::get(Carbon::now()->toDateString());
        }
        else{
            $KamusBahasa = KamusBahasa::latest()->paginate(10);
            Cache::add(Hash::make($KamusBahasa), $KamusBahasa, 600);
        }
        
        //render view with posts
        return view('KamusBahasa.index', compact('KamusBahasa'));
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
        return view('KamusBahasa.create', ['bahasa' => $bahasa]);
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
            'kata' => 'required|min:1',
            'pengertian' => 'required|min:5',
            'contoh' => 'required|min:5',
        ]);


        //create post
        KamusBahasa::create([
            'last_editor' => Auth::id(),
            'bahasa' => $request->bahasa,
            'kata' => $request->kata,
            'pengertian' => $request->pengertian,
            'contoh' => $request->contoh,
        ]);
        //redirect to index
        return redirect()->route('KamusBahasa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

}
