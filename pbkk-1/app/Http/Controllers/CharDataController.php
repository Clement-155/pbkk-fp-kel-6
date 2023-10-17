<?php

namespace App\Http\Controllers;

//Import model
use App\Models\CharData;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class CharDataController extends Controller
{
    //Displays data
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get 10 latest posts
        $Data = CharData::all();

        //render view with posts
        return view('CharData.index', ['CharData' => $Data]);
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        //Directs to resources/views/CharData/create.blade.php
        return view('CharData.create');
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
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'full_name'     => 'required|min:1',
            'nickname'   => 'required|min:1',
            'description' => 'required|min:10',
            'base_prot' => 'required|integer|min:0',
            'prot_multiplier' => 'required|decimal:0,2|gte:-99.99|lte:99.99',
            'base_dmg' => 'required|integer|min:1',
            'dmg_multiplier' => 'required|decimal:0,2|gte:2.50|lte:99.99',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/CharData', $image->hashName());


        //create post
        CharData::create([
            'image'     => $image->hashName(),
            'full_name'     => $request->full_name,
            'nickname'   => $request->nickname,
            'description' => $request->description ,
            'base_prot' => $request->base_prot ,
            'prot_multiplier' => $request->prot_multiplier ,
            'base_dmg' => $request->base_dmg ,
            'dmg_multiplier' => $request->dmg_multiplier ,
        ]);
        //redirect to index
        return redirect()->route('CharData.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

}
