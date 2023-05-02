<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * The warehouse model instance.
     *
     * @var \App\Models\Product
     */
    protected $product;

     /**
     * WarehouseController constructor.
     *
     * @param Warehouse $warehouse
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }


     /**
     * Display the form for creating a new product.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('products.create');
    }

     /**
     * Display a listing of the products.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        return view('products.list', [
            'products' => $this->product->paginate(5)
        ]); 
    }

     /**
     * Display the form for editing the specified product.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\View\View
     */
    public function edit(Product $product) {
        return view('products.edit', ['product' => $product]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $validatedFormData = $request->validate([
            'name'        => 'required|string|max:155',
            'sku'         => ['required', Rule::unique('products', 'sku')],
            'price'       => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'nullable|string'
        ]);

        $product = $this->product->create($validatedFormData);

        session()->flash('success', 'New Product created.');

        return redirect('/product/' . $product->id . '/edit');
    }

     /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product): RedirectResponse {
        
        $validatedFormData = $request->validate([
            'name'        => 'required|string|max:155',
            'sku'         => 'required|string|max:255',
            'price'       => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'nullable|string'
        ]);

        $product->update($validatedFormData);

        session()->flash('success', 'Product data updated.');

        return back();
    }

     /**
     * Delete a product.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse {
        $product->delete();

        return back();
    }
}
