<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {

    }

    public function index()
    {
        $products = Product::with('images')->inRandomOrder()->take(4)->get();
    
        return view('guest.home', ['products' => $products]);
    }
    


    public function product()
    {
        $products = Product::with('images')->get();

        return view('guest.product', [ 'products' => $products ]);
    }

    public function product_detail($id)
    {
        $product = Product::with('images')->findOrFail($id);

        if($product) {
            return view('guest.product_detail', [ 'product' => $product ]);
        }
        
        return redirect()->back();

    }

    public function contact()
    {
        $products = Product::all();

        return view('guest.contact', [ 'products' => $products ]);
    }

    public function about()
    {
        return view('guest.about');
    }
}
