<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class WarehouseController extends Controller
{
     /**
     * The warehouse model instance.
     *
     * @var \App\Models\Warehouse
     */
    protected $warehouse;

     /**
     * WarehouseController constructor.
     *
     * @param Warehouse $warehouse
     */
    public function __construct(Warehouse $warehouse)
    {
        $this->warehouse = $warehouse;
    }

     /**
     * Display a listing of the warehouses.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        return view('warehouses.index', [
            'warehouses' => $this->warehouse->paginate(5)
        ]);
    }

     /**
     * Display the form for creating a new warehouse.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View {
        return view('warehouses.create');
    }

    /**
     * Display the form for editing the specified warehouse.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\View\View
     */
    public function edit(Warehouse $warehouse): View {
        return view('warehouses.edit', ['warehouse' => $warehouse]);
    }


     /**
     * Store a new warehouse in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {

        $validatedFormData = $request->validate([
            'name'        => 'required|string|max:155',
            'address'     => 'required|string|max:255',
            'city'        => 'nullable|string|max:155',
            'phone'       => 'required|string|max:20',
            'email'       => ['required', 'email', 'max:255'],
            'country'     => 'required|string|max:155',
            'description' => 'nullable|string',
            'status'      => 'nullable|boolean'
        ]);

        $warehouse = $this->warehouse->create($validatedFormData);
        
        session()->flash('success', 'New Warehouse created.');

        return redirect('/warehouse/' . $warehouse->id . '/manage');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Warehouse $warehouse): RedirectResponse {
        $validatedFormData = $request->validate([
            'name'        => 'required|string|max:155',
            'address'     => 'required|string|max:255',
            'city'        => 'nullable|string|max:155',
            'phone'       => 'required|string|max:20',
            'email'       => ['required', 'email', 'max:255'],
            'country'     => 'required|string|max:155',
            'description' => 'nullable|string',
            'status'      => 'nullable|boolean'
        ]);

        $warehouse->update($validatedFormData);
        
        session()->flash('success', 'Updated data');

        return back();
    }

     /**
     * Delete a warehouse.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse {

        $warehouse = $this->warehouse->find($request->warehouse_id);
    
        if ($warehouse) {
            $warehouse->delete();
        }

        session()->flash('success', 'Warehouse deleted.');

        return back();
    }
}
