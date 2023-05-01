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

    public function store(Request $request) {
        
        $validatedFormData = $request->validate([
            'name'        => 'required',
            'sku'         => ['required', Rule::unique('products', 'sku')],
            'price'       => 'required',
            'description' => ''
        ]);

        Product::create($validatedFormData);

        session()->flash('success', 'New Product created.');

        return redirect('/dashboard');
    }
}
