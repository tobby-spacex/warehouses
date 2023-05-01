<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

    // Show Product Create Form
    public function create() {
        return view('products.create');
    }

    public function index() {
        return view('products.list', [
            'products' => Product::paginate(2)
        ]); 
    }

    public function edit(Product $product) {
        return view('products.edit', ['product' => $product]);
    }

    public function store(Request $request) {
        
        $validatedFormData = $request->validate([
            'name'        => 'required',
            'sku'         => ['required', Rule::unique('products', 'sku')],
            'price'       => 'required',
            'description' => ''
        ]);

        Product::create($validatedFormData);

        session()->flash('success', 'New Product created.');

        return redirect('/');
    }

    public function update(Request $request, Product $product) {
        
        $validatedFormData = $request->validate([
            'name'        => 'required',
            'sku'         => ['required', Rule::unique('products', 'sku')],
            'price'       => 'required',
            'description' => ''
        ]);

        $product->update($validatedFormData);

        session()->flash('success', 'Product data updated.');

        return back();
    }

    public function destroy(Product $product) {
        $product->delete();

        return back();
    }
}
