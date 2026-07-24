<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();
        return response()->json($reviews);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reviewer_name' => ['required', 'string', 'max:255'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['required', 'string', 'max:1000'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Prevent XSS
        $reviewerName = strip_tags($request->reviewer_name);
        $comment = strip_tags($request->comment);

        $review = Review::create([
            'user_id' => auth('sanctum')->id(),
            'reviewer_name' => $reviewerName,
            'rating' => $request->rating,
            'comment' => $comment,
        ]);

        return response()->json([
            'message' => 'Ulasan berhasil dikirim.',
            'review' => $review
        ], 201);
    }
}
