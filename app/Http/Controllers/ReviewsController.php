<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required',
            'text' => 'required'
        ]);
        Reviews::create([
            'user_id' => Auth::user()->id,
            'prod_id' => $request->prod_id,
            'stars' => $request->rating,
            'text'  => $request->text,
        ]);
        Alert::success('Success', "Review Added Successfully");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Reviews $reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reviews $reviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reviews $reviews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $review = Reviews::find($id);
        $review->delete();
        Alert::Success('Success', "Review deleted Successfully");
        return redirect()->back();
    }
}
