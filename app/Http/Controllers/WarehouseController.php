<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index() {
        return view('warehouse.index', [
            'warehouses' => Warehouse::paginate(2)
        ]);
    }

    // Show Warehouse Create Form
    public function create() {
        return view('warehouse.create');
    }

    // Show Warehouse Edit Form
    public function edit(Warehouse $warehouse) {
        return view('warehouse.edit', ['warehouse' => $warehouse]);
    }

    public function store(Request $request) {

        $validatedFormData = $request->validate([
            'name'        => 'required',
            'address'     => 'required',
            'city'        => '',
            'phone'       => 'required',
            'email'       => ['required', 'email'],
            'country'     => 'required',
            'description' => '',
            'status'      => ''
        ]);

        Warehouse::create($validatedFormData);
        
        session()->flash('success', 'New Warehouse created.');

        return redirect('/');
    }

    public function update(Request $request, Warehouse $warehouse) {
        $validatedFormData = $request->validate([
            'name'        => 'required',
            'address'     => 'required',
            'city'        => '',
            'phone'       => 'required',
            'email'       => ['required', 'email'],
            'country'     => 'required',
            'description' => '',
            'status'      => ''
        ]);

        $warehouse->update($validatedFormData);
        
        session()->flash('success', 'Updated data');

        return back();
    }
}
