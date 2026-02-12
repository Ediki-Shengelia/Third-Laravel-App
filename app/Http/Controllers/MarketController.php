<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = \App\Models\Market::$type;
        return view('market.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\StoreProduct $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['unique_id'] = now()->timestamp . random_int(111, 999);
        if ($request->hasFile('product_image')) {
            $data['product_image'] = $request->file('product_image')
                ->store('products', 'public');
        }
        \App\Models\Market::create($data);
        return redirect()->route('market.index')->with('success', 'Photo uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
