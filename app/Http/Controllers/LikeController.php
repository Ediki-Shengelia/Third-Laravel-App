<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Notifications\LikeNotification;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function add_like_logic(Request $request, Market $market)
    {
        $like = \App\Models\Like::where('user_id', auth()->id())
            ->where('market_id', $market->id)
            ->first();
        if ($like) {
            $like->delete();
        } else {
            \App\Models\Like::create([
                'user_id' => auth()->id(),
                'market_id' => $market->id,
            ]);
            if ($market->user_id !== auth()->id()) {
                $market->user->notify(new LikeNotification($market));
            }
        }
        return back();
    }
}
