<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Database\Eloquent\Builder;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cards = Card::when(request('search_global'), function (Builder $query) {
            $searchTerm = '%' . request('search_global') . '%';
            $query->where('id', 'like', $searchTerm)
                ->orWhere('card_number', 'like', $searchTerm)
                ->orWhere('pin', 'like', $searchTerm)
                ->orWhere('balance', 'like', $searchTerm);
        })
            ->paginate(config('database.default_pagination'));

        return CardResource::collection($cards);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCardRequest $request)
    {
        $card = Card::create($request->validated());

        return new CardResource($card);
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        return new CardResource($card);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        $card->update($request->validated());

        return new CardResource($card);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        $card->delete();

        return response()->noContent();
    }
}
