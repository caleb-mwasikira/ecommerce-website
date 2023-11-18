<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddReviewRequest;
use App\Http\Requests\DeleteReviewRequest;
use App\Models\Review;

class ReviewController extends Controller
{
    public function add_review(AddReviewRequest $request)
    {
        // Get validated input data
        $data = $request->validated();
        
        $review = new Review($data);
        $review->save();

        return back()
            ->withFragment('write_review')
            ->with("success", "Product review saved");
    }

    public function delete_review(int $reviewId, DeleteReviewRequest $request)
    {
        // Get validated input data
        $data = $request->validated();

        $review = Review::find($data["id"]);
        $review?->delete();

        return back()
            ->withFragment('view_reviews')
            ->with("success", "Product review deleted");
    }
}
