<x-app-layout>

    @include('partials._navbar')

    <div class="py-12">
        <div class = "max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class = "p-14 text-gray-900">
                    <form method="post" action="/product/{{$product->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-3">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Update the product</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Here you can update  product details.</p>
                            </div>
                        </div>
                    
                        <div class="border-b border-gray-900/10 pb-5">  
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Product name</label>
                                <div class="mt-2">
                                <input type="text" name="name" id="name" value="{{$product->name}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>

                                @error('name')
                                <p class="text-red-600 text-xs">{{$message}}</p>
                                @enderror
                            </div>
                    
                            <div class="sm:col-span-3">
                                <label for="sku" class="block text-sm font-medium leading-6 text-gray-900">Sku</label>
                                <div class="mt-2">
                                <input type="text" name="sku" id="sku" value="{{$product->sku}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>

                                @error('sku')
                                <p class="text-red-600 text-xs">{{$message}}</p>
                                @enderror
                            </div>
                    
                            <div class="sm:col-span-3">
                                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                                <div class="mt-2">
                                <input id="price" name="price" type="number" min="0.00" step="any" value="{{$product->price}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Product description</label>
                                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave description...">{{$product->description}}</textarea>
                            </div>
     
                            </div>
                        </div>                                          
                        </div>
                        <div class="flex items-center justify-end gap-x-6 pb-10 pr-10">
                        <button type="button" onclick="window.history.back()" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>