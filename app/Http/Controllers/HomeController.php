<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::latest()->take(4)->get();
        return view('home', compact('featuredProducts'));
    }

    public function about()
    {
        return view('about');
    }
}