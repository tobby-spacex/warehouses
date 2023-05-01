<x-app-layout>

    @include('partials._navbar')
    
    <div class="py-12">
        <div class = "max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class = "p-6 text-gray-900"> 
                    <ol class="relative border-l border-gray-200 dark:border-gray-700">                  
                        <li class="mb-10 ml-6">            
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                <svg aria-hidden="true" class="w-3 h-3 text-blue-800 dark:text-blue-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </span>
                            <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">Warehouse details
                                @if ($warehouse->status == '1')
                                <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ml-3">Active</span>
                            @else
                                <span class="bg-red-700 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ml-3">Inactive</span>
                            @endif
                                                        
                            </h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Name: {{$warehouse->name}}</p>
                            
                            <div class="flex">
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Address: {{$warehouse->address}}</p>
                                <p class="ml-5 text-base font-normal dark:text-gray-400">City: <span class="text-gray-500 dark:text-gray-400">{{$warehouse->city}}</span></p>
                                <p class="ml-5 text-base font-normal text-gray-500 dark:text-gray-400">Phone: {{$warehouse->phone}}</p>
                                <p class="ml-5 text-base font-normal text-gray-500 dark:text-gray-400">Email: {{$warehouse->email}}</p>
                            </div>
                       
                            <div>
                                <label class="text-base font-normal text-gray-500 dark:text-gray-400">Description:</label>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400"> {{$warehouse->description}}</p>
                            </div>
                        </li>

                        <li class="mb-10 ml-6">
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                <svg aria-hidden="true" class="w-3 h-3 text-blue-800 dark:text-blue-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </span>
                            <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Assigned goods</h3>

                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Product name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Sku
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Price
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center">
                                                Quantity
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($warehouseProducts as $warehouseProduct)
                                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                               {{$warehouseProduct->product->name}}
                                            </th>
                                            <td class="px-6">
                                                {{$warehouseProduct->product->sku}}
                                            </td>
                                            <td class="px-6">
                                                {{$warehouseProduct->product->price}}
                                            </td>
                                            <td class="px-6 text-center">
                                                {{$warehouseProduct->quantity}}
                                            </td>
                                            <td class="text-center">
                                                <form method="post" action="/warehouse.product/{{$warehouseProduct->product_id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input hidden name="warehouse_id" value="{{$warehouse->id}}"/>
                                                    <button type="submit" name="product_id" value="{{$warehouseProduct->product_id}}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-1 p-2">
                                    {{$warehouseProducts->links()}}
                                </div>
                            </div>
                        </li>


                        <li class="ml-6">
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                <svg aria-hidden="true" class="w-3 h-3 text-blue-800 dark:text-blue-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </span>
                            <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Assign goods to warehouse</h3>
                            <span class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">You can select multiple products at once</span>


                            <form method="post" action="{{ route('warehouse.product', ['warehouse' => $warehouse->id]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class = "flex">
                                    <input type="hidden" name="warehouse_id" value="{{ $warehouse->id }}">

                                    <div class="w-60">
                                        <label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select goods</label>
                                        <select multiple id="countries_multiple" name="product_ids[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @foreach ($products as $product )
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                        </select>

                                        @error('product_ids')
                                        <p class="text-red-600 text-xs pt-2">{{$message}}</p>
                                        @enderror
                                    </div>
    
                                    <div class="w-60 ml-5">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity:</label>
                                        <input type="number" name="quantity" id="quantity" min="1" value="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        
                                        @error('quantity')
                                        <p class="text-red-600 text-xs pt-2">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex items-center justify-end gap-x-6 pr-5">
                                    <button type="button" onclick="window.history.back()" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                                </div>
                            </form>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
