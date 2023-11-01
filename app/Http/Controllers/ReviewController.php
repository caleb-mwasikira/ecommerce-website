<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function add_review(Request $request)
    {
        $attributes = $request->validate([
            "product_id" => "required|unique:products,id",
            "customer_id" => "required|unique:reviews,id",
            "review_text" => "required|min:10",
            "rating" => "required|digits_between:0,5",
        ]);

        ddd($attributes);

        $review = new Review($attributes);
        $review->save();

        return to_route("view-product")
            ->with("success", "Your comment has been saved");
    }
}
