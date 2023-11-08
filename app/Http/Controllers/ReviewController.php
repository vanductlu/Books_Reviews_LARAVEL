<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_id' => 'required',
            'user_id' => 'required',
            'rating' => 'required',
            'review_text' => 'required',
            'review_date' => 'required',
        ]);

        Review::create($validatedData);

        return redirect()->back()
            ->with('success', 'Review created successfully.');
    }

    public function update(Request $request, Review $review)
    {
        $validatedData = $request->validate([
            'book_id' => 'required',
            'user_id' => 'required',
            'rating' => 'required',
            'review_text' => 'required',
            'review_date' => 'required',
        ]);

        $review->update($validatedData);

        return redirect()->back()
            ->with('success', 'Review updated successfully.');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->back()
            ->with('success', 'Review deleted successfully.');
    }
}