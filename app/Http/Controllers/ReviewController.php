<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Notifications\AddReviewNotification;
use Illuminate\Http\Request;

class ReviewController extends Controller
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
    public function create(\App\Models\Market $market)
    {

        return view('market.reviews.create', compact('market'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Market $market)
    {
        $data = $request->validate([
            'review' => 'required|min:15',
            'rating' => 'required|min:1|max:5|integer'
        ]);

        // Using the relationship automatically sets the market_id for you!
        $market->reviews()->create([
            'review' => $data['review'],
            'rating' => $data['rating'],
            'user_id' => auth()->id(),
        ]);
        if ($market->user_id !== auth()->id()) {
            $market->user->notify(new AddReviewNotification(($market)));
        }
        return redirect()->route('market.show', $market);
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
