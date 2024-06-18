<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review; // Importeer het Review model

class ReviewController extends Controller
{
    /**
     * Laat de welkomstpagina zien met alle reviews.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::latest()->get(); // Haal alle reviews op, gesorteerd op nieuwste eerst

        return view('welcome', compact('reviews'));
    }

    /**
     * Sla een nieuwe review op in de database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valideer de invoer van het formulier
        $request->validate([
            'name' => 'required|string|max:255',
            'review' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Maak een nieuwe review aan in de database
        $review = new Review();
        $review->user_id = auth()->id(); // Gebruik de ingelogde gebruiker (indien nodig)
        $review->name = $request->name;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();

        return redirect()->back()->with('success', 'Review is succesvol toegevoegd!');
    }

    // Andere methoden in de controller...
}


