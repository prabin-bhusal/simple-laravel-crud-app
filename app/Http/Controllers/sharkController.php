<?php

namespace App\Http\Controllers;

use App\Models\Shark;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class sharkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sharks = Shark::all();

        // return View::make('sharks.index')->with('sharks', $sharks);

        return view('sharks.index')->with('sharks', $sharks);

        // return redirect(route('sharks.index'))->with('sharks', $sharks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return View::make('sharks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'shark_level' => 'nullable',
        ]);

        $newData = Shark::create($data);
        return redirect(route('sharks.index'))->with('message', 'Successfully created shark!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $shark = Shark::find($id);

        return View::make('sharks.show')->with('shark', $shark);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $shark = Shark::find($id);
        return View::make('sharks.edit')->with('shark', $shark);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shark $shark)
    {
        //

        // dd($id);

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'shark_level' => 'nullable',
        ]);

        $shark->update($data);



        // return View::make('sharks.index')->with('sharks', $shark)
        //     ->with('message', "Updated Successfully");

        return redirect(route('sharks.index'))->with('message', 'Product updated successully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $shark = Shark::find($id);
        $shark->delete();


        return redirect(route('sharks.index'))->with('message', 'Product deleted successully');
    }
}
