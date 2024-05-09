<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return Inertia::render('Product/Product', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'description' => 'required|string',
            'old_price' => 'required|numeric',
            'image' => 'required|string',
            'instock' => 'nullable|boolean',
            'facture' => 'nullable|boolean',
            'slug' => 'required|string',
            'categories' => 'required|string',
            'souscategorie' => 'required|string',
            'variation' => 'required|string',
            'variation_option' => 'required|string',
            'option_price' => 'required|numeric',
        ]);
    
        Product::create($validatedData);
    
        return redirect()->route('products.index');
    }
    

       
}
