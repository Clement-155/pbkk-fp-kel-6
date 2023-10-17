<?php

namespace App\Http\Controllers;

use App\Models\KamusBahasa;

//return type View
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

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
        //get posts
        $KamusBahasa = KamusBahasa::latest()->paginate(10);

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
        //Directs to resources/views/KamusBahasa/create.blade.php
        return view('KamusBahasa.create');
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
