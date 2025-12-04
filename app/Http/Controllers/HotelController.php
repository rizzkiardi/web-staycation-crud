<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Category;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::latest()->paginate(10);
        return view('hotels.index', compact('hotels'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('hotels.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:60',
            'price' => 'required|numeric',
            'location' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'category_id' => 'required|exists:categories,id',
        ], [
            'name.required' => 'Name is Required.',
            'name.max' => 'Maximal 60 Characters.',

            'price.required' => 'Price is Required.',
            'price.numeric' => 'Price must be a Number.',

            'location.required' => 'Location is Required.',
            'location.max' => 'Maximal 255 Characters.',

            'image.image' => 'File uploaded must be an image.',
            'image.mimes' => 'Image format must be jpg, jpeg, png.',
            'image.max' => 'Maximum size is 1Mb',
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->image->store('hotels', 'public');
        }

        Hotel::create($validated);
        $request->session()->flash('success', 'Hotel has been Created Successfully.');

        return redirect()->route('hotels.index');
    }

    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('hotels.show', compact('hotel'));
    }

    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        $categories = Category::all();
        return view('hotels.edit', compact('hotel', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:60',
            'price' => 'required|numeric',
            'location' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'category_id' => 'required|exists:categories,id'
        ], [
            'name.required' => 'Name is Required.',
            'name.max' => 'Maximal 60 Characters.',

            'price.required' => 'Price is Required.',
            'price.numeric' => 'Price must be a Number.',

            'location.required' => 'Location is Required.',
            'location.max' => 'Maximal 255 Characters.',

            'image.image' => 'File uploaded must be an image.',
            'image.mimes' => 'Image format must be jpg, jpeg, png.',
            'image.max'   => 'Maximum size is 1Mb',
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->image->store('hotels', 'public');
        }

        $hotel->update($validated);

        return redirect()->route('hotels.index')->with('success', 'Hotel has been Edited');
    }

    public function destroy($id)
    {
        Hotel::findOrFail($id)->delete();
        return redirect()->route('hotels.index')->with('success', 'Hotel was successfully Deleted.');
    }
}
