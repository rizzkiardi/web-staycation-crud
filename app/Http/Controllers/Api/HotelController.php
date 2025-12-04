<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::with('category')->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'List of hotels',
            'data' => $hotels
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hotels', 'public');
        }

        $hotel = Hotel::create([
            'name' => $validated['name'],
            'location' => $validated['location'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
            'image' => $imagePath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Hotel created successfully',
            'data' => $hotel
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $hotel = Hotel::with('category')->find($id);

        if (!$hotel) {
            return response()->json([
                'success' => false,
                'message' => 'Hotel Not Found',
                'errors' => ['id' => 'Record Not Found']
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Hotel detail',
            'data' => $hotel
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json([
                'success' => false,
                'message' => 'Hotel Not Found',
                'errors' => ['id' => 'Record Not Found']
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hotels', 'public');
            $hotel->image = $imagePath;
        }

        $hotel->update([
            'name' => $request->name,
            'location' => $request->location,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Hotel updated successfully',
            'data' => $hotel
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json([
                'success' => false,
                'message' => 'Hotel Not Found',
                'errors' => ['id' => 'Record Not Found']
            ], 404);
        }

        $hotel->delete();

        return response()->json([
            'success' => true,
            'message' => 'Hotel deleted successfully',
            'data' => (object)[]
        ], 200);
    }
}
