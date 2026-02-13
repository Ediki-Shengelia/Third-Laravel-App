<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProduct;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        $products = \App\Models\Market::when(
            $search,
            fn($q, $search) => $q->title($search)
        );
        // $products = \App\Models\Market::all();
        $products = $products->get();
        return view('market.index', compact('products'));
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
    public function show(\App\Models\Market $market)
    {
        // $this->authorize('view', $market);
        return view('market.show', compact('market'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\App\Models\Market $market)
    {
        $this->authorize('update', $market);
        $raxac = \App\Models\Market::$type;
        return view('market.edit', compact('market', 'raxac'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduct $request, \App\Models\Market $market)
    {
        $this->authorize('update', $market);
        $data = $request->validated();
        $market->update($data);
        return redirect()->route('market.index')->with('success', "Product updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Market $market)
    {
        $this->authorize('delete', $market);
        $market->delete();
        return redirect()->route('market.index')->with('success', "Product deleted successfully");
    }
}
