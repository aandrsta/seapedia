<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reviewer_name' => ['required', 'string', 'max:255'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['required', 'string', 'max:1000'],
        ], [
            'reviewer_name.required' => 'Nama peninjau wajib diisi.',
            'rating.required' => 'Rating wajib dipilih.',
            'comment.required' => 'Ulasan wajib diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Prevent XSS: strip_tags on name and comment for extra safety
        // Although Blade escapes by default, doing it here is double-protection
        $reviewerName = strip_tags($request->reviewer_name);
        $comment = strip_tags($request->comment);

        Review::create([
            'user_id' => auth()->id(),
            'reviewer_name' => $reviewerName,
            'rating' => $request->rating,
            'comment' => $comment,
        ]);

        return redirect()->route('home')->with('success', 'Ulasan Anda berhasil dikirim! Terima kasih atas masukannya.');
    }
}
