<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review; // Zorg ervoor dat je het juiste model importeert

class ReviewController extends Controller
{
    /**
     * Opslaan van een nieuwe review.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valideer de input van het formulier
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Maak een nieuwe review aan en sla deze op in de database
        $review = new Review();
        $review->user_id = auth()->id(); // Gebruiker die de review indient (indien ingelogd)
        $review->name = $validatedData['name'];
        $review->review = $validatedData['review'];
        $review->rating = $validatedData['rating'];
        $review->save();

        // Redirect terug naar de pagina met een succesbericht
        return redirect()->back()->with('success', 'Bedankt voor je review!');
    }

    // Je kunt hier andere methodes toevoegen voor bijvoorbeeld het tonen van alle reviews, bewerken, verwijderen, etc.
}

