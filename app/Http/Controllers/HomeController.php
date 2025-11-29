<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HomeController extends Controller
{
    public function index()
    {
        $statistics = [
            'property' => 120,
            'cities' => 18,
        ];

        $featured = Hotel::latest()->take(10)->get();

        $testimonial = [
            'story' => 'Staycation ini memberikan pengalaman terbaik bagi saya dan keluarga.',
            'invitation' => 'Ayo temukan pengalaman menginap terbaik bersama kami.',
            'user' => 'Luna'
        ];

        return view('home', compact(
            'statistics',
            'featured',
            'testimonial'
        ));
    }
}
