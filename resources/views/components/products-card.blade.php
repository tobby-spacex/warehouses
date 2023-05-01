@props(['product'])

<tbody>
    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{$product->name}}
        </th>
        <td class="px-6 py-4">
            {{$product->sku}}
        </td>
        <td class="px-6 py-4">
            {{$product->price}}
        </td>
        <td class="px-6 py-4">
            {{$product->description}}
        </td>
        <td class="px-6 py-4 text-center">
            <a href="/product/{{$product->id}}/edit" class= "font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
            
            <form method="post" action="/product/{{$product->id}}">
                @csrf
                @method('DELETE')
                <button type="submit" value="{{$product->id}}" class="p-2 text-rose-600">Delete</button>
            </form>
        </td>
    </tr>
</tbody>