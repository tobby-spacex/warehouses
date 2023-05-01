<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\WarehouseProduct;
use App\Rules\UniqueWarehouseProduct;

class WarehouseProductController extends Controller
{
    protected $warehouseProduct;
    protected $product;

    public function __construct(WarehouseProduct $warehouseProduct, Product $product)
    {
        $this->warehouseProduct = $warehouseProduct;
        $this->product = $product;
    }

    public function show(Warehouse $warehouse) {
        
        $warehouseProducts = $this->warehouseProduct->with('product')
            ->where('warehouse_id', $warehouse->id)
            ->paginate(3, ['product_id', 'quantity']);
              
        return view('warehouse.manage', [
            'warehouse'         => $warehouse,
            'products'          => $this->product->all(),
            'warehouseProducts' => $warehouseProducts
        ]);
    }

    public function store(Request $request, Warehouse $warehouse) {
  
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

    public function destroy(Request $request) {

        $this->warehouseProduct
                ->where('warehouse_id', $request['warehouse_id'])
                ->where('product_id', $request['product_id'])
                ->delete();

        return back();
    }
}
