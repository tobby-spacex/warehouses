<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\WarehouseProduct;
use App\Rules\UniqueWarehouseProduct;
use Illuminate\Http\RedirectResponse;

class WarehouseProductController extends Controller
{
     /** @var WarehouseProduct $warehouseProduct */
    protected $warehouseProduct;

    /** @var Product $product */
    protected $product;

     /**
     * WarehouseProductController constructor.
     *
     * @param WarehouseProduct $warehouseProduct
     * @param Product $product
     */
    public function __construct(WarehouseProduct $warehouseProduct, Product $product)
    {
        $this->warehouseProduct = $warehouseProduct;
        $this->product = $product;
    }

     /**
     * Display the details of a specific warehouse.
     *
     * @param \App\Models\Warehouse $warehouse The warehouse to display.
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Warehouse $warehouse) {
        
        $warehouseProducts = $this->warehouseProduct->with('product')
            ->where('warehouse_id', $warehouse->id)
            ->paginate(3, ['product_id', 'quantity']);
              
        return view('warehouses.manage', [
            'warehouse'         => $warehouse,
            'products'          => $this->product->all(),
            'warehouseProducts' => $warehouseProducts
        ]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Warehouse $warehouse): RedirectResponse {
  
        $validateFormData = $request->validate([
            'warehouse_id' => 'required',
            'product_ids'  => ['required', new UniqueWarehouseProduct($request->input('warehouse_id'))],
            'quantity'     => 'required'
        ]);

        foreach($validateFormData['product_ids'] as $productId) {
            $this->warehouseProduct->create([
                'warehouse_id' => $validateFormData['warehouse_id'],
                'product_id'   => $productId,
                'quantity'     => $validateFormData['quantity']
            ]);
        }

        return redirect()->route('warehouse.manage', $warehouse);

    }

     /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {

        $this->warehouseProduct
                ->where('warehouse_id', $request['warehouse_id'])
                ->where('product_id', $request['product_id'])
                ->delete();

        return back();
    }
}
