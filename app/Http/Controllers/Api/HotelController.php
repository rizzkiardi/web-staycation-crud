<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    // GET
    public function index()
    {
        $hotels = Hotel::all();

        return response()->json([
            'success' => true,
            'message' => 'List of hotels',
            'data' => $hotels
        ]);
    }

    // POST
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hotels', 'public');
        }

        $hotel = Hotel::create([
            'name' => $request->name,
            'location' => $request->location,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Hotel has been Created Successfully.',
            'data' => $hotel
        ], 201);
    }

    // GET berdasarkan ID
    public function show($id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json([
                'success' => false,
                'message' => 'Hotel Not Found',
                'errors' => [
                    'Error' => 'Record Not Found'
                ]
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Hotel Detail',
            'data' => $hotel
        ]);
    }

    // PUT
    public function update(Request $request, $id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json([
                'success' => false,
                'message' => 'Hotel Not Found',
                'errors' => [
                    'Error' => 'Record Not Found'
                ]
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
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
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Hotel has been Updated.',
            'data' => $hotel
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json([
                'success' => false,
                'message' => 'Hotel not found',
                'errors' => [
                    'Error' => 'Record Not Found'
                ]
            ], 404);
        }

        $hotel->delete();

        return response()->json([
            'success' => true,
            'message' => 'Hotel was successfully Deleted.',
            'data' => (object)[]
        ]);
    }
}
